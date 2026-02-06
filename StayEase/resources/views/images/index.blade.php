<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie Hôtel | Ajouter des photos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Outfit', sans-serif; } </style>
</head>
<body class="bg-[#f8fafc] min-h-screen pb-20">

    <nav class="bg-white border-b border-slate-100 py-6 mb-12 shadow-sm">
        <div class="max-w-4xl mx-auto px-4 flex justify-between items-center">
            <a href="{{ route('hotels.index') }}" class="text-slate-400 hover:text-indigo-600 transition-all flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span class="font-bold text-sm">Retour</span>
            </a>
            <h2 class="font-extrabold text-slate-800 tracking-tight">Galerie de l'Hôtel</h2>
            <div class="w-10"></div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4">
        <header class="mb-10">
            <h1 class="text-3xl font-bold text-slate-900">Ajouter des photos</h1>
            <p class="text-slate-500 mt-2">Sélectionnez plusieurs images pour illustrer les chambres et les services de l'hôtel.</p>
        </header>

        {{-- <form action="{{ route('hotels.index.store', $hotel->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8"> --}}
            @csrf

            <div class="group relative bg-white border-4 border-dashed border-slate-200 rounded-[2.5rem] p-16 text-center hover:border-indigo-400 transition-all cursor-pointer">
                <input id="images" name="images[]" type="file" class="sr-only" multiple accept="image/*" onchange="previewImages()">

                <div class="space-y-4" id="upload-placeholder">
                    <div class="w-20 h-20 bg-indigo-50 rounded-3xl flex items-center justify-center mx-auto group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <label for="images" class="block cursor-pointer">
                        <span class="text-xl font-bold text-slate-700 block">Glissez vos photos ici</span>
                        <span class="text-indigo-500 font-semibold">ou parcourez vos fichiers</span>
                    </label>
                    <p class="text-slate-400 text-xs uppercase tracking-widest font-bold">PNG, JPG ou WEBP (Max. 5MB par fichier)</p>
                </div>

                <div id="preview-grid" class="hidden grid grid-cols-2 md:grid-cols-4 gap-4 mt-8">
                    </div>
            </div>

            <div class="flex items-center justify-between bg-white p-6 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50">
                <div class="text-slate-500 text-sm italic" id="file-count">Aucun fichier sélectionné</div>
                <button type="submit" class="px-10 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl shadow-lg shadow-indigo-200 transition-all transform hover:-translate-y-1 active:scale-95">
                    Envoyer à la galerie
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewImages() {
            const preview = document.querySelector('#preview-grid');
            const placeholder = document.querySelector('#upload-placeholder');
            const fileCount = document.querySelector('#file-count');
            const files = document.querySelector('#images').files;

            preview.innerHTML = '';

            if (files.length > 0) {
                preview.classList.remove('hidden');
                preview.classList.add('grid');
                placeholder.classList.add('opacity-40');
                fileCount.textContent = files.length + " photo(s) prête(s) à l'envoi";

                Array.from(files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = "relative h-32 rounded-2xl overflow-hidden border-2 border-indigo-100";
                        div.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                        preview.appendChild(div);
                    }
                    reader.readAsDataURL(file);
                });
            }
        }
    </script>
</body>
</html>
