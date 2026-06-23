<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GEFOR – Connexion</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;900&display=swap" rel="stylesheet" />
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(160deg, #3a3568 0%, #2a2350 40%, #4a4878 100%);
            font-family: 'Nunito', sans-serif;
        }
        .screen {
            width: 100%;
            max-width: 360px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding-bottom: 40px;
        }
        .logo-wrap {
            display: flex;
            justify-content: center;
            padding: 60px 0 48px;
        }
        .logo-box {
            width: 140px;
            height: 88px;
            background: #1e1a3e;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2px;
        }
        .logo-g {
            font-size: 56px;
            font-weight: 900;
            color: #fff;
            font-family: Georgia, serif;
            line-height: 1;
            letter-spacing: -3px;
        }
        .logo-text { display: flex; flex-direction: column; line-height: 1.15; }
        .logo-text .roupe { font-size: 15px; font-weight: 700; color: #fff; letter-spacing: 1.5px; }
        .logo-text .efor { font-size: 22px; font-weight: 900; color: #cc2b2b; letter-spacing: 2.5px; }
        .form-area {
            padding: 0 32px;
            display: flex;
            flex-direction: column;
        }
        .field-label {
            font-size: 13px;
            font-weight: 600;
            color: rgba(255,255,255,0.75);
            margin-bottom: 8px;
        }
        .field-input {
            width: 100%;
            background: rgba(255,255,255,0.18);
            border: none;
            border-radius: 10px;
            padding: 13px 16px;
            color: #fff;
            font-size: 15px;
            font-family: 'Nunito', sans-serif;
            outline: none;
            margin-bottom: 16px;
        }
        .field-input:focus { background: rgba(255,255,255,0.28); }
        .field-input::placeholder { color: rgba(255,255,255,0.3); }
        .btn-connexion {
            background: #1e1a3e;
            color: #fff;
            border: none;
            border-radius: 24px;
            padding: 13px 28px;
            font-size: 15px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            align-self: flex-end;
            margin-top: 4px;
        }
        .btn-connexion:hover { opacity: 0.85; }
        .alert {
            margin: 0 32px 14px;
            background: rgba(204,43,43,0.3);
            border: 1px solid #cc2b2b;
            color: #ff8080;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 13px;
        }
        .welcome-box {
            margin: 28px 28px 0;
            background: rgba(255,255,255,0.12);
            border-radius: 16px;
            padding: 18px 20px;
        }
        .welcome-box p {
            font-size: 14px;
            color: rgba(255,255,255,0.85);
            line-height: 1.6;
        }
        .welcome-box p strong {
            color: #fff;
            font-weight: 700;
            display: block;
            margin-bottom: 4px;
        }
        .spacer { flex: 1; }
    </style>
</head>
<body>
    <div class="screen">

        <div class="logo-wrap">
            <div class="logo-box">
                <span class="logo-g">G</span>
                <div class="logo-text">
                    <span class="roupe">ROUPE</span>
                    <span class="efor">EFOR</span>
                </div>
            </div>
        </div>

        @if (session('error'))
            <div class="alert">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login.post') }}" class="form-area">
            @csrf
            <label class="field-label">Email</label>
            <input type="email" name="email" class="field-input" placeholder="votre@email.com" required autofocus>

            <label class="field-label">Mot de passe</label>
            <input type="password" name="password" class="field-input" placeholder="••••••••" required>

            <button type="submit" class="btn-connexion">Connexion</button>
        </form>

        <div class="welcome-box">
            <p>
                <strong>Bienvenue sur GEFOR</strong>
                Votre émargement simplifié et sécurisé, gérez votre présence en un clic, où que vous soyez.
            </p>
        </div>

        <div class="spacer"></div>
    </div>
</body>
</html>
