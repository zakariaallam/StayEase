<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stay Easy | Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Public Sans', sans-serif;
            background-color: #f4f7fa;
        }
        .sidebar-link.active {
            background-color: #6366f1;
            color: white;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.35);
        }
        .card {
            background: white;
            border-radius: 0.75rem;
            border: 1px solid #e2e8f0;
            transition: all 0.2s;
        }
        .view-section { display: none; }
        .view-section.active { display: block; }
        
        /* Custom scrollbar for minimalist look */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #c7d2fe; border-radius: 10px; }
    </style>
</head>
<body class="text-slate-700">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-72 bg-white border-r border-slate-200 flex-shrink-0 hidden lg:flex flex-col">
            <div class="p-8">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-indigo-200">
                        <i class="fas fa-hotel"></i>
                    </div>
                    <h1 class="text-xl font-bold tracking-tight text-slate-800">Stay Easy</h1>
                </div>
                
                <nav class="space-y-2">
                    <p class="text-[11px] uppercase font-bold text-slate-400 mb-4 px-4 tracking-widest">Menu Principal</p>
                    
                    <a href="javascript:void(0)" onclick="showView('dashboard')" id="nav-dashboard" class="sidebar-link active flex items-center gap-3 px-4 py-3 rounded-lg transition-all group">
                        <i class="fas fa-th-large w-5 text-center"></i>
                        <span class="font-medium">Vue d'ensemble</span>
                    </a>
                    
                    <a href="javascript:void(0)" onclick="showView('users')" id="nav-users" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 transition-all">
                        <i class="fas fa-users w-5 text-center"></i>
                        <span class="font-medium">Utilisateurs</span>
                    </a>

                    <a href="javascript:void(0)" onclick="showView('roles')" id="nav-roles" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 transition-all">
                        <i class="fas fa-user-shield w-5 text-center"></i>
                        <span class="font-medium">Gestion des Rôles</span>
                    </a>

                    <a href="javascript:void(0)" onclick="showView('moderation')" id="nav-moderation" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 transition-all relative">
                        <i class="fas fa-gavel w-5 text-center"></i>
                        <span class="font-medium">Modération</span>
                        <span class="absolute right-4 bg-orange-500 text-white text-[10px] px-1.5 py-0.5 rounded-full font-bold">3</span>
                    </a>
                    
                    <div class="pt-6 border-t border-slate-100 mt-4">
                        <p class="text-[11px] uppercase font-bold text-slate-400 mb-4 px-4 tracking-widest">Hébergement</p>
                        <a href="#" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 transition-all">
                            <i class="fas fa-building w-5 text-center"></i>
                            <span class="font-medium">Hôtels</span>
                        </a>
                    </div>
                </nav>
            </div>

            <div class="mt-auto p-6 bg-slate-50 border-t border-slate-200">
                <div class="flex items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name=Admin+User&background=6366f1&color=fff" class="w-10 h-10 rounded-full border-2 border-white shadow-sm" alt="Admin">
                    <div class="overflow-hidden">
                        <p class="text-sm font-bold text-slate-800 truncate">{{ Auth::user()->name}}</p>
                        <p class="text-xs text-slate-500 truncate">{{ Auth::user()->email}}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <!-- Header -->
            <header class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-10 px-8 py-4 flex justify-between items-center">
                <h2 id="view-title" class="text-lg font-semibold text-slate-800">Vue d'ensemble</h2>
                <div class="flex items-center gap-6">
                    <div class="relative hidden sm:block">
                        <input type="text" placeholder="Recherche rapide..." class="pl-10 pr-4 py-2 bg-slate-100 border-transparent rounded-xl text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500 transition-all w-64">
                        <i class="fas fa-search absolute left-4 top-3 text-slate-400 text-xs"></i>
                    </div>
                    <button class="relative text-slate-500 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-bell"></i>
                        <span class="absolute -top-1 -right-1 w-2 h-2 bg-rose-500 rounded-full border-2 border-white"></span>
                    </button>
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-xl text-sm font-medium hover:bg-indigo-700 transition-all shadow-md shadow-indigo-100">Déconnexion</button>
                </div>
            </header>

            <div class="p-8 max-w-7xl mx-auto">
                
                <!-- SECTION: DASHBOARD (STATISTICS + TABLE) -->
                <div id="view-dashboard" class="view-section active">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="card p-6 border-b-4 border-b-indigo-500">
                            <div class="flex justify-between items-start mb-4">
                                <div class="p-3 bg-indigo-50 text-indigo-600 rounded-xl"><i class="fas fa-users"></i></div>
                                <span class="text-xs font-bold text-green-500 bg-green-50 px-2 py-1 rounded-md">+14%</span>
                            </div>
                            <h4 class="text-slate-400 text-sm font-medium">Utilisateurs</h4>
                            <p class="text-2xl font-bold">2,456</p>
                        </div>
                        <div class="card p-6 border-b-4 border-b-orange-500">
                            <div class="flex justify-between items-start mb-4">
                                <div class="p-3 bg-orange-50 text-orange-600 rounded-xl"><i class="fas fa-clock"></i></div>
                                <span class="text-xs font-bold text-orange-500 bg-orange-50 px-2 py-1 rounded-md">3 En attente</span>
                            </div>
                            <h4 class="text-slate-400 text-sm font-medium">Demandes Gérants</h4>
                            <p class="text-2xl font-bold">18</p>
                        </div>
                        <div class="card p-6 border-b-4 border-b-emerald-500">
                            <div class="flex justify-between items-start mb-4">
                                <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl"><i class="fas fa-hotel"></i></div>
                                <span class="text-xs font-bold text-green-500 bg-green-50 px-2 py-1 rounded-md">+5</span>
                            </div>
                            <h4 class="text-slate-400 text-sm font-medium">Hôtels Actifs</h4>
                            <p class="text-2xl font-bold">142</p>
                        </div>
                        <div class="card p-6 border-b-4 border-b-rose-500">
                            <div class="flex justify-between items-start mb-4">
                                <div class="p-3 bg-rose-50 text-rose-600 rounded-xl"><i class="fas fa-chart-line"></i></div>
                                <span class="text-xs font-bold text-indigo-400">Mensuel</span>
                            </div>
                            <h4 class="text-slate-400 text-sm font-medium">Revenu (Net)</h4>
                            <p class="text-2xl font-bold">12,840€</p>
                        </div>
                    </div>

                    <!-- New Table: Dernières Réservations -->
                    <div class="card overflow-hidden mb-8">
                        <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-white">
                            <div>
                                <h3 class="font-bold text-slate-800">Dernières Activités de Réservation</h3>
                                <p class="text-xs text-slate-400 mt-1">Aperçu en temps réel des flux clients.</p>
                            </div>
                            <button class="text-indigo-600 text-sm font-semibold hover:underline">Voir tout</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="bg-slate-50 text-slate-500 text-[11px] uppercase font-bold tracking-wider">
                                    <tr>
                                        <th class="px-6 py-4">Client</th>
                                        <th class="px-6 py-4">Hôtel</th>
                                        <th class="px-6 py-4">Date Séjour</th>
                                        <th class="px-6 py-4">Montant</th>
                                        <th class="px-6 py-4">Statut</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-sm">
                                    <tr class="hover:bg-slate-50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="font-semibold">Sophie Martin</div>
                                            <div class="text-[10px] text-slate-400">ID: #RES-9021</div>
                                        </td>
                                        <td class="px-6 py-4 text-slate-600">Grand Plaza Paris</td>
                                        <td class="px-6 py-4 text-slate-500">12 - 15 Fév. 2024</td>
                                        <td class="px-6 py-4 font-bold">450€</td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 py-1 bg-green-100 text-green-700 text-[10px] font-bold rounded">Confirmé</span>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="font-semibold">Thomas Muller</div>
                                            <div class="text-[10px] text-slate-400">ID: #RES-8842</div>
                                        </td>
                                        <td class="px-6 py-4 text-slate-600">Villa Azure Nice</td>
                                        <td class="px-6 py-4 text-slate-500">18 - 20 Fév. 2024</td>
                                        <td class="px-6 py-4 font-bold">280€</td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 py-1 bg-orange-100 text-orange-700 text-[10px] font-bold rounded">En attente</span>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="font-semibold">Elena Rodriguez</div>
                                            <div class="text-[10px] text-slate-400">ID: #RES-8710</div>
                                        </td>
                                        <td class="px-6 py-4 text-slate-600">Spa Resort Chamonix</td>
                                        <td class="px-6 py-4 text-slate-500">05 - 10 Mars 2024</td>
                                        <td class="px-6 py-4 font-bold">1,120€</td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 py-1 bg-green-100 text-green-700 text-[10px] font-bold rounded">Confirmé</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- SECTION: USERS -->
                <div id="view-users" class="view-section">
                    <div class="card overflow-hidden shadow-sm">
                        <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                            <h3 class="font-bold text-slate-800 text-lg">Liste des Utilisateurs</h3>
                            <div class="flex gap-2">
                                <button class="bg-indigo-50 text-indigo-600 px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-100">Exporter</button>
                                <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700">Ajouter</button>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-slate-50 text-slate-500 text-[11px] uppercase font-bold tracking-wider">
                                    <tr>
                                        <th class="px-6 py-4 text-left">Utilisateur</th>
                                        <th class="px-6 py-4 text-left">Rôle</th>
                                        <th class="px-6 py-4 text-left">Statut</th>
                                        <th class="px-6 py-4 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    <tr class="hover:bg-slate-50">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center font-bold">JD</div>
                                                <div>
                                                    <p class="text-sm font-bold">Jean Dupont</p>
                                                    <p class="text-xs text-slate-500">jean@email.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4"><span class="px-2 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold rounded uppercase">Client</span></td>
                                        <td class="px-6 py-4"><span class="flex items-center gap-1.5 text-xs text-green-600"><span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Actif</span></td>
                                        <td class="px-6 py-4">
                                            <div class="flex justify-center gap-2">
                                                <button class="p-2 text-slate-400 hover:text-indigo-600"><i class="fas fa-edit"></i></button>
                                                <button onclick="confirmBan('Jean Dupont')" class="p-2 text-slate-400 hover:text-rose-600" title="Bannir"><i class="fas fa-user-slash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-slate-50">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold">MR</div>
                                                <div>
                                                    <p class="text-sm font-bold">Marc Riviera</p>
                                                    <p class="text-xs text-slate-500">marc@hotelcentral.fr</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4"><span class="px-2 py-1 bg-purple-50 text-purple-600 text-[10px] font-bold rounded uppercase">Gérant</span></td>
                                        <td class="px-6 py-4"><span class="flex items-center gap-1.5 text-xs text-green-600"><span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Actif</span></td>
                                        <td class="px-6 py-4">
                                            <div class="flex justify-center gap-2">
                                                <button class="p-2 text-slate-400 hover:text-indigo-600"><i class="fas fa-edit"></i></button>
                                                <button class="p-2 text-slate-400 hover:text-rose-600"><i class="fas fa-user-slash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- SECTION: ROLES -->
                <div id="view-roles" class="view-section">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div class="card p-6 h-fit">
                            <h3 class="font-bold text-slate-800 mb-4">Créer / Modifier un Rôle</h3>
                            <form class="space-y-4" action="{{ route('role.save') }}" method="post">
                                @csrf
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase">Nom du rôle</label>
                                    <input type="text" placeholder="ex: Modérateur" name="role" class="w-full mt-1 p-3 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
                                </div>
                                {{-- <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase">Permissions</label>
                                    <div class="mt-2 space-y-2">
                                        <label class="flex items-center gap-2 text-sm"><input type="checkbox" class="rounded text-indigo-600"> Gérer les hôtels</label>
                                        <label class="flex items-center gap-2 text-sm"><input type="checkbox" class="rounded text-indigo-600"> Voir les statistiques</label>
                                        <label class="flex items-center gap-2 text-sm"><input type="checkbox" class="rounded text-indigo-600"> Bannir des membres</label>
                                    </div>
                                </div> --}}
                                <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-bold text-sm hover:bg-indigo-700 transition-all shadow-md shadow-indigo-100">Enregistrer le rôle</button>
                            </form>
                        </div>
                        
                        <div class="lg:col-span-2 card overflow-hidden shadow-sm">
                            <div class="p-6 border-b border-slate-100">
                                <h3 class="font-bold text-slate-800">Rôles Existants</h3>
                            </div>
                            <table class="w-full">
                                <thead class="bg-slate-50 text-slate-500 text-[11px] uppercase font-bold">
                                    <tr>
                                        <th class="px-6 py-4 text-left">Nom</th>
                                        <th class="px-6 py-4 text-left">Utilisateurs</th>
                                        <th class="px-6 py-4 text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-sm">
                                    <tr>
                                        <td class="px-6 py-4 font-bold text-indigo-600">Administrateur</td>
                                        <td class="px-6 py-4 text-slate-500">2 membres</td>
                                        <td class="px-6 py-4 text-right space-x-2">
                                            <button class="text-slate-400 hover:text-indigo-600"><i class="fas fa-edit"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-bold text-purple-600">Gérant</td>
                                        <td class="px-6 py-4 text-slate-500">45 membres</td>
                                        <td class="px-6 py-4 text-right space-x-2">
                                            <button class="text-slate-400 hover:text-indigo-600"><i class="fas fa-edit"></i></button>
                                            <button class="text-slate-400 hover:text-rose-600"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-bold text-blue-600">Client</td>
                                        <td class="px-6 py-4 text-slate-500">2,409 membres</td>
                                        <td class="px-6 py-4 text-right space-x-2">
                                            <button class="text-slate-400 hover:text-indigo-600"><i class="fas fa-edit"></i></button>
                                            <button class="text-slate-400 hover:text-rose-600"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- SECTION: MODERATION -->
                <div id="view-moderation" class="view-section">
                    <div class="card overflow-hidden border-orange-100 shadow-sm">
                        <div class="p-6 bg-orange-50/50 border-b border-orange-100 flex justify-between items-center">
                            <div>
                                <h3 class="font-bold text-orange-800">Demandes de Statut Gérant</h3>
                                <p class="text-sm text-orange-600">Ces utilisateurs souhaitent gérer un établissement.</p>
                            </div>
                            <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-md shadow-orange-100">3 Nouvelles</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-slate-50 text-slate-500 text-[11px] uppercase font-bold tracking-wider">
                                    <tr>
                                        <th class="px-6 py-4 text-left">Candidat</th>
                                        <th class="px-6 py-4 text-left">Hôtel / Entreprise</th>
                                        <th class="px-6 py-4 text-left">Justificatif</th>
                                        <th class="px-6 py-4 text-right">Décision</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    <tr class="hover:bg-slate-50">
                                        <td class="px-6 py-4">
                                            <div class="font-bold text-sm">Alice Bernard</div>
                                            <div class="text-xs text-slate-500">alice@hotel-luxe.com</div>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium">Hôtel de la Plage</td>
                                        <td class="px-6 py-4">
                                            <button class="text-indigo-600 text-xs hover:underline flex items-center gap-1">
                                                <i class="fas fa-file-pdf"></i> KBIS_Document.pdf
                                            </button>
                                        </td>
                                        <td class="px-6 py-4 text-right space-x-2">
                                            <button onclick="handleRequest('Alice', 'validée')" class="bg-green-600 text-white px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-green-700">Valider</button>
                                            <button onclick="handleRequest('Alice', 'rejetée')" class="bg-slate-200 text-slate-700 px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-slate-300">Rejeter</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- Feedback Modal Mockup -->
    <div id="feedback-toast" class="fixed bottom-8 right-8 bg-slate-900 text-white px-6 py-3 rounded-xl shadow-2xl transition-all transform translate-y-24 opacity-0 flex items-center gap-3 z-50">
        <div class="w-2 h-2 bg-indigo-500 rounded-full animate-pulse"></div>
        <span id="toast-message" class="text-sm font-medium">Action effectuée avec succès.</span>
    </div>

    <script>
        function showView(viewId) {
            // Cache les sections
            document.querySelectorAll('.view-section').forEach(section => {
                section.classList.remove('active');
            });
            // Affiche la section cible
            document.getElementById('view-' + viewId).classList.add('active');

            // Mise à jour de la sidebar
            document.querySelectorAll('.sidebar-link').forEach(link => {
                link.classList.remove('active', 'bg-indigo-600', 'text-white', 'shadow-md');
                link.classList.add('text-slate-500');
            });
            const activeLink = document.getElementById('nav-' + viewId);
            activeLink.classList.add('active');
            activeLink.classList.remove('text-slate-500');

            // Mise à jour du titre du header
            const titles = {
                'dashboard': "Vue d'ensemble",
                'users': "Gestion des Utilisateurs",
                'roles': "Gestion des Rôles",
                'moderation': "Modération & Demandes"
            };
            document.getElementById('view-title').innerText = titles[viewId];
        }

        function showToast(message) {
            const toast = document.getElementById('feedback-toast');
            document.getElementById('toast-message').innerText = message;
            toast.classList.remove('translate-y-24', 'opacity-0');
            
            setTimeout(() => {
                toast.classList.add('translate-y-24', 'opacity-0');
            }, 3000);
        }

        function confirmBan(userName) {
            if (confirm(`Êtes-vous sûr de vouloir bannir ${userName} ? L'utilisateur ne pourra plus se connecter.`)) {
                showToast(`${userName} a été banni du système.`);
            }
        }

        function handleRequest(userName, action) {
            showToast(`La demande de ${userName} a été ${action}.`);
        }
    </script>
</body>
</html>