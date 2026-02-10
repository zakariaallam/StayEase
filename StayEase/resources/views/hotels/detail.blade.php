<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hotel->nom }} | Détails</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .hero-shadow { background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.8) 100%); }
    </style>
</head>

<body class="bg-slate-50">

    <header class="relative h-[65vh] min-h-[450px] w-full overflow-hidden">
        <img src="{{ asset('storage/' . $hotel->image) }}"
             alt="{{ $hotel->nom }}"
             class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0 hero-shadow flex flex-col justify-between p-4 md:p-10">

            <nav class="flex justify-between items-center">
                <a href="javascript:history.back()"
                   class="flex items-center gap-2 bg-white/20 backdrop-blur-lg border border-white/30 text-white px-4 py-2 rounded-full hover:bg-white/40 transition-all group">
                    <i data-lucide="chevron-left" class="w-5 h-5 transition-transform group-hover:-translate-x-1"></i>
                    <span class="text-sm font-bold">Retour</span>
                </a>
            </nav>

            <div class="text-white max-w-4xl">
                <div class="flex items-center gap-2 mb-3">
                    <span class="bg-indigo-600 text-[10px] font-black px-3 py-1 rounded-md uppercase tracking-tighter">Premium Selection</span>
                    <div class="flex text-yellow-400">
                        <i data-lucide="star" class="w-3 h-3 fill-current"></i>
                        <i data-lucide="star" class="w-3 h-3 fill-current"></i>
                        <i data-lucide="star" class="w-3 h-3 fill-current"></i>
                        <i data-lucide="star" class="w-3 h-3 fill-current"></i>
                        <i data-lucide="star" class="w-3 h-3 fill-current"></i>
                    </div>
                </div>
                <h1 class="text-5xl md:text-7xl font-extrabold tracking-tighter mb-4">{{ $hotel->nom }}</h1>
                <p class="flex items-center gap-2 text-slate-200 text-sm md:text-base font-medium">
                    <i data-lucide="map-pin" class="w-5 h-5 text-indigo-400"></i> {{ $hotel->adresse }}
                </p>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-12">

        <div class="grid lg:grid-cols-3 gap-12">

            <div class="lg:col-span-2 space-y-16">

                <section>
                    <h2 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                        <i data-lucide="camera" class="w-5 h-5 text-indigo-600"></i> Galerie Photos
                    </h2>
                    <div class="grid grid-cols-3 md:grid-cols-4 gap-3">
                        @forelse($hotel->images as $img)
                        <div class="relative h-24 md:h-32 overflow-hidden rounded-xl cursor-pointer">
                            <img src="{{ asset('storage/' . $img->image_path) }}"
                                 class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                        </div>
                        @empty
                        <p class="text-slate-400 text-sm italic">Pas de photos supplémentaires.</p>
                        @endforelse
                    </div>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                        <i data-lucide="bed-single" class="w-5 h-5 text-indigo-600"></i> Chambres Disponibles
                    </h2>
                    <div class="space-y-4">
                        @forelse($hotel->rooms as $room)
                        <div class="flex flex-col sm:flex-row bg-white rounded-2xl border border-slate-200 overflow-hidden hover:border-indigo-300 transition-colors group">
                            <div class="sm:w-48 h-40 overflow-hidden">
                                <img src="{{ asset('storage/' . $room->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="flex-1 p-5 flex flex-col justify-between">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold text-slate-900">Chambre {{ $room->number }}</h3>
                                        <p class="text-slate-500 text-xs mt-1 line-clamp-1">{{ $room->description }}</p>
                                    </div>
                                    <span class="text-xs font-bold text-slate-400 flex items-center gap-1">
                                        <i data-lucide="users" class="w-3 h-3"></i> x{{ $room->capacity }}
                                    </span>
                                </div>
                                <div class="flex items-end justify-between mt-4">
                                    <div>
                                        <span class="text-indigo-600 font-bold text-lg">{{ $room->price_per_night }} DH</span>
                                        <span class="text-slate-400 text-[10px] block">/ Nuit</span>
                                    </div>
                                    <button class="bg-slate-900 text-white text-xs font-bold px-4 py-2 rounded-lg hover:bg-indigo-600 transition-colors">
                                        Réserver
                                    </button>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="text-slate-400 text-sm">Aucune chambre disponible.</p>
                        @endforelse
                    </div>
                </section>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-24 bg-white rounded-3xl border border-slate-200 p-6 shadow-sm space-y-6">
                    <h3 class="font-bold text-lg text-slate-900">À propos de l'hôtel</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        {{ $hotel->description }}
                    </p>
                    <div class="space-y-3 pt-4 border-t border-slate-100">
                        <div class="flex items-center gap-3 text-sm text-slate-600">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-green-500"></i> Confirmation instantanée
                        </div>
                        <div class="flex items-center gap-3 text-sm text-slate-600">
                            <i data-lucide="wifi" class="w-4 h-4 text-indigo-500"></i> Wi-Fi gratuit
                        </div>
                    </div>
                    <button class="w-full bg-indigo-600 text-white font-bold py-4 rounded-2xl hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-100">
                        Vérifier les disponibilités
                    </button>
                </div>
            </div>

        </div>
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
