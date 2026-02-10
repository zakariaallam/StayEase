<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StayEasy | Bespoke Hospitality & Global Stays</title>

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
                        accent: '#4338ca',
                    }
                }
            }
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }
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
        img { object-fit: cover; }
    </style>
</head>
<body class="bg-white dark:bg-[#0a0a0a] text-slate-900 dark:text-slate-100 antialiased font-sans hero-gradient">
@dd(Auth::user())
    <!-- Navigation -->
    <header class="fixed top-0 left-0 right-0 z-50 glass-effect border-b border-slate-200/60 dark:border-white/10">
        <nav class="max-w-7xl mx-auto px-8 h-20 flex items-center justify-between">
            <div class="flex items-center gap-3 cursor-pointer">
                <svg class="w-6 h-6 text-primary dark:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
                <span class="text-lg font-bold tracking-tight uppercase">StayEasy</span>
            </div>

            <div class="hidden lg:flex items-center gap-10 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">
                <a href="#" class="hover:text-primary dark:hover:text-white transition-colors">Properties</a>
                <a href="#" class="hover:text-primary dark:hover:text-white transition-colors">Collections</a>
                <a href="#" class="hover:text-primary dark:hover:text-white transition-colors">Journal</a>
                <a href="#" class="hover:text-primary dark:hover:text-white transition-colors">Support</a>
            </div>

            <div class="flex items-center gap-4">
                @auth
                    <!-- Authenticated View (Refined) -->
                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-3 pl-4 pr-2 py-1.5 border border-slate-200 dark:border-white/10 rounded-full bg-slate-50/50 dark:bg-white/5">
                            <span class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-600 dark:text-slate-300">
                                {{ Auth::user()->name }}
                            </span>
                            <div class="w-7 h-7 rounded-full bg-primary dark:bg-indigo-500 flex items-center justify-center text-[10px] text-white font-bold">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        </div>
                        
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="p-2 text-slate-400 hover:text-red-500 transition-colors group" title="Logout">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @else
                    <!-- Guest View -->
                    <div class="flex items-center gap-6">
                        <a href="{{ route('login') }}" class="text-[11px] font-bold uppercase tracking-widest hover:text-primary dark:hover:text-white transition-all text-slate-500">
                            Login
                        </a>
                        <button class="bg-primary dark:bg-white text-white dark:text-black px-6 py-2.5 rounded-sm text-[11px] font-bold uppercase tracking-widest transition-all hover:bg-slate-800 dark:hover:bg-slate-200 shadow-sm">
                            Book Now
                        </button>
                    </div>
                @endauth
            </div>
        </nav>
    </header>

    <main class="pt-40">
        <!-- Hero Section -->
        <section class="max-w-7xl mx-auto px-8 mb-24">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <span class="inline-block mb-6 text-[11px] font-bold tracking-[0.4em] uppercase text-indigo-500">
                    Bespoke Travel Experiences
                </span>
                <h1 class="text-5xl md:text-7xl font-bold tracking-tight mb-8 leading-[1.1] text-slate-900 dark:text-white">
                    Refined stays for the <br><span class="italic font-normal text-slate-400">discerning</span> traveler.
                </h1>
                <p class="text-lg text-slate-500 dark:text-slate-400 leading-relaxed max-w-2xl mx-auto">
                    A curated portfolio of the world's most exceptional hotels, villas, and retreats. We bridge the gap between luxury and simplicity.
                </p>
            </div>

            <!-- Professional Search Interface -->
            @auth
            <div class="max-w-6xl mx-auto">
                <div class="bg-white dark:bg-zinc-900 rounded-2xl shadow-[0_32px_64px_-16px_rgba(0,0,0,0.08)] border border-slate-200 dark:border-white/5 flex flex-col md:flex-row items-stretch p-2">
                    <div class="flex-[1.5] flex flex-col justify-center px-8 py-5 border-b md:border-b-0 md:border-r border-slate-100 dark:border-white/5">
                        <span class="text-[9px] font-bold uppercase tracking-[0.2em] text-slate-400 mb-1.5">Destination</span>
                        <input type="text" placeholder="Search cities or hotels" class="bg-transparent focus:outline-none placeholder:text-slate-300 font-semibold text-sm text-slate-900 dark:text-white">
                    </div>
                    <div class="flex-1 flex flex-col justify-center px-8 py-5 border-b md:border-b-0 md:border-r border-slate-100 dark:border-white/5">
                        <span class="text-[9px] font-bold uppercase tracking-[0.2em] text-slate-400 mb-1.5">Check In</span>
                        <input type="text" placeholder="Add dates" class="bg-transparent focus:outline-none placeholder:text-slate-300 font-semibold text-sm text-slate-900 dark:text-white">
                    </div>
                    <div class="flex-1 flex flex-col justify-center px-8 py-5 border-b md:border-b-0 md:border-r border-slate-100 dark:border-white/5">
                        <span class="text-[9px] font-bold uppercase tracking-[0.2em] text-slate-400 mb-1.5">Check Out</span>
                        <input type="text" placeholder="Add dates" class="bg-transparent focus:outline-none placeholder:text-slate-300 font-semibold text-sm text-slate-900 dark:text-white">
                    </div>
                    <div class="flex-1 flex flex-col justify-center px-8 py-5">
                        <span class="text-[9px] font-bold uppercase tracking-[0.2em] text-slate-400 mb-1.5">Guests</span>
                        <input type="text" placeholder="2 Guests" class="bg-transparent focus:outline-none placeholder:text-slate-300 font-semibold text-sm text-slate-900 dark:text-white">
                    </div>
                    <button class="bg-primary dark:bg-white text-white dark:text-black px-10 py-5 md:py-0 rounded-xl font-bold text-[11px] uppercase tracking-widest transition-all hover:brightness-110 active:scale-[0.98]">
                        Search
                    </button>
                </div>
            </div>
            @else
            <div class="text-center">
                <a href="{{ route('login') }}" class="inline-flex items-center gap-3 text-xs font-bold uppercase tracking-[0.2em] text-slate-400 hover:text-primary transition-colors">
                    Log in to start your journey
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            @endauth
        </section>

        <!-- Social Proof -->
        <section class="max-w-7xl mx-auto px-8 py-12 border-y border-slate-100 dark:border-white/5 mb-24">
            <div class="flex flex-wrap items-center justify-center md:justify-between gap-12 opacity-40 grayscale dark:invert">
                <span class="text-xl font-serif italic font-bold">L'Avenue</span>
                <span class="text-xl font-bold tracking-tighter uppercase italic">Grand Hyatt</span>
                <span class="text-xl font-semibold tracking-widest">NOBU</span>
                <span class="text-xl font-serif font-bold">Ritz-Carlton</span>
                <span class="text-xl font-bold uppercase">Aman</span>
            </div>
        </section>

        <!-- Featured Section -->
        <section class="max-w-7xl mx-auto px-8 mb-32">
            <div class="flex items-end justify-between mb-12">
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-[0.3em] text-indigo-600 mb-3 block">Curation 01</span>
                    <h2 class="text-4xl font-bold tracking-tight">The Season's Best</h2>
                </div>
                <button class="group flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest border-b border-slate-200 dark:border-white/10 pb-2 hover:border-primary dark:hover:border-white transition-all">
                    Explore All Properties
                    <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Card 1 -->
                <div class="group cursor-pointer">
                    <div class="aspect-[4/5] bg-slate-100 dark:bg-zinc-900 rounded-sm mb-6 overflow-hidden relative border border-slate-200/50 dark:border-white/5">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=800" alt="Luxury Villa" class="w-full h-full group-hover:scale-105 transition-transform duration-1000">
                        <div class="absolute top-6 left-6">
                            <span class="bg-white/95 backdrop-blur-md text-black text-[9px] font-bold px-3 py-1.5 rounded-sm uppercase tracking-widest shadow-sm">Premium Selection</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400">Cyclades, Greece</p>
                        <h3 class="font-bold text-2xl text-slate-900 dark:text-white group-hover:text-accent transition-colors">The Belvedere Estate</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 font-medium">From $1,200 / night</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="group cursor-pointer">
                    <div class="aspect-[4/5] bg-slate-100 dark:bg-zinc-900 rounded-sm mb-6 overflow-hidden relative border border-slate-200/50 dark:border-white/5">
                        <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&q=80&w=800" alt="Tropical Retreat" class="w-full h-full group-hover:scale-105 transition-transform duration-1000">
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400">Ubud, Indonesia</p>
                        <h3 class="font-bold text-2xl text-slate-900 dark:text-white group-hover:text-accent transition-colors">Mandala Sanctuary</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 font-medium">From $650 / night</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="group cursor-pointer">
                    <div class="aspect-[4/5] bg-slate-100 dark:bg-zinc-900 rounded-sm mb-6 overflow-hidden relative border border-slate-200/50 dark:border-white/5">
                        <img src="https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?auto=format&fit=crop&q=80&w=800" alt="Modern Architecture" class="w-full h-full group-hover:scale-105 transition-transform duration-1000">
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400">Kyoto, Japan</p>
                        <h3 class="font-bold text-2xl text-slate-900 dark:text-white group-hover:text-accent transition-colors">Riverside Ryokan</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 font-medium">From $980 / night</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why StayEasy Section -->
        <section class="max-w-7xl mx-auto px-8 py-24 bg-slate-50 dark:bg-zinc-900/40 rounded-3xl mb-32 border border-slate-100 dark:border-white/5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-20">
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-indigo-600 mb-4 block">Our Philosophy</span>
                    <h2 class="text-4xl font-bold leading-tight mb-8">Redefining the standard of booking luxury.</h2>
                    <p class="text-slate-500 dark:text-slate-400 mb-8 leading-relaxed">We don't just list hotels; we vet them. Every property in our collection is hand-selected by our travel experts based on design, service, and soul.</p>
                    <button class="bg-primary dark:bg-white text-white dark:text-black px-8 py-4 rounded-sm text-[11px] font-bold uppercase tracking-widest transition-all hover:bg-slate-800">Learn About Our Process</button>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-10">
                    <div>
                        <h4 class="font-bold uppercase tracking-widest text-[10px] mb-3">Expert Curation</h4>
                        <p class="text-sm text-slate-500">Only the top 1% of luxury properties make it through our vetting process.</p>
                    </div>
                    <div>
                        <h4 class="font-bold uppercase tracking-widest text-[10px] mb-3">Global Concierge</h4>
                        <p class="text-sm text-slate-500">24/7 dedicated support for every booking, ensuring a seamless experience.</p>
                    </div>
                    <div>
                        <h4 class="font-bold uppercase tracking-widest text-[10px] mb-3">Exclusive Perks</h4>
                        <p class="text-sm text-slate-500">Member-only upgrades, breakfast credits, and early check-ins.</p>
                    </div>
                    <div>
                        <h4 class="font-bold uppercase tracking-widest text-[10px] mb-3">Seamless UX</h4>
                        <p class="text-sm text-slate-500">The most intuitive interface in the luxury travel industry.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-white dark:bg-[#0a0a0a] border-t border-slate-200 dark:border-white/10 pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-16 mb-20">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-8 h-8 bg-primary dark:bg-white rounded flex items-center justify-center">
                            <svg class="w-5 h-5 text-white dark:text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                        </div>
                        <span class="font-bold text-xl uppercase tracking-tight">StayEasy</span>
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 max-w-sm mb-8 leading-relaxed text-sm">
                        StayEasy is a global travel platform dedicated to providing access to the most refined properties on earth.
                    </p>
                </div>
                
                <div>
                    <h5 class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-900 dark:text-white mb-8">Company</h5>
                    <ul class="flex flex-col gap-4 text-xs font-semibold text-slate-500 tracking-wider">
                        <li><a href="#" class="hover:text-primary transition-colors">Our Story</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Careers</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Sustainability</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Journal</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-900 dark:text-white mb-8">Legal</h5>
                    <ul class="flex flex-col gap-4 text-xs font-semibold text-slate-500 tracking-wider">
                        <li><a href="#" class="hover:text-primary transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Terms of Use</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-slate-100 dark:border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-[10px] text-slate-400 uppercase tracking-[0.2em]">
                    &copy; 2026 StayEasy Bespoke Hospitality Group.
                </p>
                <div class="flex gap-10 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400">
                    <a href="#" class="hover:text-primary transition-all">Instagram</a>
                    <a href="#" class="hover:text-primary transition-all">LinkedIn</a>
                    <a href="#" class="hover:text-primary transition-all">Twitter</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>