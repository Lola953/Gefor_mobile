<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

       <!DOCTYPE html>
       <html lang="fr">
       <head>
         <meta charset="UTF-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1.0" />
         <title>GEFOR – Connexion</title>
         <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;900&display=swap" rel="stylesheet" />
         <style>
           * {
             box-sizing: border-box;
             margin: 0;
             padding: 0;
           }

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

           /* ── Logo ── */
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
           .logo-text {
             display: flex;
             flex-direction: column;
             line-height: 1.15;
           }
           .logo-text .roupe {
             font-size: 15px;
             font-weight: 700;
             color: #fff;
             letter-spacing: 1.5px;
           }
           .logo-text .efor {
             font-size: 22px;
             font-weight: 900;
             color: #cc2b2b;
             letter-spacing: 2.5px;
           }

           /* ── Form ── */
           .form-area {
             padding: 0 32px;
             display: flex;
             flex-direction: column;
           }
           .field-label {
             font-size: 13px;
             font-weight: 600;
             color: rgba(255, 255, 255, 0.75);
             margin-bottom: 8px;
           }
           .field-input {
             width: 100%;
             background: rgba(255, 255, 255, 0.18);
             border: none;
             border-radius: 10px;
             padding: 13px 16px;
             color: #fff;
             font-size: 15px;
             font-family: 'Nunito', sans-serif;
             outline: none;
             transition: background 0.2s;
             margin-bottom: 14px;
           }
           .field-input:focus {
             background: rgba(255, 255, 255, 0.28);
           }
           .field-input::placeholder {
             color: rgba(255, 255, 255, 0.3);
           }
           .pw-label-below {
             margin-top: -6px;
             margin-bottom: 18px;
           }

           /* ── Connexion button ── */
           .btn-row {
             display: flex;
             justify-content: flex-end;
             padding: 0 32px;
             margin-top: 2px;
           }
           .btn-connexion {
             background: #1e1a3e;
             color: #fff;
             border: none;
             border-radius: 24px;
             padding: 12px 28px;
             font-size: 15px;
             font-weight: 700;
             font-family: 'Nunito', sans-serif;
             cursor: pointer;
             letter-spacing: 0.4px;
             transition: opacity 0.2s, transform 0.15s;
           }
           .btn-connexion:hover { opacity: 0.85; }
           .btn-connexion:active { transform: scale(0.97); }

           /* ── Welcome box ── */
           .welcome-box {
             margin: 28px 28px 0;
             background: rgba(255, 255, 255, 0.12);
             border-radius: 16px;
             padding: 18px 20px;
           }
           .welcome-box p {
             font-size: 14px;
             color: rgba(255, 255, 255, 0.85);
             line-height: 1.6;
             font-weight: 400;
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

       {{-- Show a generic error message if needed --}}
           @if (session('error'))
               <div class="alert">
                   {{ session('error') }}
               </div>
           @endif

         <form method="POST" action="{{ route('login.post') }}">
                 @csrf

                 <div class="field">
                     <label for="email">Email</label>
                     <input
                         id="email"
                         type="email"
                         name="email"
                         required
                         autofocus
                     >
                 </div>

                 <div class="field">
                     <label for="password">Mot de passe</label>
                     <input
                         id="password"
                         type="password"
                         name="password"
                         required
                     >
                 </div>

                 <button type="submit" class="btn">
                     Connexion
                 </button>
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
