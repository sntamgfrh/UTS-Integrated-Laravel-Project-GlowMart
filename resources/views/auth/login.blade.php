<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GlowMart</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap');

        :root {
            --green-dark: #243d30;
            --green: #45684e;
            --green-light: #e6eee2;
            --sage: #a7bba0;
            --cream: #f8f7f1;
            --text: #26392d;
            --muted: #879188;
            --border: #dfe6dc;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            font-family: 'DM Sans', Arial, sans-serif;
            color: var(--text);
            background: var(--cream);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 35px;
        }

        .page {
            width: 100%;
            max-width: 1200px;
            min-height: 680px;
            display: grid;
            grid-template-columns: 1fr 0.95fr;
            background: white;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 25px 80px rgba(36, 61, 48, 0.12);
            animation: appear 0.7s ease;
        }

        .showcase {
            position: relative;
            overflow: hidden;
            padding: 48px 48px 38px;
            background:
                radial-gradient(ellipse at 0% 100%, #bdcdb4 0%, transparent 35%),
                radial-gradient(ellipse at 100% 0%, #d4e0ca 0%, transparent 38%),
                linear-gradient(145deg, #f0f3e9, #e3ebdd);
            display: flex;
            flex-direction: column;
        }

        .showcase::before,
        .showcase::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            background: rgba(119, 148, 111, 0.10);
            pointer-events: none;
        }

        .showcase::before {
            width: 330px;
            height: 330px;
            top: -190px;
            left: -100px;
        }

        .showcase::after {
            width: 270px;
            height: 270px;
            bottom: -180px;
            right: -100px;
        }

        .brand {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand-icon {
            width: 53px;
            height: 53px;
            border-radius: 17px;
            background: var(--green-dark);
            color: white;
            display: grid;
            place-items: center;
            font-size: 29px;
            font-weight: 700;
            box-shadow: 0 8px 18px #243d3025;
        }

        .brand-name {
            font-size: 31px;
            font-weight: 700;
            letter-spacing: -1.2px;
            color: var(--green-dark);
        }

        .brand-caption {
            margin-top: 2px;
            font-size: 12px;
            letter-spacing: 1.7px;
            text-transform: uppercase;
            color: #718273;
        }

        .intro {
            position: relative;
            z-index: 1;
            margin-top: 65px;
        }

        .eyebrow {
            display: inline-block;
            padding: 8px 13px;
            border: 1px solid #cfddc8;
            border-radius: 30px;
            color: var(--green);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.3px;
            text-transform: uppercase;
            margin-bottom: 22px;
        }

        .intro h2 {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: clamp(34px, 3.3vw, 47px);
            line-height: 1.2;
            color: var(--green-dark);
            max-width: 440px;
            margin-bottom: 19px;
        }

        .intro h2 span {
            color: #789276;
        }

        .intro > p {
            max-width: 420px;
            font-size: 14px;
            line-height: 1.9;
            color: #657568;
        }

        .features {
            position: relative;
            z-index: 1;
            display: grid;
            gap: 22px;
            margin-top: 35px;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .feature-icon {
            flex-shrink: 0;
            width: 45px;
            height: 45px;
            border-radius: 15px;
            background: rgba(255,255,255,0.65);
            border: 1px solid #dbe5d5;
            display: grid;
            place-items: center;
            font-size: 20px;
        }

        .feature h3 {
            font-size: 13px;
            margin-bottom: 4px;
            color: var(--green-dark);
        }

        .feature p {
            font-size: 11px;
            line-height: 1.6;
            color: #758476;
        }

        .decor {
            position: absolute;
            right: 30px;
            bottom: 28px;
            font-family: 'Playfair Display', Georgia, serif;
            font-style: italic;
            font-size: 17px;
            color: #6c8769;
            transform: rotate(-5deg);
        }

        .login-panel {
            padding: 45px clamp(28px, 5vw, 66px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #fff;
        }

        .mobile-brand {
            display: none;
        }

        .form-heading {
            margin-bottom: 31px;
        }

        .form-heading .welcome {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #7d997a;
            margin-bottom: 12px;
        }

        .form-heading h1 {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 36px;
            letter-spacing: -0.7px;
            color: var(--green-dark);
            margin-bottom: 11px;
        }

        .form-heading p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        .message {
            padding: 13px 15px;
            margin-bottom: 20px;
            border-radius: 12px;
            font-size: 13px;
            line-height: 1.6;
        }

        .success {
            color: #28623c;
            background: #e9f6eb;
            border: 1px solid #cce8d1;
        }

        .error {
            color: #a13e3e;
            background: #fff0ef;
            border: 1px solid #f4d2cf;
        }

        .form-group {
            margin-bottom: 21px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #415448;
            margin-bottom: 9px;
        }

        .input-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 17px;
            color: #789078;
            pointer-events: none;
        }

        .form-group input {
            width: 100%;
            height: 52px;
            padding: 0 45px;
            border: 1px solid var(--border);
            border-radius: 13px;
            outline: none;
            background: #fbfcfa;
            font-family: inherit;
            font-size: 13px;
            color: var(--text);
            transition: 0.25s;
        }

        .form-group input::placeholder {
            color: #a4ada4;
        }

        .form-group input:focus {
            background: #fff;
            border-color: #769477;
            box-shadow: 0 0 0 4px rgba(118, 148, 119, 0.12);
        }

        .toggle-password {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #728575;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            padding: 7px 0 7px 7px;
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin: 2px 0 27px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #738075;
            font-size: 12px;
            cursor: pointer;
        }

        .remember input {
            accent-color: var(--green);
            width: 15px;
            height: 15px;
        }

        .login-button {
            width: 100%;
            min-height: 53px;
            border: none;
            border-radius: 13px;
            background: linear-gradient(115deg, #304d38, #527654);
            color: white;
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0.4px;
            cursor: pointer;
            box-shadow: 0 8px 18px rgba(48, 77, 56, 0.16);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(48, 77, 56, 0.24);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .secure-note {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            color: #98a198;
            font-size: 11px;
            margin-top: 23px;
        }

        .footer {
            text-align: center;
            margin-top: 35px;
            padding-top: 20px;
            border-top: 1px solid #edf0eb;
            color: #a0a89f;
            font-size: 10px;
            letter-spacing: 0.4px;
        }

        @keyframes appear {
            from {
                opacity: 0;
                transform: translateY(12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 850px) {
            body {
                padding: 20px;
            }

            .page {
                max-width: 520px;
                min-height: auto;
                grid-template-columns: 1fr;
            }

            .showcase {
                display: none;
            }

            .login-panel {
                padding: 42px clamp(24px, 7vw, 48px);
            }

            .mobile-brand {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 10px;
                margin-bottom: 35px;
            }

            .mobile-brand .brand-icon {
                width: 43px;
                height: 43px;
                border-radius: 14px;
                font-size: 23px;
            }

            .mobile-brand .brand-name {
                font-size: 26px;
            }

            .form-heading h1 {
                font-size: 32px;
            }
        }

        @media
        
$file = "resources/views/auth/login.blade.php"

$ending = @'
        @media (max-width: 480px) {
            body {
                padding: 12px;
            }

            .login-panel {
                padding: 32px 22px;
            }

            .form-heading h1 {
                font-size: 29px;
            }

            .form-options {
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>
    <main class="page">
        <section class="showcase">
            <div class="brand">
                <div class="brand-icon">G</div>
                <div>
                    <div class="brand-name">GlowMart</div>
                    <div class="brand-caption">Beauty & Care Store</div>
                </div>
            </div>

            <div class="intro">
                <span class="eyebrow">Selamat Datang</span>
                <h2>Rawat dirimu, <span>mulai dari sini.</span></h2>
                <p>Kelola persediaan, pembelian, dan penjualan GlowMart dengan lebih mudah melalui satu sistem yang praktis dan terorganisir.</p>
            </div>

            <div class="features">
                <div class="feature">
                    <div class="feature-icon">✦</div>
                    <div>
                        <h3>Manajemen Produk</h3>
                        <p>Pantau produk dan persediaan dengan praktis.</p>
                    </div>
                </div>
                <div class="feature">
                    <div class="feature-icon">▤</div>
                    <div>
                        <h3>Transaksi Terorganisir</h3>
                        <p>Catat pembelian dan penjualan dalam satu tempat.</p>
                    </div>
                </div>
                <div class="feature">
                    <div class="feature-icon">♡</div>
                    <div>
                        <h3>Kelola dengan Nyaman</h3>
                        <p>Antarmuka sederhana untuk mendukung pekerjaanmu.</p>
                    </div>
                </div>
            </div>

            <div class="decor">Your beauty, your way.</div>
        </section>

        <section class="login-panel">
            <div class="mobile-brand">
                <div class="brand-icon">G</div>
                <div class="brand-name">GlowMart</div>
            </div>

            <div class="form-heading">
                <div class="welcome">GlowMart Management System</div>
                <h1>Masuk ke Akun</h1>
                <p>Silakan masukkan email dan kata sandi untuk melanjutkan.</p>
            </div>

            @if (session('success'))
                <div class="message success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="message error">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <div class="input-wrap">
                        <span class="input-icon">✉</span>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            autocomplete="username"
                            required
                            autofocus
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <div class="input-wrap">
                        <span class="input-icon">●</span>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan kata sandi"
                            autocomplete="current-password"
                            required
                        >
                        <button class="toggle-password" type="button" id="togglePassword">LIHAT</button>
                    </div>
                </div>

                <div class="form-options">
                    <label class="remember">
                        <input type="checkbox" name="remember" value="1">
                        Ingat saya
                    </label>
                </div>

                <button class="login-button" type="submit">Masuk ke GlowMart →</button>
            </form>

            <div class="secure-note">♧ Login aman · GlowMart Management System</div>
            <div class="footer">© {{ date('Y') }} GlowMart. All rights reserved.</div>
        </section>
    </main>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            togglePassword.textContent = isPassword ? 'SEMBUNYIKAN' : 'LIHAT';
        });
    </script>
</body>
</html>

