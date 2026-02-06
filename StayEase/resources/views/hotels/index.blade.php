<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérant | Dashboard Hôtels</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f3f4f9] text-slate-900 antialiased">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-indigo-900 text-white hidden md:flex flex-col sticky top-0 h-screen">
            <div class="p-8">
                <h1 class="text-2xl font-bold tracking-tight">Hotel<span class="text-indigo-400">Master</span></h1>
            </div>

            <nav class="flex-1 px-4 space-y-2">
                <a href="/" class="flex items-center gap-3 p-3 text-indigo-200 hover:bg-indigo-800 hover:text-white rounded-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Tableau de bord
                </a>
                <a href="{{ route('hotels.index') }}" class="flex items-center gap-3 p-3 bg-indigo-800 rounded-xl text-white font-semibold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    Mes Hôtels
                </a>
            </nav>

            <div class="p-8 border-t border-indigo-800">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-indigo-400 rounded-full flex items-center justify-center font-bold">G</div>
                    <div>
                        <p class="text-sm font-bold uppercase tracking-tight">Gérant</p>
                        <p class="text-xs text-indigo-300">Admin Panel</p>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1 p-8">
            <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-800">Gestion des Hôtels</h2>
                    <p class="text-slate-500">Consultez, modifiez ou ajoutez vos établissements.</p>
                </div>
                <a href="{{ route('hotels.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-all transform hover:-translate-y-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Ajouter un hôtel
                </a>
            </header>

            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-white overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 border-b border-slate-100">
                        <tr>
                            <th class="px-8 py-5 text-xs font-black uppercase text-slate-400 tracking-wider">Hôtel</th>
                            <th class="px-8 py-5 text-xs font-black uppercase text-slate-400 tracking-wider">Adresse</th>
                            <th class="px-8 py-5 text-xs font-black uppercase text-slate-400 tracking-wider text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($hotels as $hotel)
                        <tr class="hover:bg-indigo-50/30 transition-colors group">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 rounded-2xl overflow-hidden shadow-sm border border-slate-100">
                                        <img src="{{ asset('storage/' . $hotel->image) }}" class="w-full h-full object-cover">
                                    </div>
                                    <a href="{{ route('hotels.show', $hotel->id) }}" class="font-bold text-slate-800 text-lg hover:text-indigo-600 transition-colors">
                                        {{ $hotel->nom }}
                                    </a>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="text-slate-500 font-medium">{{ $hotel->adresse }}</span>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('hotels.show', $hotel->id) }}" class="p-2.5 text-indigo-500 bg-indigo-50 rounded-xl hover:bg-indigo-600 hover:text-white transition-all shadow-sm" title="Voir les détails">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                    </a>
                                    <a href="{{ route('hotels.edit', $hotel->id) }}" class="p-2.5 text-amber-500 bg-amber-50 rounded-xl hover:bg-amber-500 hover:text-white transition-all shadow-sm" title="Modifier">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2.5 text-red-500 bg-red-50 rounded-xl hover:bg-red-500 hover:text-white transition-all shadow-sm" title="Supprimer">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="px-8 py-20 text-center text-slate-400">Aucun hôtel enregistré.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>
</html>
