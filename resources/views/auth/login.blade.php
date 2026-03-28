@extends('layouts.base')

@section('title', 'Login | NELITASYNC')

@push('head')
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1F4ED8, #14B8A6);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: #fff;
            width: 100%;
            min-width: 350px;
            max-width: 400px;
            padding: 32px 26px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, .15);
            animation: fadeIn .8s ease;
        }

        .logo {
            display: flex;
            justify-content: center;
        }

        .logo img {
            width: 120px;
            display: block;
        }

        h1 {
            text-align: center;
            font-size: 22px;
            font-weight: 700;
            color: #1F4ED8;
            margin-bottom: 6px;
        }

        .subtitle {
            text-align: center;
            font-size: 13px;
            color: #64748b;
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 14px;
        }

        label {
            display: block;
            font-size: 13px;
            margin-bottom: 6px;
            color: #334155;
        }

        input {
            width: 100%;
            min-height: 3rem;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #1F4ED8;
        }

        .btn {
            width: 100%;
            padding: 14px;
            border-radius: 12px;
            border: none;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            transition: .3s;
        }

        .btn-login {
            background: #1F4ED8;
            color: #fff;
        }

        .btn-login:hover {
            background: #1e40af;
        }

        .footer {
            text-align: center;
            margin-top: 18px;
            font-size: 12px;
            color: #64748b;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .error-message {
            color: red;
            font-family: 'Poppins', sans-serif;
        }
    </style>
@endpush

@section('content')
    <div class="login-box">
        <div class="logo">
            <img src="/assets/img/logo-n-transparant.png" alt="NELITA SYNC">
        </div>

        <h1>Login</h1>
        <div class="subtitle">NELITA SYNC Platform</div>

        <form method="POST" action="/login">
            @csrf
            <div class="form-group">
                <label>Username</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            @error('email')
                <div class="error-message text-danger" style="font-color:red">
                    {{ $message }}
                </div>
            @enderror

            <button class="btn btn-login">Masuk</button>
        </form>

        <div class="footer">
            © 2026 ITC NELITA |
            SMKN 5 Tangerang
        </div>
    </div>
@endsection
