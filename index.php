<!DOCTYPE html>
<html>
  <head>
    <title>MediaRecorder API - Sample</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="WebRTC getUserMedia MediaRecorder API">
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <style>
      button{
        margin: 10px 5px;
      }
      li{
        margin: 10px;
      }
      body{
        width: 90%;
        max-width: 960px;
        margin: 0px auto;
      }
      #btns{
        display: none;
      }
      h1{
        margin: 100px;
      }
    </style>
  </head>

  <script type="text/javascript">
        let tag = '<?php if (isset($_GET['hotel'])) { echo ($_GET['hotel']); } else { echo ('unknown'); } ?>';
        function go(destination) {
          window.location.assign(destination+"?hotel=" + tag);
        }
    </script>

  <body>
    <h1>Livre d'or sonore</h1>
    <button class="btn btn-primary btn-lg" id="videoBtn" onclick="go('video.html');" >Vidéo</button>
    <button class="btn btn-primary btn-lg" id="audioBtn" onclick="go('audio.php');" >Audo</button>
    


  </body>
</html>