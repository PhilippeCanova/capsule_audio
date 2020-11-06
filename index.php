<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Web dictaphone</title>
    <link href="styles/app.css" rel="stylesheet" type="text/css">
  </head>
  <body>

    <div class="wrapper">

      <header>
        <h1>Commentaires audio</h1>
      </header>

      <section class="main-controls">
        <canvas class="visualizer" height="60px"></canvas>
        <div id="buttons">
          <button class="record">Enregistrer</button>
          <button class="stopB" style="display:none" >Arrêter</button>
          
        </div>
    <aside>
      <h2>Comment procéder ?</h2>

      <p><ul>
        <li>Appuyez sur le bouton "Enregistrer"</li>
        <li>Laissez votre message (moins d'1 minute) en commençant par mentionner votre prénom et le nom.</li>
        <li>Vous pouvez écouter votre message et recommancer en appuyant sur "Efface"</li>
        <li>Lorsque le message vous satisfait, appuyez sur "Envoyer"</li>
        <li>Envoyez ensuite votre photo avec votre prénom par mail à l'adresse <a href="mailto:avis@phonomade.fr">avis@phonomade.fr</a></li>
      </ul></p>
    </aside>
        
        
        
      </section>

      <section class="sound-clips">
      </section>

      <section class="no-recorder">
        Aucun périphérique d'enregistrement sonore n'est accessible sur votre terminal.<br>Le livre d'or numérique n'est pas utilisable.
      </section>
      <section class="greetings">
        Nous vous remercions de votre participation.<br>Votre avis sera bientôt disponible sur le site de l'hôtel.
      </section>

    </div>

    
    <script type="text/javascript">
        let hotel = "<?php if (isset($_GET['hotel'])) { echo ($_GET['hotel']); } else { echo ('unknown'); } ?>";
    </script>
    <script src="scripts/app.js"></script>

  </body>
</html>