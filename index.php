<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Commentaires audios</title>
    <link href="styles/app.css" rel="stylesheet" type="text/css">
  </head>
  <body>

    <div class="wrapper">

      <header>
        <h1>Commentaires audios</h1>
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
        <li>Appuyez sur le bouton "Enregistrer" (Hors IPhone)</li>
        <li>Laissez votre message (moins d'1 minute) en commençant par mentionner votre nom (il sera supprimé à la mise en ligne).</li>
        <li>S'il vous convient, appuyez sur "Envoyer"<br></li>
        <li class="inter">Le micro de l'IPhone étant verrouillé, vous devrez dans ce cas utiliser l'application dictaphone et envoyer le message audio à l'adresse : <a href="mailto:avis@phonomade.fr">avis@phonomade.fr</a> en mentionnant le nom de l'hôtel.</li>
      </ul></p>
    </aside>
        
        
        
      </section>

      <section class="sound-clips">
      </section>

      <section class="no-recorder">
        Aucun périphérique d'enregistrement sonore n'est accessible sur votre terminal. Il n'est donc pas possible de soumettre un commentaire audio. <br><br>Pour résoudre se problème, vous devez :
        <ul>
            <li>Utiliser Firefox ou Chrome</li>
            <li>Utiliser de préférence Androïd</li>
            <li>Autoriser explicitement votre navigateur à accéder à votre microphone</li>
        </ul>
        Si cela ne fonctionnement toujours pas, vous pouvez envoyer votre bande son directement par mail à <a href="mailto:avis@phonomade.fr">avis@phonomade.fr</a>
      </section>
      <section class="greetings">
        Nous vous remercions de votre participation.<br><br>Votre avis sera bientôt disponible sur le site de l'hôtel.
      </section>

    </div>

    
    <script type="text/javascript">
        let hotel = "<?php if (isset($_GET['hotel'])) { echo ($_GET['hotel']); } else { echo ('unknown'); } ?>";
    </script>
    <script src="scripts/app.js"></script>

  </body>
</html>