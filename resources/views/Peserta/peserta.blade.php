<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Peserta Lomba - Dashboard</title>
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --primary-light: #eef2ff;
            --primary-glow: rgba(79, 70, 229, 0.35);
            --slate-50: #f8fafc;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-300: #cbd5e1;
            --slate-400: #94a3b8;
            --slate-500: #64748b;
            --slate-600: #475569;
            --slate-700: #334155;
            --slate-800: #1e293b;
            --slate-900: #0f172a;
            --success: #10b981;
            --success-bg: rgba(16, 185, 129, 0.12);
            --success-border: rgba(16, 185, 129, 0.3);
            --amber: #f59e0b;
            --amber-bg: rgba(245, 158, 11, 0.12);
            --danger: #ef4444;
            --danger-bg: rgba(239, 68, 68, 0.12);
            --radius-lg: 20px;
            --radius-md: 12px;
            --radius-sm: 8px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            min-height: 100vh;
            background-color: #080d1a;
            background-image: 
                radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(168, 85, 247, 0.12) 0px, transparent 50%),
                radial-gradient(at 50% 100%, rgba(14, 165, 233, 0.1) 0px, transparent 50%),
                linear-gradient(180deg, #070b14 0%, #0d1527 100%);
            color: var(--slate-100);
            padding: 2rem 1.5rem 3rem;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(16px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Top Navbar */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(17, 24, 39, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: var(--radius-lg);
            padding: 1rem 1.75rem;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.25) 0%, rgba(168, 85, 247, 0.2) 100%);
            border: 1px solid rgba(99, 102, 241, 0.35);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #818cf8;
        }

        .brand-icon svg {
            width: 22px;
            height: 22px;
        }

        .brand-text h2 {
            font-size: 1.15rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: #ffffff;
        }

        .brand-text span {
            font-size: 0.75rem;
            color: var(--slate-400);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .user-nav {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-pill {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 6px 12px;
            border-radius: 9999px;
            font-size: 0.85rem;
            color: var(--slate-200);
        }

        .user-avatar {
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, #6366f1, #a855f7);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
            color: white;
        }

        .btn-logout {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.25);
            color: #f87171;
            padding: 8px 14px;
            border-radius: var(--radius-sm);
            font-size: 0.825rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-logout:hover {
            background: #ef4444;
            color: white;
            border-color: #ef4444;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .btn-logout svg {
            width: 16px;
            height: 16px;
        }

        /* Success Alert */
        .alert-success {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 1rem 1.25rem;
            border-radius: var(--radius-md);
            font-size: 0.9rem;
            background: var(--success-bg);
            border: 1px solid var(--success-border);
            color: #6ee7b7;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15);
        }

        .alert-success svg {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        /* Header Action Section */
        .header-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .page-title h1 {
            font-size: 1.625rem;
            font-weight: 800;
            letter-spacing: -0.025em;
            color: #ffffff;
            margin-bottom: 0.25rem;
        }

        .page-title p {
            font-size: 0.875rem;
            color: var(--slate-400);
        }

        .action-bar {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* Search Input */
        .search-box {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-box svg {
            position: absolute;
            left: 12px;
            width: 16px;
            height: 16px;
            color: var(--slate-400);
            pointer-events: none;
        }

        .search-input {
            background: rgba(17, 24, 39, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ffffff;
            font-size: 0.875rem;
            padding: 0.65rem 1rem 0.65rem 2.4rem;
            border-radius: var(--radius-md);
            outline: none;
            width: 220px;
            transition: all 0.2s ease;
        }

        .search-input:focus {
            border-color: #6366f1;
            width: 260px;
            box-shadow: 0 0 0 3px var(--primary-glow);
        }

        /* Add Button */
        .btn-tambah {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #4f46e5 0%, #6366f1 50%, #7c3aed 100%);
            color: #ffffff;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 700;
            padding: 0.65rem 1.25rem;
            border-radius: var(--radius-md);
            box-shadow: 0 4px 16px rgba(79, 70, 229, 0.35);
            transition: all 0.25s ease;
        }

        .btn-tambah:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.5);
            filter: brightness(1.08);
        }

        .btn-tambah svg {
            width: 18px;
            height: 18px;
        }

        /* Table Card Container */
        .table-card {
            background: rgba(17, 24, 39, 0.75);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: var(--radius-lg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.6),
                0 0 0 1px rgba(255, 255, 255, 0.04) inset;
            overflow: hidden;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.9rem;
        }

        thead {
            background: rgba(15, 23, 42, 0.7);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        th {
            padding: 1.1rem 1.5rem;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--slate-400);
        }

        tbody tr {
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            transition: background 0.15s ease;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        tbody tr:hover {
            background: rgba(255, 255, 255, 0.03);
        }

        td {
            padding: 1.1rem 1.5rem;
            vertical-align: middle;
            color: var(--slate-200);
        }

        .number-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: var(--radius-sm);
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--slate-400);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar-initial {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.2), rgba(168, 85, 247, 0.15));
            border: 1px solid rgba(99, 102, 241, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.875rem;
            color: #a5b4fc;
        }

        .user-nama {
            font-weight: 600;
            color: #ffffff;
            font-size: 0.95rem;
        }

        .cell-email {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--slate-300);
        }

        .cell-email svg {
            width: 15px;
            height: 15px;
            color: var(--slate-500);
        }

        .cell-phone {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--slate-300);
            font-variant-numeric: tabular-nums;
        }

        .cell-phone svg {
            width: 15px;
            height: 15px;
            color: var(--slate-500);
        }

        /* Action Buttons */
        .actions-cell {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: var(--radius-sm);
            font-size: 0.8125rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
            border: none;
        }

        .btn-action-edit {
            background: var(--amber-bg);
            color: #fbbf24;
            border: 1px solid rgba(245, 158, 11, 0.25);
        }

        .btn-action-edit:hover {
            background: #f59e0b;
            color: #000000;
            border-color: #f59e0b;
            transform: translateY(-1px);
        }

        .btn-action-hapus {
            background: var(--danger-bg);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.25);
        }

        .btn-action-hapus:hover {
            background: #ef4444;
            color: #ffffff;
            border-color: #ef4444;
            transform: translateY(-1px);
        }

        .btn-action svg {
            width: 14px;
            height: 14px;
        }

        /* Empty State */
        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 1.25rem;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--slate-500);
        }

        .empty-icon svg {
            width: 32px;
            height: 32px;
        }

        .empty-state h3 {
            font-size: 1.125rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            font-size: 0.875rem;
            color: var(--slate-400);
            max-width: 360px;
            margin: 0 auto 1.5rem;
        }

        /* Table Footer */
        .table-footer {
            padding: 1rem 1.5rem;
            background: rgba(15, 23, 42, 0.5);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.8125rem;
            color: var(--slate-400);
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem 0.75rem 2rem;
            }

            .navbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
                padding: 1rem 1.25rem;
            }

            .user-nav {
                width: 100%;
                justify-content: space-between;
            }

            .header-actions {
                flex-direction: column;
                align-items: flex-start;
            }

            .action-bar {
                width: 100%;
                flex-direction: column;
                align-items: stretch;
            }

            .search-input {
                width: 100%;
            }

            .search-input:focus {
                width: 100%;
            }

            .btn-tambah {
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Top Navbar -->
        <nav class="navbar">
            <div class="brand">
                <div class="brand-icon">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="brand-text">
                    <h2>Portal Peserta</h2>
                    <span>Sistem Manajemen Lomba</span>
                </div>
            </div>

            <div class="user-nav">
                <div class="user-pill">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <span>{{ Auth::user()->name ?? 'Administrator' }}</span>
                </div>

                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn-logout" title="Keluar dari akun">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </nav>

        <!-- Flash Success Notification -->
        @if (session('success'))
            <div class="alert-success">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Header Actions Section -->
        <div class="header-actions">
            <div class="page-title">
                <h1>Daftar Peserta Lomba</h1>
                <p>Kelola data pendaftaran peserta lomba secara real-time.</p>
            </div>

            <div class="action-bar">
                <div class="search-box">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input 
                        type="text" 
                        id="searchInput" 
                        class="search-input" 
                        placeholder="Cari nama, email, HP..." 
                        autocomplete="off"
                    >
                </div>

                <a href="{{ route('peserta.create') }}" class="btn-tambah">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Peserta
                </a>
            </div>
        </div>

        <!-- Table Card -->
        <div class="table-card">
            <div class="table-responsive">
                <table id="pesertaTable">
                    <thead>
                        <tr>
                            <th style="width: 70px;">No</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat Email</th>
                            <th>No. WhatsApp / HP</th>
                            <th style="width: 170px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peserta as $index => $item)
                            <tr>
                                <td>
                                    <span class="number-badge">{{ $index + 1 }}</span>
                                </td>
                                <td>
                                    <div class="user-info">
                                        <div class="avatar-initial">
                                            {{ strtoupper(substr($item->nama, 0, 1)) }}
                                        </div>
                                        <span class="user-nama">{{ $item->nama }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="cell-email">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        {{ $item->email }}
                                    </span>
                                </td>
                                <td>
                                    <span class="cell-phone">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        {{ $item->no_hp }}
                                    </span>
                                </td>
                                <td>
                                    <div class="actions-cell" style="justify-content: center;">
                                        <a href="{{ route('peserta.edit', $item->id) }}" class="btn-action btn-action-edit" title="Edit Peserta">
                                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Edit
                                        </a>

                                        <form action="{{ route('peserta.destroy', $item->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus peserta \'{{ $item->nama }}\'? Data yang dihapus tidak dapat dikembalikan.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-action-hapus" title="Hapus Peserta">
                                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <div class="empty-icon">
                                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                            </svg>
                                        </div>
                                        <h3>Belum Ada Data Peserta</h3>
                                        <p>Data peserta lomba yang telah mendaftar akan ditampilkan di tabel ini.</p>
                                        <a href="{{ route('peserta.create') }}" class="btn-tambah">
                                            + Tambah Peserta Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Table Footer -->
            <div class="table-footer">
                <span>Total: <strong style="color: #ffffff;">{{ count($peserta) }}</strong> peserta terdaftar</span>
                <span id="filteredCount"></span>
            </div>
        </div>
    </div>

    <!-- Live Client-side Search Filter -->
    <script>
        const searchInput = document.getElementById('searchInput');
        const table = document.getElementById('pesertaTable');
        const tbody = table ? table.querySelector('tbody') : null;
        const filteredCount = document.getElementById('filteredCount');

        if (searchInput && tbody) {
            searchInput.addEventListener('input', function () {
                const filter = this.value.toLowerCase().trim();
                const rows = tbody.querySelectorAll('tr');
                let visibleCount = 0;
                let totalRows = 0;

                rows.forEach(row => {
                    // Abaikan baris empty-state
                    if (row.querySelector('.empty-state')) return;

                    totalRows++;
                    const text = row.innerText.toLowerCase();
                    if (text.includes(filter)) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                if (filter && totalRows > 0) {
                    filteredCount.textContent = `(Ditemukan: ${visibleCount} data)`;
                } else {
                    filteredCount.textContent = '';
                }
            });
        }
    </script>
</body>

</html>