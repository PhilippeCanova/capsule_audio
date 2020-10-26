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
        <h1>Livre d'or sonore</h1>
      </header>

      <section class="main-controls">
        <canvas class="visualizer" height="60px"></canvas>
        <div id="buttons">
          <button class="record">Record</button>
          <button class="stopB" style="display:none" >Stop</button>
        </div>
        
        
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

    <label for="toggle">❔</label>
    <input type="checkbox" id="toggle">
    <aside>
      <h2>Comment procéder</h2>

      <p>Mettre ici éventuellement un mode d'emploi du livre d'or numérique</p>
    </aside>
    <script type="text/javascript">
        let hotel = "<?php if (isset($_GET['hotel'])) { echo ($_GET['hotel']); } else { echo ('unknown'); } ?>";
    </script>
    <script src="scripts/app.js"></script>

  </body>
</html>