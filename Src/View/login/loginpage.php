<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | YouGame Arena</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #8b5cf6; /* Violet */
            --secondary: #06b6d4; /* Cyan */
            --bg-dark: #0f172a;
            --glass-bg: rgba(30, 41, 59, 0.7);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-dark);
            background-image: 
                radial-gradient(at 0% 0%, rgba(139, 92, 246, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(6, 182, 212, 0.15) 0px, transparent 50%);
            background-attachment: fixed;
            color: #e2e8f0;
        }

        .glass {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .glass-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.01) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            box-shadow: 0 6px 20px rgba(139, 92, 246, 0.5);
            transform: translateY(-1px);
        }

        .neon-text {
            text-shadow: 0 0 10px rgba(6, 182, 212, 0.5);
        }

        .input-field {
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        .input-field:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(139, 92, 246, 0.2);
            outline: none;
        }

        .fade-in { animation: fadeIn 0.5s ease-out forwards; opacity: 0; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md glass-card rounded-2xl p-8 fade-in relative overflow-hidden">
        <!-- Decorative background glow -->
        <div class="absolute top-0 right-0 -mt-8 -mr-8 w-32 h-32 bg-violet-500/20 rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-32 h-32 bg-cyan-500/20 rounded-full blur-2xl"></div>

        <div class="text-center mb-8 relative z-10">
            <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-violet-400 to-cyan-400 neon-text mb-2">
                Welcome Back
            </h1>
            <p class="text-slate-400">Sign in to access your dashboard</p>
        </div>

        <form action="/login" method="POST" class="space-y-6 relative z-10">
            <div>
                <label for="email" class="block text-sm font-medium text-slate-300 mb-2">Email Address</label>
                <div class="relative">
                    <input type="email" id="email" name="email" required 
                        class="w-full input-field rounded-xl px-4 py-3 pl-10 text-white placeholder-slate-500 focus:bg-slate-900/50"
                        placeholder="name@example.com">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </div>
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="block text-sm font-medium text-slate-300">Password</label>
                    <a href="#" class="text-xs text-cyan-400 hover:text-cyan-300 transition-colors">Forgot Password?</a>
                </div>
                <div class="relative">
                    <input type="password" id="password" name="password" required 
                        class="w-full input-field rounded-xl px-4 py-3 pl-10 text-white placeholder-slate-500 focus:bg-slate-900/50"
                        placeholder="••••••••">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-slate-700 bg-slate-800 text-violet-600 focus:ring-violet-500/50 focus:ring-offset-0">
                <label for="remember-me" class="ml-2 block text-sm text-slate-400">Remember me</label>
            </div>

            <button type="submit" class="w-full btn-primary text-white font-semibold py-3 px-4 rounded-xl flex items-center justify-center gap-2 group">
                Sign In
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </button>
        </form>

        <div class="mt-8 text-center">
            <p class="text-sm text-slate-400">
                Don't have an account? 
                <a href="#" class="font-medium text-cyan-400 hover:text-cyan-300 transition-colors">Register here</a>
            </p>
        </div>
    </div>

</body>
</html>
