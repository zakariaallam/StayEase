<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stay Easy | Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #7367f0;
            --primary-rgb: 115, 103, 240;
            --success: #28c76f;
            --danger: #ea5455;
            --warning: #ff9f43;
            --info: #00cfe8;
            --bg-body: #f8f7fa;
            --text-main: #5d596c;
            --text-light: #a5a3ae;
        }

        body {
            font-family: 'Public Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            margin: 0;
            padding: 0;
        }

        /* Sidebar Vuexy Layout */
        .v-sidebar {
            width: 260px;
            background: #fff;
            box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.05);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
        }

        .v-main {
            margin-left: 260px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        @media (max-width: 1024px) {
            .v-sidebar {
                transform: translateX(-100%);
            }

            .v-main {
                margin-left: 0;
            }
        }

        .nav-item {
            margin: 0.2rem 1rem;
            transition: all 0.2s ease;
            border-radius: 0.375rem;
            color: var(--text-main);
        }

        .nav-item:hover:not(.active) {
            background-color: #f5f5f9;
            transform: translateX(5px);
        }

        .nav-item.active {
            background: linear-gradient(72.47deg, var(--primary) 22.16%, rgba(115, 103, 240, 0.7) 76.47%);
            color: #fff !important;
            box-shadow: 0px 2px 6px rgba(var(--primary-rgb), 0.48);
        }

        .nav-item.active i {
            color: #fff !important;
        }

        /* Floating Navbar */
        .v-navbar {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(8px);
            margin: 0.75rem 1.5rem 0;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(165, 163, 174, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Card Component */
        .v-card {
            background: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(165, 163, 174, 0.3);
            border: none;
            margin-bottom: 1.5rem;
        }

        .v-card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #dbdade;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .v-card-body {
            padding: 1.5rem;
        }

        .v-badge-pill {
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 600;
            border-radius: 0.25rem;
            text-transform: uppercase;
        }

        .v-badge-light-primary {
            background: #e7e7ff;
            color: var(--primary);
        }

        .v-badge-light-warning {
            background: #fff3e0;
            color: var(--warning);
        }

        .v-badge-light-danger {
            background: #fceaea;
            color: var(--danger);
        }

        .v-badge-light-success {
            background: #e8f9ee;
            color: var(--success);
        }

        .v-table thead th {
            background-color: #f8f7fa;
            color: var(--text-light);
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 600;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #dbdade;
        }

        .tab-btn {
            border-bottom: 2px solid transparent;
            transition: all 0.3s;
        }

        .tab-btn.active {
            border-bottom: 2px solid var(--primary);
            color: var(--primary);
            font-weight: 600;
        }

        .view-section {
            display: none;
        }

        .view-section.active {
            display: block;
        }

        .v-modal-overlay {
            background: rgba(15, 20, 32, 0.5);
            backdrop-filter: blur(6px);
            z-index: 2000;
        }
    </style>
</head>

<body>

    <div class="flex">
        <!-- SIDEBAR -->
        <aside class="v-sidebar flex flex-col">
            <div class="px-6 py-8 flex items-center gap-3">
                <div class="w-9 h-9 bg-[#7367f0] rounded-lg flex items-center justify-center shadow-lg">
                    <i class="fas fa-paper-plane text-white text-lg"></i>
                </div>
                <h1 class="text-xl font-bold tracking-tight text-[#5d596c]">Stay Easy</h1>
            </div>

            <nav class="flex-1 space-y-1 overflow-y-auto">
                <p class="text-[11px] uppercase text-slate-400 font-bold px-8 mb-2 tracking-widest mt-2">Menu</p>
                <a href="javascript:void(0)" onclick="showView('dashboard')" id="nav-dashboard"
                    class="nav-item active flex items-center gap-3 px-4 py-2.5 text-sm font-medium">
                    <i class="fas fa-chart-pie w-5"></i><span>Dashboard</span>
                </a>
                <a href="javascript:void(0)" onclick="showView('approvals')" id="nav-approvals"
                    class="nav-item flex items-center gap-3 px-4 py-2.5 text-sm font-medium">
                    <i class="fas fa-shield-check w-5 text-slate-400"></i><span>Approbations</span>
                </a>
                <p class="text-[11px] uppercase text-slate-400 font-bold px-8 mt-6 mb-2 tracking-widest">Gestion</p>
                <a href="javascript:void(0)" onclick="showView('users')" id="nav-users"
                    class="nav-item flex items-center gap-3 px-4 py-2.5 text-sm font-medium">
                    <i class="fas fa-users w-5 text-slate-400"></i><span>Utilisateurs</span>
                </a>
                <a href="#" class="nav-item flex items-center gap-3 px-4 py-2.5 text-sm font-medium">
                    <i class="fas fa-city w-5 text-slate-400"></i><span>Établissements</span>
                </a>
            </nav>

            <div class="p-6 border-t border-slate-100 bg-slate-50/50">
                <div class="flex items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=7367f0&color=fff"
                        class="w-9 h-9 rounded-full">
                    <div class="overflow-hidden">
                        <p class="text-xs font-bold truncate">{{ Auth::user()->name ?? 'Super Admin' }}</p>
                        <p class="text-[10px] text-slate-500 uppercase">Admin</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- MAIN AREA -->
        <div class="v-main flex-1">
            <!-- NAVBAR -->
            <header class="v-navbar px-6 py-3 flex justify-between items-center sticky top-3 z-40">
                <div class="flex items-center gap-2 text-sm">
                    <i class="fas fa-bars lg:hidden mr-4 cursor-pointer text-slate-500"></i>
                    <span class="text-slate-400">Pages</span>
                    <i class="fas fa-chevron-right text-[10px] text-slate-300"></i>
                    <span class="font-semibold text-slate-700 uppercase text-xs tracking-wider"
                        id="breadcrumb-title">Dashboard</span>
                </div>
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <i class="fas fa-bell text-slate-400 cursor-pointer"></i>
                        <span
                            class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </div>
                    <div class="h-6 w-px bg-slate-200 mx-2"></div>
                    <button
                        class="bg-primary text-white px-4 py-1.5 rounded-md text-xs font-bold shadow-md hover:shadow-indigo-200 transition-all">
                        Déconnexion
                    </button>
                </div>
            </header>

            <div class="px-6 md:px-8 py-8 mt-4 max-w-[1440px] mx-auto">

                <!-- VIEW: DASHBOARD -->
                <div id="view-dashboard" class="view-section active">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="v-card p-6">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="text-slate-400 text-xs font-bold uppercase">Utilisateurs</h4>
                                <div class="w-8 h-8 bg-indigo-50 text-primary rounded flex items-center justify-center">
                                    <i class="fas fa-user text-sm"></i></div>
                            </div>
                            <p class="text-2xl font-bold">{{ $totalUsers ?? '2,456' }}</p>
                        </div>
                        <div class="v-card p-6 border-l-4 border-l-orange-400">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="text-slate-400 text-xs font-bold uppercase">En attente</h4>
                                <div
                                    class="w-8 h-8 bg-orange-50 text-orange-400 rounded flex items-center justify-center">
                                    <i class="fas fa-clock text-sm"></i></div>
                            </div>
                            <p class="text-2xl font-bold">{{ $pendingApprovals ?? '5' }}</p>
                        </div>
                    </div>
                </div>

                <!-- VIEW: APPROVALS -->
                <div id="view-approvals" class="view-section">
                    <div class="v-card overflow-hidden">
                        <div class="flex border-b border-slate-100 bg-slate-50/50">
                            <button onclick="toggleTab('managers')" id="btn-managers"
                                class="tab-btn active px-8 py-5 text-sm font-bold flex items-center gap-3">
                                <i class="fas fa-user-tie text-xs"></i> Demandes Gérants
                            </button>
                            <button onclick="toggleTab('hotels')" id="btn-hotels"
                                class="tab-btn px-8 py-5 text-sm font-bold text-slate-400 flex items-center gap-3">
                                <i class="fas fa-hotel text-xs"></i> Hôtels à Valider
                            </button>
                        </div>

                        <!-- TAB: MANAGERS -->
                        <div id="tab-managers" class="p-0">
                            <table class="w-full v-table text-left">
                                <thead>
                                    <tr>
                                        <th>Candidat</th>
                                        <th>Justificatifs</th>
                                        <th>Date</th>
                                        <th class="text-center">Décision</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-slate-100">
                                    <tr class="hover:bg-slate-50/50 transition-all">
                                        <td class="px-8 py-5">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-9 h-9 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold text-xs shadow-sm">
                                                    MB</div>
                                                <div>
                                                    <p class="font-bold text-slate-700">Marc Boulanger</p>
                                                    <p class="text-[11px] text-slate-400">marc.b@hotel.fr</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-5">
                                            <a href="#"
                                                class="v-badge-pill v-badge-light-primary border-none cursor-pointer"><i
                                                    class="fas fa-file-pdf mr-1"></i> KBIS.pdf</a>
                                        </td>
                                        <td class="px-8 py-5 text-slate-400 text-xs">Il y a 2h</td>
                                        <td class="px-8 py-5 text-center">
                                            <div class="flex justify-center gap-2">
                                                <button onclick="openModal('approve', 'Marc')"
                                                    class="w-8 h-8 bg-emerald-50 text-emerald-500 rounded-lg flex items-center justify-center hover:bg-emerald-500 hover:text-white transition-all"><i
                                                        class="fas fa-check"></i></button>
                                                <button onclick="openModal('reject', 'Marc')"
                                                    class="w-8 h-8 bg-rose-50 text-rose-500 rounded-lg flex items-center justify-center hover:bg-rose-500 hover:text-white transition-all"><i
                                                        class="fas fa-times"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- TAB: HOTELS -->
                        <div id="tab-hotels" class="hidden p-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($pendingHotels as $pendingHotel)
                                    <div
                                        class="v-card border border-slate-100 overflow-hidden group flex flex-col h-full">
                                        <div class="h-40 bg-slate-100 overflow-hidden">
                                            <img src="{{ asset('storage/' . $pendingHotel->image) }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        </div>
                                        <div class="p-5 flex-1 flex flex-col">
                                            <h4 class="font-bold text-slate-800 text-sm mb-1">
                                                {{ $pendingHotel->name }}
                                            </h4>
                                            <p class="text-[10px] text-slate-400 uppercase mb-4">
                                                {{ $pendingHotel->city }}, {{ $pendingHotel->adresse}}
                                            </p>

                                            <div class="mt-auto flex gap-2">
                                                <form action="{{ route('admin.hotels.approve', $pendingHotel->id) }}"
                                                    method="POST" class="flex-1">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                        class="w-full bg-primary text-white text-xs font-bold py-2 rounded-lg shadow-sm">
                                                        Publier
                                                    </button>
                                                </form>
                                                <button class="px-3 bg-slate-50 text-slate-400 rounded-lg">
                                                    <i class="fas fa-eye text-xs"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                <!-- VIEW: USERS -->
                <div id="view-users" class="view-section">
                    <div class="v-card overflow-hidden">
                        <div class="v-card-header">
                            <h5 class="font-bold text-slate-800">Gestion Utilisateurs</h5>
                            <button class="bg-primary text-white px-4 py-1.5 rounded-md text-xs font-bold">+
                                Ajouter</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full v-table text-left">
                                <thead>
                                    <tr>
                                        <th>Utilisateur</th>
                                        <th>Rôle actuel</th>
                                        <th>Statut</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-slate-100">
                                    @foreach ($allusers as $user )
                                    <tr class="hover:bg-slate-50/50 transition-all">
                                        <td class="px-8 py-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-9 h-9 rounded-full bg-indigo-50 text-primary flex items-center justify-center font-bold text-xs">
                                                    JD</div>
                                                <div>
                                                    <p class="font-bold text-slate-700">{{ $user->name }}</p>
                                                    <p class="text-[10px] text-slate-400 italic tracking-tight">
                                                        {{$user->email}}/p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-4"><span
                                                class="v-badge-pill v-badge-light-primary">{{ $user->role }}</span></td>
                                        <td class="px-8 py-4"><span
                                                class="v-badge-pill v-badge-light-success">Actif</span></td>
                                        <td class="px-8 py-4 text-center">
                                            <div class="flex justify-center gap-3 text-slate-300">
                                                <button onclick="openModal('change-role', 'Jean Dupont')"
                                                    class="hover:text-primary"><i
                                                        class="fas fa-user-tag text-sm"></i></button>
                                                <button onclick="openModal('ban', 'Jean Dupont')"
                                                    class="hover:text-danger"><i
                                                        class="fas fa-user-slash text-sm"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- MODAL: CHANGE ROLE -->
    <div id="modal-change-role" class="v-modal-overlay fixed inset-0 hidden items-center justify-center p-4">
        <div class="bg-white rounded-xl w-full max-w-sm shadow-2xl overflow-hidden transform scale-95 transition-all duration-200"
            id="modal-role-content">
            <div class="p-8">
                <h3 class="text-xl font-bold text-slate-800 mb-2">Modifier le rôle</h3>
                <p class="text-sm text-slate-400 mb-6">Changer le rôle de <span id="role-target-name"
                        class="font-bold text-slate-700">Utilisateur</span></p>

                <form action="#" method="POST">
                    <div class="mb-6">
                        <label
                            class="text-[10px] uppercase font-bold text-slate-400 mb-2 block tracking-widest">Nouveau
                            Rôle</label>
                        <select name="role"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:ring-1 focus:ring-primary outline-none">
                            <option value="client">Client</option>
                            <option value="gerant">Gérant d'établissement</option>
                            <option value="admin">Administrateur</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <button type="submit"
                            class="w-full bg-primary text-white font-bold py-3 rounded-lg shadow-lg hover:shadow-indigo-200 transition-all">Sauvegarder</button>
                        <button type="button" onclick="closeModal('change-role')"
                            class="w-full text-slate-400 text-xs font-bold py-2 uppercase">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL: BAN -->
    <div id="modal-ban" class="v-modal-overlay fixed inset-0 hidden items-center justify-center p-4">
        <div class="bg-white rounded-xl w-full max-w-sm shadow-2xl p-8 text-center scale-95 transition-all"
            id="modal-ban-content">
            <div
                class="w-16 h-16 bg-rose-50 text-rose-500 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                <i class="fas fa-user-slash"></i></div>
            <h3 class="text-xl font-bold text-slate-800 mb-2">Confirmer le bannissement ?</h3>
            <p class="text-sm text-slate-400 mb-8">L'accès sera immédiatement révoqué.</p>
            <div class="flex flex-col gap-2">
                <button onclick="closeModal('ban')"
                    class="w-full bg-danger text-white font-bold py-3 rounded-lg shadow-lg">Bannir</button>
                <button onclick="closeModal('ban')"
                    class="w-full text-slate-400 text-xs font-bold py-2 uppercase">Annuler</button>
            </div>
        </div>
    </div>

    <script>
        function showView(viewId) {
            document.querySelectorAll('.view-section').forEach(view => view.classList.remove('active'));
            document.getElementById('view-' + viewId).classList.add('active');

            document.querySelectorAll('.nav-item').forEach(item => item.classList.remove('active'));
            const activeNav = document.getElementById('nav-' + viewId);
            if (activeNav) activeNav.classList.add('active');

            const titles = {
                dashboard: "Dashboard",
                approvals: "Approbations",
                users: "Utilisateurs"
            };
            document.getElementById('breadcrumb-title').innerText = titles[viewId] || "Admin";
        }

        function toggleTab(tabId) {
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
                btn.classList.add('text-slate-400');
            });
            document.getElementById('btn-' + tabId).classList.add('active');
            document.getElementById('btn-' + tabId).classList.remove('text-slate-400');

            document.querySelectorAll('[id^="tab-"]').forEach(content => content.classList.add('hidden'));
            document.getElementById('tab-' + tabId).classList.remove('hidden');
        }

        function openModal(modalId, name = '') {
            if (name && document.getElementById('role-target-name')) {
                document.getElementById('role-target-name').innerText = name;
            }
            const overlay = document.getElementById('modal-' + modalId);
            const content = overlay.querySelector('.scale-95');

            overlay.classList.remove('hidden');
            overlay.classList.add('flex');
            setTimeout(() => content.classList.replace('scale-95', 'scale-100'), 10);
        }

        function closeModal(modalId) {
            const overlay = document.getElementById('modal-' + modalId);
            const content = overlay.querySelector('.scale-100');

            content.classList.replace('scale-100', 'scale-95');
            setTimeout(() => {
                overlay.classList.add('hidden');
                overlay.classList.remove('flex');
            }, 200);
        }
    </script>
</body>

</html>
