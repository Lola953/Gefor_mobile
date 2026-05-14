<!DOCTYPE html>
<!-- Déclare un fichier HTML5 -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
<meta charset="UTF-8">
<!-- Permet les accents et caractères spéciaux -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Adapte la page aux écrans mobiles -->
  <title>Groupe GEFOR</title>
  <!--titre-->

  <style>
    * {
      margin: 0; /* Supprime les marges ext */
      padding: 0;/* Supprime les espaces intérieurs */
      box-sizing: border-box;/* Taille inclut padding et border */
    }
/*harmonise le style du navigateur*/

    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      /* Fond dégradé bleu-gris */
      background: linear-gradient(160deg, #6b7090 0%, #8a8faa 40%, #9095b0 100%);
    }

    .logo-container {
      /* Cercle bleu marine */
      width: 260px;
      height: 260px;
      border-radius: 50%;
      background-color: #0f1240;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .logo-inner {
      display: flex;
      align-items: center;
    }

    .big-g {
      font-size: 85px;
      color: white;
      font-family: Georgia, serif;
      font-weight: 400;
      line-height: 1;
      margin-right: 4px;
    }

    .right-text {
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .roupe {
      font-size: 20px;
      color: white;
      font-family: Georgia, serif;
      letter-spacing: 4px;
      font-weight: 400;
    }

    .gefor-line {
      display: flex;
      align-items: baseline;
    }

    .ge {
      font-size: 30px;
      color: white;
      font-family: Georgia, serif;
      font-weight: 400;
    }

    .for {
      font-size: 30px;
      color: #cc2a2a; /* rouge */
      font-family: Georgia, serif;
      font-weight: 400;
    }
  </style>
        </head>
    <body>
          <div class="logo-container">
            <div class="logo-inner">
              <span class="big-g">G</span>
              <div class="right-text">
                <span class="roupe">ROUPE</span>
                <div class="gefor-line">
                  <span class="ge">E</span>
                  <span class="for">FOR</span>
                </div>
              </div>
            </div>
          </div>
    </body>
</html>
