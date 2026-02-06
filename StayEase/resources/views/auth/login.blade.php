<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | StayEasy Bespoke Hospitality</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'media',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui'],
                    },
                    colors: {
                        primary: '#1e1b4b', // Deep Indigo Established in index.html
                    }
                }
            }
        }
    </script>
    <style>
        .hero-gradient {
            background: radial-gradient(circle at top right, rgba(67, 56, 202, 0.05), transparent);
        }
        .form-shadow {
            box-shadow: 0 32px 64px -16px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-white dark:bg-[#0a0a0a] text-slate-900 dark:text-slate-100 antialiased font-sans hero-gradient min-h-screen flex flex-col justify-center items-center p-6">

    <!-- Branding -->
    <a href="/" class="flex items-center gap-3 mb-10 group">
        <svg class="w-8 h-8 text-primary dark:text-white transition-transform group-hover:scale-110" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span class="text-xl font-bold tracking-tight uppercase">StayEasy</span>
    </a>

    <div class="max-w-md w-full">
        <!-- Login Card -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl p-8 md:p-10 border border-slate-200 dark:border-white/5 form-shadow">
            <div class="mb-8">
                <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white mb-2">Welcome back</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">Access your bespoke travel dashboard.</p>
            </div>

            <form method="POST" action="{{ route('login.attempt') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div class="space-y-1.5">
                    <label for="email" class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400 block ml-1">
                        Corporate Email
                    </label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus 
                        placeholder="name@company.com"
                        class="w-full bg-slate-50 dark:bg-black/40 border border-slate-200 dark:border-white/10 px-4 py-3 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-300 dark:placeholder:text-slate-600"
                    >
                    @error('email') 
                        <span class="text-[11px] font-medium text-red-500 mt-1 block ml-1">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Password -->
                <div class="space-y-1.5">
                    <div class="flex justify-between items-center ml-1">
                        <label for="password" class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400 block">
                            Secure Password
                        </label>
                        <a href="#" class="text-[10px] font-bold uppercase tracking-widest text-indigo-600 hover:text-primary transition-colors">
                            Forgot?
                        </a>
                    </div>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required 
                        placeholder="••••••••"
                        class="w-full bg-slate-50 dark:bg-black/40 border border-slate-200 dark:border-white/10 px-4 py-3 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-300 dark:placeholder:text-slate-600"
                    >
                    @error('password') 
                        <span class="text-[11px] font-medium text-red-500 mt-1 block ml-1">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Remember Me (Optional but professional) -->
                <div class="flex items-center gap-3 ml-1">
                    <input type="checkbox" name="remember" id="remember" class="w-4 h-4 rounded border-slate-300 text-primary focus:ring-primary">
                    <label for="remember" class="text-xs text-slate-500 dark:text-slate-400 cursor-pointer">Stay logged in for 30 days</label>
                </div>

                <!-- Action Button -->
                <button type="submit" class="w-full bg-primary dark:bg-white text-white dark:text-black py-4 rounded-lg font-bold text-xs uppercase tracking-[0.2em] shadow-lg shadow-indigo-900/10 transition-all hover:bg-slate-800 dark:hover:bg-slate-200 transform active:scale-[0.98]">
                    Authenticate
                </button>
            </form>
        </div>

        <!-- Support Info -->
        <p class="text-center mt-8 text-[11px] font-bold uppercase tracking-widest text-slate-400">
            Need an account? <a href="{{ route('register.user') }}" class="text-indigo-600 hover:text-primary transition-colors ml-1">Create account</a>
        </p>
    </div>

    <!-- Minimal Footer Footer -->
    <footer class="mt-auto py-8">
        <p class="text-[10px] text-slate-400 uppercase tracking-[0.3em]">
            &copy; 2026 StayEasy Bespoke Hospitality Group.
        </p>
    </footer>

</body>
</html>