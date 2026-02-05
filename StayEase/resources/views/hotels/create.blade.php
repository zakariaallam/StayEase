<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Hôtel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f8fafc] min-h-screen pb-20">

    <nav class="bg-white border-b border-slate-100 py-6 mb-12 shadow-sm">
        <div class="max-w-3xl mx-auto px-4 flex justify-between items-center">
            <a href="{{ route('hotels.index') }}"
                class="text-slate-400 hover:text-indigo-600 transition-all flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span class="font-bold text-sm">Annuler</span>
            </a>
            <h2 class="font-extrabold text-slate-800 tracking-tight">Nouveau Profil Hôtel</h2>
            <div class="w-10"></div>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto px-4">
        <form action="{{ route('hotels.store') }}" method="POST" class="space-y-10" enctype="multipart/form-data">
            @csrf

            <div
                class="group relative bg-white border-4 border-dashed border-slate-200 rounded-[2.5rem] p-16 text-center hover:border-indigo-400 transition-all cursor-pointer">
                <div class="space-y-4">
                    <div
                        class="w-20 h-20 bg-indigo-50 rounded-3xl flex items-center justify-center mx-auto group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <label for="image" class="block cursor-pointer font-bold text-slate-700">
                        Cliquez pour ajouter une photo
                        <input id="image" name="image" type="file" class="sr-only" required>
                    </label>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-white p-10 space-y-8">
                <div>
                    <label class="text-xs font-black uppercase tracking-widest text-indigo-500 mb-2 block">Nom de
                        l'établissement</label>
                    <input type="text" name="nom"
                        class="w-full text-2xl font-bold placeholder-slate-200 border-none focus:ring-0 p-0 outline-none text-slate-800"
                        placeholder="Ex: Grand Plaza Marrakech" required>
                </div>

                <div>
                    <label class="text-xs font-black uppercase tracking-widest text-indigo-500 mb-2 block">Localisation
                        / Adresse</label>
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        </svg>
                        <input type="text" name="adresse" placeholder="Rue, Ville, Code Postal"
                            class="border-none focus:ring-0 w-full font-semibold text-slate-600 p-0 outline-none">
                    </div>
                </div>

                <hr class="border-slate-50">

                <div>
                    <label class="text-xs font-black uppercase tracking-widest text-indigo-500 mb-2 block">À propos de
                        l'hôtel</label>
                    <textarea name="description" rows="5"
                        class="w-full text-lg text-slate-500 placeholder-slate-200 border-none focus:ring-0 p-0 outline-none resize-none"
                        placeholder="Racontez l'histoire de ce lieu..."></textarea>
                </div>
            </div>

            <button type="submit"
                class="w-full py-5 bg-indigo-600 hover:bg-indigo-700 text-white font-black text-lg rounded-[2rem] shadow-2xl shadow-indigo-200 transition-all transform hover:-translate-y-1 active:scale-[0.98]">
                Enregistrer l'hôtel
            </button>
        </form>
    </div>
</body>

</html>
