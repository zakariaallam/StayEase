<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hotel->nom }} | Détails</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-900 antialiased">

    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100 py-4">
        <div class="max-w-5xl mx-auto px-4 flex justify-between items-center">
            <a href="{{ route('hotels.index') }}" class="group flex items-center gap-2 text-slate-500 hover:text-indigo-600 transition-all">
                <div class="p-2 rounded-full group-hover:bg-indigo-50 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                </div>
                <span class="font-bold text-sm">Retour au Dashboard</span>
            </a>
            <div class="flex gap-3">
                <a href="{{ route('hotels.edit', $hotel->id) }}" class="px-4 py-2 bg-amber-50 text-amber-600 rounded-xl font-bold text-sm hover:bg-amber-500 hover:text-white transition-all">
                    Modifier
                </a>
            </div>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-4 py-12">
        <section class="relative h-[500px] w-full rounded-[3rem] overflow-hidden shadow-2xl mb-12">
            <img src="{{ asset('storage/' . $hotel->image) }}" alt="{{ $hotel->nom }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-12">
                <div class="flex items-center gap-2 text-indigo-400 font-bold uppercase tracking-widest text-xs mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    {{ $hotel->adresse }}
                </div>
                <h1 class="text-5xl md:text-6xl font-black text-white leading-tight">
                    {{ $hotel->nom }}
                </h1>
            </div>
        </section>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-2xl font-bold text-slate-800 mb-6 flex items-center gap-3">
                        <span class="w-2 h-8 bg-indigo-600 rounded-full"></span>
                        À propos de l'établissement
                    </h2>
                    <p class="text-slate-600 text-lg leading-relaxed whitespace-pre-line">
                        {{ $hotel->description }}
                    </p>
                </div>

                <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-100">
                    <div class="flex justify-between items-center mb-8">
                        <h2 class="text-2xl font-bold text-slate-800">Galerie Photos</h2>
                        {{-- <a href="{{ route('hotels.galerie', $hotel->id) }}" class="text-indigo-600 font-bold hover:underline"> --}}
                            Gérer les photos
                        </a>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        {{-- On suppose ici que vous avez une relation "images" --}}
                        @forelse($hotel->images as $img)
                            <div class="h-40 rounded-2xl overflow-hidden shadow-sm">
                                <img src="{{ asset('storage/' . $img->chemin) }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                            </div>
                        @empty
                            <div class="col-span-full py-12 text-center bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200">
                                <p class="text-slate-400 font-medium text-sm italic">Aucune photo supplémentaire disponible.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-indigo-900 rounded-[2.5rem] p-8 text-white shadow-xl shadow-indigo-200">
                    <h3 class="text-xl font-bold mb-6 italic text-indigo-200 tracking-tight">Récapitulatif</h3>
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase text-indigo-400 tracking-widest">Type</p>
                                <p class="font-bold">Hôtel Premium</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase text-indigo-400 tracking-widest">Localisation</p>
                                <p class="font-bold line-clamp-1">{{ $hotel->adresse }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-sm text-center">
                    <p class="text-slate-400 text-sm mb-4">Besoin de modifier ces informations ?</p>
                    <a href="{{ route('hotels.edit', $hotel->id) }}" class="block w-full py-4 bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold rounded-2xl transition-all">
                        Editer le profil
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-center py-12 text-slate-400 text-sm">
        &copy; 2026 HotelMaster Management System
    </footer>

</body>
</html>
