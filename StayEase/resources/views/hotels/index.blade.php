<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Hôtels | Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f8fafc] text-slate-900 antialiased pb-20 px-4">
    <div class="max-w-6xl mx-auto py-12">
        <header class="flex flex-col md:flex-row justify-between items-center mb-16 gap-6">
            <div class="text-center md:text-left">
                <h1 class="text-4xl font-bold text-slate-900 tracking-tight">Catalogue Hôtels</h1>
                <p class="text-slate-500 mt-2">Gestionnaire d'établissements et de résidences.</p>
            </div>
            <a href="{{ route('hotels.create') }}"
                class="bg-indigo-600 text-white px-8 py-4 rounded-2xl font-bold shadow-xl shadow-indigo-100 hover:bg-indigo-700 transition-all transform hover:-translate-y-1 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Ajouter un hôtel
            </a>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($hotels as $hotel)
                <article
                    class="group bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-500 relative">

                    <div class="relative h-72 overflow-hidden">
                        <img src="{{ asset('storage/' . $hotel->image) }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                    </div>

                    <div class="p-8">
                        <div class="flex items-start gap-2 text-slate-400 text-xs font-bold uppercase tracking-widest mb-3">
                            <svg class="w-4 h-4 text-indigo-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="line-clamp-1">{{ $hotel->adresse }}</span>
                        </div>

                        <h2 class="text-2xl font-bold text-slate-800 mb-2 group-hover:text-indigo-600 transition-colors">
                            {{ $hotel->nom }}
                        </h2>

                        <p class="text-slate-500 text-sm line-clamp-2 mb-6 leading-relaxed">
                            {{ $hotel->description }}
                        </p>

                        <div class="mb-6">
                            <a href="{{ route('hotels.show', $hotel->id) }}"
                               class="w-full inline-flex items-center justify-center gap-3 px-6 py-4 bg-slate-900 text-white rounded-2xl font-bold hover:bg-indigo-600 shadow-lg shadow-slate-200 hover:shadow-indigo-200 transition-all active:scale-[0.98]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                                Voir Chambres & Galerie
                            </a>
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-slate-50">
                            <a href="{{ route('hotels.edit', $hotel->id) }}"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-amber-50 text-amber-600 rounded-xl font-bold hover:bg-amber-600 hover:text-white transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                Modifier
                            </a>

                            <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST"
                                onsubmit="return confirm('Supprimer cet hôtel ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-slate-300 hover:text-red-500 transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full text-center py-24 bg-white rounded-[3rem] border-2 border-dashed border-slate-200">
                    <p class="text-slate-400 font-medium">Aucun établissement dans la base de données.</p>
                </div>
            @endforelse
        </div>
    </div>
</body>

</html>
