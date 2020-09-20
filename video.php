<!DOCTYPE html>
<!--
 *  Copyright (c) 2015 The WebRTC project authors. All Rights Reserved.
 *
 *  Use of this source code is governed by a BSD-style license
 *  that can be found in the LICENSE file in the root of the source
 *  tree.
-->
<html>
<head>

    <meta charset="utf-8">
    <meta name="description" content="WebRTC code samples">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=1">
    <meta itemprop="description" content="Client-side WebRTC code samples">
    <meta itemprop="name" content="WebRTC code samples">
    <meta name="mobile-web-app-capable" content="yes">
    <meta id="theme-color" name="theme-color" content="#ffffff">

    <base target="_blank">

    <title>MediaStream Recording</title>
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="styles/submain.css">
    <link rel="stylesheet" href="styles/main.css">

</head>

<body>

<div id="container">

    <h1>Livre d'or vidéo</h1>


    <video id="gum" playsinline autoplay muted></video>
    <video id="recorded" playsinline loop></video>

    <div>
        <button id="start">Démarrer</button>
        <button id="record" disabled>Enregistrer</button>
        <button id="play" disabled>Ecouter</button>
        <button id="download" disabled>Envoyer</button>
    </div>

    <div>
        <h4>Media Stream Constraints options</h4>
        <p>Echo cancellation: <input type="checkbox" id="echoCancellation"></p>
    </div>

    <div>
        <span id="errorMsg"></span>
    </div>

</div>
<script type="text/javascript">
        let hotel = "<?php if (isset($_GET['hotel'])) { echo ($_GET['hotel']); } else { echo ('unknown'); } ?>";
</script>

<!-- include adapter for srcObject shim -->
<script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
<script src="scripts/main.js" async></script>

</body>
</html>