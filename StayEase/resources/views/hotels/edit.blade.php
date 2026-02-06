<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Hôtel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Outfit', sans-serif; } </style>
</head>
<body class="bg-[#f8fafc] min-h-screen pb-20">

    <nav class="bg-white border-b border-slate-100 py-6 mb-12 shadow-sm">
        <div class="max-w-3xl mx-auto px-4 flex justify-between items-center text-slate-800">
            <a href="{{ route('hotels.index') }}" class="text-slate-400 hover:text-amber-600 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </a>
            <span class="font-bold">Modifier le Profil</span>
            <div class="w-6"></div>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto px-4">
        <form action="{{ route('hotels.update', $hotel) }}" method="POST" class="space-y-10" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-white p-10 space-y-8">
                <div>
                    <label class="text-xs font-black uppercase tracking-widest text-amber-500 mb-2 block">Nom actuel</label>
                    <input type="text" name="nom" value="{{ $hotel->nom }}" class="w-full text-2xl font-bold border-none focus:ring-0 p-0 outline-none text-slate-800" required>
                </div>

                <div>
                    <label class="text-xs font-black uppercase tracking-widest text-amber-500 mb-2 block">Adresse</label>
                    <input type="text" name="adresse" value="{{ $hotel->adresse }}" class="w-full font-semibold text-slate-600 border-none focus:ring-0 p-0 outline-none">
                </div>

                <hr class="border-slate-50">

                <div>
                    <label class="text-xs font-black uppercase tracking-widest text-amber-500 mb-2 block">Description</label>
                    <textarea name="description" rows="5" class="w-full text-lg text-slate-500 border-none focus:ring-0 p-0 outline-none resize-none">{{ $hotel->description }}</textarea>
                </div>
            </div>

            <div class="bg-amber-50 rounded-3xl p-8 border border-amber-100 flex items-center justify-between">
                <div class="text-sm font-bold text-amber-800 italic">Modifier la photo ?</div>
                <label for="image" class="px-6 py-2 bg-amber-500 text-white rounded-xl font-bold text-sm cursor-pointer hover:bg-amber-600 transition-all">
                    Choisir un fichier
                    <input id="image" name="image" type="file" class="sr-only">
                </label>
            </div>

            <button type="submit" class="w-full py-5 bg-amber-500 hover:bg-amber-600 text-white font-black text-lg rounded-[2rem] shadow-2xl shadow-amber-200 transition-all">
                Mettre à jour les infos
            </button>
        </form>
    </div>
</body>
</html>
