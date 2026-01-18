<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management | Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #8b5cf6; 
            --secondary: #06b6d4; 
            --bg-dark: #0f172a;
            --glass-bg: rgba(30, 41, 59, 0.7);
            --glass-border: rgba(255, 255, 255, 0.1);
        }
        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-dark);
            background-image: 
                radial-gradient(at 0% 0%, rgba(139, 92, 246, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(6, 182, 212, 0.15) 0px, transparent 50%);
            background-attachment: fixed;
            color: #e2e8f0;
        }
        .glass { background: var(--glass-bg); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid var(--glass-border); box-shadow: 0 4px 30px rgba(0,0,0,0.1);}
        .glass-card { background: linear-gradient(135deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.01) 100%); backdrop-filter: blur(10px); border:1px solid rgba(255,255,255,0.05); transition: all 0.3s ease;}
        .btn-primary { background: linear-gradient(135deg, var(--primary), var(--secondary)); box-shadow:0 4px 15px rgba(139,92,246,0.3); transition: all 0.3s ease; }
        .btn-primary:hover { box-shadow:0 6px 20px rgba(139,92,246,0.5); transform: translateY(-1px);}
        .neon-text { text-shadow:0 0 10px rgba(6,182,212,0.5);}
        .fade-in { animation: fadeIn 0.5s ease-out forwards; opacity:0;}
        @keyframes fadeIn { from { opacity:0; transform: translateY(10px);} to {opacity:1; transform:translateY(0);} }
    </style>
</head>
<body class="h-screen overflow-hidden flex text-slate-200">

    <!-- Sidebar -->
    <aside class="w-64 glass flex flex-col z-20 hidden md:flex fade-in relative border-r border-white/5">
        <div class="h-20 flex items-center justify-center border-b border-white/5">
            <h1 class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-violet-400 to-cyan-400 neon-text">
                AdminPortal
            </h1>
        </div>

        <nav class="flex-1 py-6 space-y-2 p-4">
            <a href="#" class="flex items-center px-4 py-3 bg-white/5 text-white rounded-xl border border-white/10 shadow-lg shadow-violet-500/10">
                Users
            </a>
            <a href="#" class="flex items-center px-4 py-3 text-slate-400 hover:text-white hover:bg-white/5 rounded-xl transition-all">
                Settings
            </a>
        </nav>

        <div class="p-4 border-t border-white/5">
            <a href="/logout" class="flex items-center gap-3 p-2 rounded-lg hover:bg-rose-500/10 hover:text-rose-400 transition-colors group">
                Logout
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col relative overflow-hidden">
        <header class="h-20 glass flex items-center justify-between px-8 z-10">
            <h2 class="text-2xl font-semibold text-white">User Management</h2>
            <div class="flex items-center gap-4">
                <div class="relative hidden sm:block">
                    <input type="text" placeholder="Search users..." class="bg-slate-800/50 border border-slate-700 rounded-lg py-2 pl-10 pr-4 text-sm focus:outline-none focus:border-violet-500 transition-colors">
                </div>
                <button class="btn-primary px-4 py-2 rounded-lg text-white text-sm font-medium flex items-center gap-2">
                    Add User
                </button>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8 fade-in" style="animation-delay: 0.1s">
            <div class="glass-card rounded-2xl overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900/30 text-slate-400 text-xs uppercase tracking-wider border-b border-white/5">
                            <th class="p-6 font-semibold">User</th>
                            <th class="p-6 font-semibold">Role</th>
                            <th class="p-6 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        <?php if (!empty($users)) : ?>
                            <?php foreach ($users as $user) : ?>
                            <tr class="hover:bg-white/5 transition-colors group">
                                <td class="p-6">
                                    <div class="flex items-center gap-4">
                                        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($user['name']); ?>&background=8b5cf6&color=fff" class="w-10 h-10 rounded-full border border-white/10" alt="">
                                        <div>
                                            <h4 class="text-white font-medium"><?php echo htmlspecialchars($user['name']); ?></h4>
                                            <p class="text-xs text-slate-400"><?php echo htmlspecialchars($user['email']); ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6">
                                    <span class="px-3 py-1 bg-violet-500/10 text-violet-400 border border-violet-500/20 rounded-full text-xs font-semibold">
                                        <?php echo htmlspecialchars($user['role']); ?>
                                    </span>
                                </td>
                                <td class="p-6 text-right">
                                    <button class="text-slate-400 hover:text-white transition-colors p-2 hover:bg-white/10 rounded-lg">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="p-6 text-center text-slate-400">No users found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="p-6 border-t border-white/5 flex items-center justify-between">
                    <span class="text-sm text-slate-400">Showing 1 to <?php echo count($users); ?> of <?php echo count($users); ?> users</span>
                    <div class="flex gap-2">
                        <button class="px-3 py-1 text-sm text-slate-400 hover:text-white hover:bg-white/5 rounded transition-colors disabled:opacity-50" disabled>Previous</button>
                        <button class="px-3 py-1 text-sm text-slate-400 hover:text-white hover:bg-white/5 rounded transition-colors">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
