<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GEFOR – Signature</title>
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
        padding-bottom: 48px;
      }

      /* ── Top bar ── */
      .top-bar {
        display: flex;
        justify-content: flex-end;
        padding: 24px 24px 0;
      }
      .btn-deconnect {
        font-size: 14px;
        color: rgba(255,255,255,0.85);
        font-weight: 600;
        cursor: pointer;
        background: none;
        border: none;
        font-family: 'Nunito', sans-serif;
        transition: opacity 0.2s;
      }
      .btn-deconnect:hover { opacity: 0.65; }

      /* ── Titre ── */
      .title-wrap {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 28px 0 20px;
        gap: 8px;
      }
      .title-text {
        font-size: 14px;
        font-weight: 700;
        color: #fff;
        letter-spacing: 4px;
      }
      .title-line {
        width: 64px;
        height: 2px;
        background: #cc2b2b;
        border-radius: 2px;
      }

      /* ── Infos cours ── */
      .cours-box {
        margin: 0 24px 16px;
        background: rgba(255,255,255,0.13);
        border-radius: 18px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
      }
      .cours-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      .cours-label {
        font-size: 12px;
        color: rgba(255,255,255,0.55);
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
      }
      .cours-value {
        font-size: 14px;
        color: #fff;
        font-weight: 700;
        text-align: right;
      }
      .cours-divider {
        height: 1px;
        background: rgba(255,255,255,0.1);
      }

      /* ── Zone signature ── */
      .sign-wrap {
        margin: 0 24px;
      }
      .sign-label {
        font-size: 12px;
        color: rgba(255,255,255,0.55);
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 10px;
      }
      .canvas-container {
        background: rgba(255,255,255,0.95);
        border-radius: 14px;
        overflow: hidden;
        position: relative;
      }
      #signatureCanvas {
        display: block;
        width: 100%;
        height: 160px;
        cursor: crosshair;
        touch-action: none;
      }
      .canvas-placeholder {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: rgba(0,0,0,0.25);
        font-size: 13px;
        pointer-events: none;
        font-family: 'Nunito', sans-serif;
      }

      /* ── Boutons ── */
      .actions {
        display: flex;
        gap: 12px;
        margin: 16px 24px 0;
      }
      .btn-effacer {
        flex: 1;
        background: rgba(255,255,255,0.15);
        border: none;
        border-radius: 12px;
        padding: 13px;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        cursor: pointer;
        transition: background 0.2s;
      }
      .btn-effacer:hover { background: rgba(255,255,255,0.25); }

      .btn-enregistrer {
        flex: 2;
        background: #1e1a3e;
        border: none;
        border-radius: 12px;
        padding: 13px;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        cursor: pointer;
        transition: opacity 0.2s;
      }
      .btn-enregistrer:hover { opacity: 0.85; }

      /* ── Toast ── */
      .toast {
        display: none;
        margin: 16px 24px 0;
        background: rgba(76,175,80,0.25);
        border: 1px solid rgba(76,175,80,0.5);
        border-radius: 12px;
        padding: 12px 16px;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="screen">

      <!-- Bouton Se déconnecter -->
      <div class="top-bar">
        <button class="btn-deconnect">Se déconnecter</button>
      </div>

      <!-- Titre -->
      <div class="title-wrap">
        <span class="title-text">SIGNATURE</span>
        <div class="title-line"></div>
      </div>

      <!-- Infos du cours -->
      <div class="cours-box">
        <div class="cours-row">
          <span class="cours-label">Matière</span>
          <span class="cours-value">{{ $cours['matiere'] ?? '—' }}</span>
        </div>
        <div class="cours-divider"></div>
        <div class="cours-row">
          <span class="cours-label">Date</span>
          <span class="cours-value">
            {{ isset($cours['date']) ? \Carbon\Carbon::parse($cours['date'])->format('d/m/Y') : '—' }}
          </span>
        </div>
        <div class="cours-divider"></div>
        <div class="cours-row">
          <span class="cours-label">Horaire</span>
          <span class="cours-value">
            {{ isset($cours['heure_debut']) ? \Carbon\Carbon::parse($cours['heure_debut'])->format('H\hi') : '—' }}
            →
            {{ isset($cours['heure_fin']) ? \Carbon\Carbon::parse($cours['heure_fin'])->format('H\hi') : '—' }}
          </span>
        </div>
        <div class="cours-divider"></div>
        <div class="cours-row">
          <span class="cours-label">Professeur</span>
          <span class="cours-value">{{ $cours['professeur_prenom'] ?? '—' }}</span>
        </div>
      </div>

      <!-- Zone de signature -->
      <div class="sign-wrap">
        <p class="sign-label">Votre signature</p>
        <div class="canvas-container">
          <canvas id="signature-pad"></canvas>

         <form method="POST" action="{{route('signature-pad')}}" id="signature-form">
             @csrf
             <input type="hidden" name="cours_id" avlue="{{$cours['id']}">
             <input type="hidden" name="signature" id ="signature_input">
             <div class="actions">
                 <button class="btn-effacer" id="btnEffacer">Effacer</button>
               <button class="btn-enregistrer" id="btnEnregistrer">Enregistrer</button>
                   </div>



          <span class="canvas-placeholder" id="placeholder">Signez ici avec votre doigt</span>
        </div>
      </div>

      <!-- Boutons Effacer / Enregistrer -->


      <!-- Toast confirmation -->
      <div class="toast" id="toast">✅ Signature enregistrée avec succès !</div>

    </div>

    <script>
      const canvas = document.getElementById('signatureCanvas');
      const ctx = canvas.getContext('2d');
      const placeholder = document.getElementById('placeholder');
      let drawing = false;
      let hasSigned = false;

      // Taille réelle du canvas
      function resizeCanvas() {
        const rect = canvas.getBoundingClientRect();
        canvas.width = rect.width;
        canvas.height = rect.height;
      }
      resizeCanvas();

      function getPos(e) {
        const rect = canvas.getBoundingClientRect();
        if (e.touches) {
          return {
            x: e.touches[0].clientX - rect.left,
            y: e.touches[0].clientY - rect.top
          };
        }
        return { x: e.clientX - rect.left, y: e.clientY - rect.top };
      }

      function startDraw(e) {
        e.preventDefault();
        drawing = true;
        const pos = getPos(e);
        ctx.beginPath();
        ctx.moveTo(pos.x, pos.y);
        if (!hasSigned) {
          hasSigned = true;
          placeholder.style.display = 'none';
        }
      }

      function draw(e) {
        e.preventDefault();
        if (!drawing) return;
        const pos = getPos(e);
        ctx.lineWidth = 2.5;
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#1e1a3e';
        ctx.lineTo(pos.x, pos.y);
        ctx.stroke();
      }

      function stopDraw(e) { drawing = false; }

      canvas.addEventListener('mousedown', startDraw);
      canvas.addEventListener('mousemove', draw);
      canvas.addEventListener('mouseup', stopDraw);
      canvas.addEventListener('mouseleave', stopDraw);
      canvas.addEventListener('touchstart', startDraw, { passive: false });
      canvas.addEventListener('touchmove', draw, { passive: false });
      canvas.addEventListener('touchend', stopDraw);

      // Effacer
      document.getElementById('btnEffacer').addEventListener('click', () => {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        hasSigned = false;
        placeholder.style.display = 'block';
        document.getElementById('toast').style.display = 'none';
      });

      // Enregistrer
      document.getElementById('btnEnregistrer').addEventListener('click', () => {
        if (!hasSigned) {
          alert('Veuillez signer avant d\'enregistrer.');
          return;
        }
        const imageData = canvas.toDataURL('image/png');
        // Tu peux envoyer imageData vers ton API ici avec fetch()
        console.log('Signature enregistrée :', imageData);
        const toast = document.getElementById('toast');
        toast.style.display = 'block';
      });
    </script>
  </body>
</html>
