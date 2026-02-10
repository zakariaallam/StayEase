<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | StayEasy Bespoke Hospitality</title>

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
                        primary: '#1e1b4b', // Deep Indigo
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
        <!-- Registration Card -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl p-8 md:p-10 border border-slate-200 dark:border-white/5 form-shadow">
            <div class="mb-8">
                <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white mb-2">Create Account</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">Join our exclusive global hospitality network.</p>
            </div>

            <form method="POST" action="{{ route('register.user') }}" class="space-y-5">
                @csrf

                <!-- Hidden Role Assignment -->
                <input type="hidden" name="role" value="client">

                <!-- Name -->
                <div class="space-y-1.5">
                    <label for="name" class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400 block ml-1">
                        Full Name
                    </label>
                    <input 
                        id="name" 
                        type="text" 
                        name="name" 
                        value="{{ old('name') }}" 
                        required 
                        placeholder="Johnathan Doe"
                        class="w-full bg-slate-50 dark:bg-black/40 border {{ $errors->has('name') ? 'border-red-500' : 'border-slate-200 dark:border-white/10' }} px-4 py-3 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-300 dark:placeholder:text-slate-600"
                    >
                    @error('name') 
                        <span class="text-[11px] font-medium text-red-500 mt-1 block ml-1">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Email -->
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
                        placeholder="name@company.com"
                        class="w-full bg-slate-50 dark:bg-black/40 border {{ $errors->has('email') ? 'border-red-500' : 'border-slate-200 dark:border-white/10' }} px-4 py-3 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-300 dark:placeholder:text-slate-600"
                    >
                    @error('email') 
                        <span class="text-[11px] font-medium text-red-500 mt-1 block ml-1">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Password -->
                <div class="space-y-1.5">
                    <label for="password" class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400 block ml-1">
                        Security Password
                    </label>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required 
                        placeholder="••••••••"
                        class="w-full bg-slate-50 dark:bg-black/40 border {{ $errors->has('password') ? 'border-red-500' : 'border-slate-200 dark:border-white/10' }} px-4 py-3 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-300 dark:placeholder:text-slate-600"
                    >
                    @error('password') 
                        <span class="text-[11px] font-medium text-red-500 mt-1 block ml-1">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Action Button -->
                <button type="submit" class="w-full bg-primary dark:bg-white text-white dark:text-black py-4 mt-4 rounded-lg font-bold text-xs uppercase tracking-[0.2em] shadow-lg shadow-indigo-900/10 transition-all hover:bg-slate-800 dark:hover:bg-slate-200 transform active:scale-[0.98]">
                    Create Account
                </button>
            </form>
        </div>

        <!-- Support Info -->
        <p class="text-center mt-8 text-[11px] font-bold uppercase tracking-widest text-slate-400">
            Already a member? <a href="{{ route('login') }}" class="text-indigo-600 hover:text-primary transition-colors ml-1">Login here</a>
        </p>
    </div>

    <!-- Minimal Footer -->
    <footer class="mt-auto py-8">
        <p class="text-[10px] text-slate-400 uppercase tracking-[0.3em]">
            &copy; 2026 StayEasy Bespoke Hospitality Group.
        </p>
    </footer>

</body>
</html>