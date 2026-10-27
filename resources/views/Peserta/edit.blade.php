<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Peserta - {{ $peserta->nama }}</title>
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --primary-light: #eef2ff;
            --primary-glow: rgba(79, 70, 229, 0.25);
            --amber-500: #f59e0b;
            --amber-glow: rgba(245, 158, 11, 0.2);
            --slate-50: #f8fafc;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-400: #94a3b8;
            --slate-600: #475569;
            --slate-700: #334155;
            --slate-800: #1e293b;
            --slate-900: #0f172a;
            --danger: #ef4444;
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
            background-color: #0b1120;
            background-image: 
                radial-gradient(at 0% 0%, rgba(245, 158, 11, 0.12) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(99, 102, 241, 0.16) 0px, transparent 50%),
                radial-gradient(at 50% 100%, rgba(236, 72, 153, 0.1) 0px, transparent 50%),
                linear-gradient(180deg, #090d16 0%, #0f172a 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2.5rem 1.25rem;
            color: var(--slate-100);
        }

        .wrapper {
            width: 100%;
            max-width: 580px;
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

        /* Nav link back */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--slate-400);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            padding: 8px 14px;
            border-radius: var(--radius-sm);
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(8px);
            transition: all 0.2s ease;
        }

        .back-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.15);
            transform: translateX(-3px);
        }

        .back-link svg {
            width: 16px;
            height: 16px;
            stroke-width: 2.2;
            transition: transform 0.2s ease;
        }

        .back-link:hover svg {
            transform: translateX(-2px);
        }

        /* Card Container */
        .card {
            background: rgba(17, 24, 39, 0.75);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: var(--radius-lg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.6),
                0 0 0 1px rgba(255, 255, 255, 0.04) inset;
            overflow: hidden;
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #f59e0b, #ec4899, #6366f1);
        }

        .card-header {
            padding: 2.25rem 2.25rem 1.5rem 2.25rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .header-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #fbbf24;
            background: rgba(245, 158, 11, 0.12);
            border: 1px solid rgba(245, 158, 11, 0.25);
            padding: 4px 10px;
            border-radius: 9999px;
        }

        .badge-dot {
            width: 6px;
            height: 6px;
            background-color: #fbbf24;
            border-radius: 50%;
            box-shadow: 0 0 8px #fbbf24;
        }

        .id-tag {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--slate-400);
            background: rgba(255, 255, 255, 0.05);
            padding: 4px 10px;
            border-radius: var(--radius-sm);
            border: 1px solid rgba(255, 255, 255, 0.06);
            letter-spacing: 0.05em;
        }

        .card-header h1 {
            font-size: 1.625rem;
            font-weight: 800;
            letter-spacing: -0.025em;
            color: #ffffff;
            margin-bottom: 0.35rem;
        }

        .card-header p {
            color: var(--slate-400);
            font-size: 0.9rem;
            line-height: 1.4;
        }

        /* Card Body */
        .card-body {
            padding: 2.25rem;
        }

        /* Global Alert */
        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.25);
            border-radius: var(--radius-md);
            padding: 1rem 1.25rem;
            margin-bottom: 1.75rem;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            color: #fca5a5;
            font-size: 0.875rem;
        }

        .alert-danger svg {
            flex-shrink: 0;
            width: 20px;
            height: 20px;
            margin-top: 1px;
        }

        .alert-danger ul {
            margin-left: 1rem;
            margin-top: 0.25rem;
            line-height: 1.5;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--slate-200);
            margin-bottom: 0.5rem;
            letter-spacing: 0.01em;
        }

        .form-label .required {
            color: #f43f5e;
            margin-left: 2px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            color: var(--slate-400);
            pointer-events: none;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s ease;
        }

        .input-icon svg {
            width: 20px;
            height: 20px;
        }

        .form-input {
            width: 100%;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ffffff;
            font-size: 0.95rem;
            padding: 0.875rem 1rem 0.875rem 2.85rem;
            border-radius: var(--radius-md);
            outline: none;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-input::placeholder {
            color: #64748b;
            font-weight: 400;
        }

        .form-input:hover {
            border-color: rgba(255, 255, 255, 0.2);
            background: rgba(15, 23, 42, 0.8);
        }

        .form-input:focus {
            border-color: #6366f1;
            background: rgba(15, 23, 42, 0.95);
            box-shadow: 0 0 0 4px var(--primary-glow);
        }

        .form-group:focus-within .input-icon {
            color: #818cf8;
        }

        .form-input.has-error {
            border-color: rgba(239, 68, 68, 0.6);
            background: rgba(239, 68, 68, 0.05);
        }

        .form-input.has-error:focus {
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.2);
            border-color: #ef4444;
        }

        .error-message {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #f87171;
            font-size: 0.8125rem;
            margin-top: 0.45rem;
            font-weight: 500;
        }

        .error-message svg {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
        }

        .input-hint {
            color: #64748b;
            font-size: 0.775rem;
            margin-top: 0.4rem;
            display: block;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 0.875rem 1.5rem;
            font-size: 0.9375rem;
            font-weight: 600;
            border-radius: var(--radius-md);
            cursor: pointer;
            text-decoration: none;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
        }

        .btn-cancel {
            background: transparent;
            color: var(--slate-400);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-cancel:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .btn-submit {
            background: linear-gradient(135deg, #4f46e5 0%, #6366f1 50%, #7c3aed 100%);
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.35);
            position: relative;
            overflow: hidden;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.5);
            filter: brightness(1.08);
        }

        .btn-submit:active {
            transform: translateY(0);
            box-shadow: 0 2px 10px rgba(79, 70, 229, 0.3);
        }

        .btn-submit svg {
            width: 18px;
            height: 18px;
            transition: transform 0.2s ease;
        }

        .btn-submit:hover svg {
            transform: scale(1.1);
        }

        /* Responsive */
        @media (max-width: 640px) {
            body {
                padding: 1.25rem 0.75rem;
            }

            .card-header {
                padding: 1.5rem 1.25rem;
            }

            .card-body {
                padding: 1.5rem 1.25rem;
            }

            .card-header h1 {
                font-size: 1.35rem;
            }

            .form-actions {
                flex-direction: column-reverse;
                gap: 10px;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <!-- Tombol Kembali -->
        <a href="{{ route('peserta.index') }}" class="back-link">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Kembali ke Daftar Peserta
        </a>

        <!-- Main Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="header-top">
                    <div class="badge">
                        <span class="badge-dot"></span>
                        Edit Peserta
                    </div>
                    <span class="id-tag">ID #{{ $peserta->id }}</span>
                </div>
                <h1>Perbarui Data Peserta</h1>
                <p>Ubah informasi peserta di bawah ini, lalu klik tombol Simpan Perubahan.</p>
            </div>

            <!-- Body & Form -->
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert-danger">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <div>
                            <strong>Perubahan belum dapat disimpan:</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form action="{{ route('peserta.update', $peserta->id) }}" method="POST" autocomplete="off" novalidate>
                    @csrf
                    @method('PUT')

                    <!-- Field Nama Lengkap -->
                    <div class="form-group">
                        <label for="nama" class="form-label">
                            Nama Lengkap <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <input 
                                type="text" 
                                name="nama" 
                                id="nama" 
                                class="form-input @error('nama') has-error @enderror" 
                                placeholder="Masukkan nama lengkap peserta" 
                                value="{{ old('nama', $peserta->nama) }}" 
                                required
                            >
                        </div>
                        @error('nama')
                            <div class="error-message">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $message }}</span>
                            </div>
                        @else
                            <small class="input-hint">Gunakan nama resmi atau sesuai tanda pengenal.</small>
                        @enderror
                    </div>

                    <!-- Field Email -->
                    <div class="form-group">
                        <label for="email" class="form-label">
                            Alamat Email <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                class="form-input @error('email') has-error @enderror" 
                                placeholder="contoh@domain.com" 
                                value="{{ old('email', $peserta->email) }}" 
                                required
                            >
                        </div>
                        @error('email')
                            <div class="error-message">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $message }}</span>
                            </div>
                        @else
                            <small class="input-hint">Email aktif untuk verifikasi dan konfirmasi pendaftaran.</small>
                        @enderror
                    </div>

                    <!-- Field Nomor HP / WhatsApp -->
                    <div class="form-group">
                        <label for="no_hp" class="form-label">
                            Nomor WhatsApp / HP <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </span>
                            <input 
                                type="tel" 
                                name="no_hp" 
                                id="no_hp" 
                                class="form-input @error('no_hp') has-error @enderror" 
                                placeholder="Contoh: 081234567890" 
                                value="{{ old('no_hp', $peserta->no_hp) }}" 
                                required
                            >
                        </div>
                        @error('no_hp')
                            <div class="error-message">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $message }}</span>
                            </div>
                        @else
                            <small class="input-hint">Nomor yang terhubung langsung ke WhatsApp aktif.</small>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="form-actions">
                        <a href="{{ route('peserta.index') }}" class="btn btn-cancel">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-submit">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
