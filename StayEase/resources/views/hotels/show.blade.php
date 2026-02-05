<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hotel->nom }} | Galerie</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Outfit', sans-serif; }</style>
</head>

<body class="bg-[#f8fafc] text-slate-900 antialiased pb-20">
    <div class="max-w-6xl mx-auto py-12 px-4">

        <div class="mb-10">
            <a href="{{ route('hotels.index') }}" class="text-indigo-600 font-bold flex items-center gap-2 hover:gap-3 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Retour au catalogue
            </a>
            <h1 class="text-4xl font-bold mt-4">{{ $hotel->nom }}</h1>
            <p class="text-slate-500">{{ $hotel->adresse }}</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            <div class="lg:col-span-1">
                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-xl sticky top-10">
                    <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                        <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Ajouter des photos
                    </h3>

                    <form action="{{ route('hotels.photos.store', $hotel->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div class="relative group cursor-pointer">
                            <label class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-slate-200 rounded-3xl hover:border-indigo-400 hover:bg-indigo-50 transition-all cursor-pointer">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-10 h-10 mb-3 text-slate-400 group-hover:text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                    <p class="text-sm text-slate-500">Cliquez pour uploader</p>
                                </div>
                                <input type="file" name="photos[]" multiple class="hidden" accept="image/*" required />
                            </label>
                        </div>

                        <button type="submit" class="w-full bg-indigo-600 text-white py-4 rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition-all">
                            Enregistrer la galerie
                        </button>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="relative aspect-square rounded-[2rem] overflow-hidden border-4 border-white shadow-md">
                        <img src="{{ asset('storage/' . $hotel->image) }}" class="w-full h-full object-cover">
                        <span class="absolute top-4 left-4 bg-indigo-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase">Principale</span>
                    </div>

                    @forelse($hotel->photos ?? [] as $photo)
                        <div class="relative group aspect-square rounded-[2rem] overflow-hidden bg-slate-200 shadow-sm">
                            <img src="{{ asset('storage/' . $photo->path) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                @csrf @method('DELETE')
                                <button class="bg-red-500 text-white p-2 rounded-full shadow-lg">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    @empty
                        <div class="col-span-full flex flex-col items-center justify-center py-20 bg-white rounded-[2.5rem] border-2 border-dashed border-slate-100">
                             <p class="text-slate-400">Aucune photo dans la galerie pour le moment.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</body>
</html>
