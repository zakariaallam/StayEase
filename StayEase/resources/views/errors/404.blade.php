<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 Page Not Found | StayEasy</title>

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
                        primary: '#1e1b4b',
                        accent: '#4338ca',
                    }
                }
            }
        }
    </script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        .dark .glass-effect {
            background: rgba(10, 10, 10, 0.7);
        }
        .hero-gradient {
            background: radial-gradient(circle at top right, rgba(67, 56, 202, 0.05), transparent);
        }
    </style>
</head>
<body class="bg-white dark:bg-[#0a0a0a] text-slate-900 dark:text-slate-100 antialiased font-sans hero-gradient min-h-screen flex flex-col">

    <!-- Navigation -->
    <header class="fixed top-0 left-0 right-0 z-50 glass-effect border-b border-slate-200/60 dark:border-white/10">
        <nav class="max-w-7xl mx-auto px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <svg class="w-6 h-6 text-primary dark:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
                <span class="text-lg font-bold tracking-tight uppercase">StayEasy</span>
            </div>
            <a href="{{ url('/') }}" class="text-[11px] font-bold uppercase tracking-widest text-slate-500 hover:text-primary dark:hover:text-white transition-colors">
                Back Home
            </a>
        </nav>
    </header>

    <!-- Error Content -->
    <main class="flex-grow flex items-center justify-center px-8 pt-16">
        <div class="max-w-2xl w-full text-center">
            <span class="inline-block mb-6 text-[11px] font-bold tracking-[0.4em] uppercase text-indigo-600 dark:text-indigo-400">
                Error 404
            </span>
            
            <h1 class="text-5xl md:text-7xl font-bold tracking-tight mb-8 leading-tight">
                Lost in <span class="italic font-normal text-slate-400">Transit</span>
            </h1>
            
            <div class="w-16 h-[1px] bg-slate-200 dark:bg-white/10 mx-auto mb-8"></div>
            
            <p class="text-lg text-slate-500 dark:text-slate-400 leading-relaxed max-w-md mx-auto mb-12">
                It seems the destination you are looking for does not exist in our current portfolio. Let us guide you back to the main collection.
            </p>

            <a href="{{ url('/') }}" class="inline-block bg-primary dark:bg-white text-white dark:text-black px-12 py-4 rounded-sm text-[11px] font-bold uppercase tracking-widest transition-all hover:bg-slate-800 dark:hover:bg-slate-200 shadow-sm">
                Back Home
            </a>
        </div>
    </main>

    <!-- Simple Footer -->
    <footer class="py-12 border-t border-slate-100 dark:border-white/5">
        <div class="max-w-7xl mx-auto px-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-[10px] text-slate-400 uppercase tracking-widest">
                &copy; 2026 StayEasy Bespoke Hospitality Group.
            </p>
            <div class="flex gap-8 text-[10px] font-bold uppercase tracking-widest text-slate-400">
                <a href="#" class="hover:text-primary transition-all">Support</a>
                <a href="#" class="hover:text-primary transition-all">Terms</a>
                <a href="#" class="hover:text-primary transition-all">Privacy</a>
            </div>
        </div>
    </footer>

</body>
</html>