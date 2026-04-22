<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Login — NELITA SYNC</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;600;800&display=swap"
        rel="stylesheet">

    {{-- Vite / Asset Loading --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<style>
    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: #ffffff;
        /* Putih bersih di mobile */
        min-height: 100vh;
        display: flex;
        overflow-x: hidden;
    }

    .main-container {
        display: flex;
        width: 100%;
        min-height: 100vh;
    }

    /* ─────────────────────────────────────
       SIDEBAR VISUAL (HANYA DESKTOP)
    ───────────────────────────────────── */
    .side-visual {
        display: none;
        flex: 1.2;
        background: linear-gradient(135deg, #1F4ED8 0%, #1e40af 100%);
        position: relative;
        overflow: hidden;
        color: white;
        padding: 60px;
        flex-direction: column;
        justify-content: space-between;
    }

    .side-visual::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px);
        background-size: 30px 30px;
    }

    /* ─────────────────────────────────────
       FORM SECTION (ADAPTIF)
    ───────────────────────────────────── */
    .form-section {
        flex: 1;
        display: flex;
        flex-direction: column;
        background: #ffffff;
    }

    /* HEADER BLOB (HANYA MOBILE) */
    .mobile-blob-header {
        position: relative;
        height: 240px;
        background: linear-gradient(145deg, #1F4ED8 0%, #2563EB 55%, #14B8A6 100%);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding-bottom: 25px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .mobile-blob-header::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        right: 0;
        height: 40px;
        background: #ffffff;
        border-radius: 50% 50% 0 0 / 100% 100% 0 0;
    }

    .logo-ring {
        width: 68px;
        height: 68px;
        border-radius: 20px;
        background: rgb(255, 255, 255);
        border: 1px solid rgba(255, 255, 255, 0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 14px;
        position: relative;
        z-index: 2;
        backdrop-filter: blur(4px);
    }

    .app-name-mobile {
        color: white;
        font-size: 22px;
        font-weight: 800;
        letter-spacing: 1.5px;
        position: relative;
        z-index: 2;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
    }

    /* FORM CONTAINER */
    .form-container {
        padding: 0 32px 40px;
        width: 100%;
        max-width: 420px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .welcome-title {
        font-size: 24px;
        font-weight: 800;
        color: #0f172a;
        text-align: center;
        margin-top: 10px;
    }

    .welcome-sub {
        font-size: 15px;
        color: #475569;
        text-align: center;
        margin-bottom: 30px;
        margin-top: 5px;
    }

    /* INPUTS */
    .field {
        margin-bottom: 18px;
    }

    .field label {
        display: block;
        font-size: 11px;
        font-weight: 700;
        color: #64748b;
        margin-bottom: 7px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .input-wrap input {
        width: 100%;
        padding: 15px 18px;
        border: 1.5px solid #e2e8f0;
        border-radius: 14px;
        background: #fff;
        font-size: 15px;
        font-family: 'DM Sans', sans-serif;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .input-wrap input:focus {
        outline: none;
        border-color: #1F4ED8;
        box-shadow: 0 0 0 4px rgba(31, 78, 216, 0.1);
    }

    /* BUTTON */
    .btn-login {
        width: 100%;
        padding: 16px;
        border-radius: 14px;
        border: none;
        background: linear-gradient(135deg, #1F4ED8, #2563EB);
        color: #fff;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        margin-top: 10px;
        box-shadow: 0 6px 20px rgba(31, 78, 216, 0.25);
        transition: transform 0.1s;
    }

    .btn-login:active {
        transform: scale(0.98);
    }

    /* ROLE CHIPS */
    .role-chips {
        display: flex;
        justify-content: center;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 30px;
    }

    .chip {
        padding: 7px 14px;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 100px;
        font-size: 11px;
        color: #64748b;
        font-weight: 600;
    }

    /* FOOTER */
    .footer-text {
        text-align: center;
        font-size: 11px;
        color: #94a3b8;
        margin-top: auto;
        padding: 40px 0 20px;
    }

    /* ─────────────────────────────────────
       BREAKPOINT: DESKTOP (992px+)
    ───────────────────────────────────── */
    @media (min-width: 992px) {
        body {
            background: #eef2ff;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .main-container {
            width: 100%;
            max-width: 1150px;
            height: 85vh;
            min-height: 650px;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 40px 100px rgba(15, 23, 42, 0.15);
        }

        .side-visual {
            display: flex;
        }

        .form-section {
            background: #fff;
            justify-content: center;
        }

        .mobile-blob-header {
            display: none;
        }

        .form-container {
            padding: 0 70px;
            max-width: 500px;
            justify-content: center;
        }

        .welcome-title {
            font-size: 32px;
            text-align: left;
            margin-top: 0;
        }

        .welcome-sub {
            font-size: 16px;
            text-align: left;
            margin-bottom: 35px;
        }

        .footer-text {
            text-align: left;
            padding-top: 0;
            margin-top: 40px;
        }
    }
</style>

<body>

    <div class="main-container">

        <div class="side-visual">
            <div>
                <h2 style="font-weight: 800; letter-spacing: 1.5px; font-size: 24px;">NELITA SYNC</h2>
                <p style="opacity: 0.8; font-size: 14px; margin-top: 4px;">Platform Digital SMKN 5 Tangerang</p>
            </div>
            <div>
                <h1 style="font-size: 48px; font-weight: 800; line-height: 1.1;">Satu platform untuk <br> seluruh
                    ekosistem <br> sekolah.</h1>
                <div style="width: 60px; height: 5px; background: #14B8A6; margin-top: 25px; border-radius: 10px;">
                </div>
            </div>
            <p style="font-size: 12px; opacity: 0.5;">&copy; 2026 ITC Nelita &bull; Dikembangkan dengan &hearts;</p>
        </div>

        <div class="form-section">

            <div class="mobile-blob-header">
                <div class="logo-ring">
                    <img src="/assets/img/logo-n-transparant.png" width="42" alt="Logo">
                </div>
                <div class="app-name-mobile">NELITA SYNC</div>
            </div>

            <div class="form-container">
                <h1 class="welcome-title">Selamat datang</h1>
                <p class="welcome-sub">Masuk dengan akun sekolah Anda</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="field">
                        <label>Alamat Email</label>
                        <div class="input-wrap">
                            <input type="email" name="email" value="{{ old('email') }}"
                                placeholder="nama@sekolah.sch.id" required autofocus>
                        </div>
                    </div>

                    <div class="field">
                        <label>Password</label>
                        <div class="input-wrap">
                            <input type="password" name="password" placeholder="••••••••" required>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">Masuk Sekarang</button>
                </form>

                <div class="role-chips">
                    <span class="chip">ADMIN</span>
                    <span class="chip">GURU</span>
                    <span class="chip">SISWA</span>
                    <span class="chip">WALI</span>
                </div>

                <p class="footer-text">ITC NELITA &nbsp;&bull;&nbsp; SMKN 5 Tangerang</p>
            </div>
        </div>

    </div>

</body>

</html>
