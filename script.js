'use strict'


// Voir https://github.com/mdn/web-dictaphone/ pour un dictaphone avec choix du son envoi envoi

let log = console.log.bind(console),
  id = val => document.getElementById(val),
  ul = id('ul'),
  gUMbtn = id('gUMbtn'),
  start = id('start'),
  stop = id('stop'),
  stream,
  recorder,
  counter=1,
  chunks,
  media;


gUMbtn.onclick = e => {
  let mv = id('mediaVideo'),
      mediaOptions = {
        video: {
          tag: 'video',
          type: 'video/webm',
          ext: '.mp4',
          gUM: {video: true, audio: true}
        },
        audio: {
          tag: 'audio',
          type: 'audio/ogg',  
          ext: '.ogg',
          gUM: {audio: true}
        }
      };
  var canRecordVp9 = MediaRecorder.isTypeSupported('audio/webm;codecs=opus');
  var canRecordPCM = MediaRecorder.isTypeSupported("audio/webm;codecs=pcm")
  if (canRecordPCM) {
    mediaOptions.audio.type = 'audio/webm;codecs=pcm';
    mediaOptions.audio.ext = '.wav';
    console.log("Peut faire du wav");
  }
  if (canRecordVp9) {
    mediaOptions.audio.type = 'audio/webm;codecs=opus';
    mediaOptions.audio.ext = '.webm';
    console.log("Peut faire du webm");
  } 
  media = mv.checked ? mediaOptions.video : mediaOptions.audio;
  navigator.mediaDevices.getUserMedia(media.gUM).then(_stream => {
    stream = _stream;
    id('gUMArea').style.display = 'none';
    id('btns').style.display = 'inherit';
    start.removeAttribute('disabled');
    recorder = new MediaRecorder(stream, {mimeType : media.type});
    recorder.ondataavailable = e => {
      chunks.push(e.data);
      if(recorder.state == 'inactive') {
        log("Make link");
        makeLink();
        log("Link done");
      }
    };
    log('got media successfully');
  }).catch(log);
}

start.onclick = e => {
  start.disabled = true;
  stop.removeAttribute('disabled');
  chunks=[];
  recorder.start();
}


stop.onclick = e => {
  stop.disabled = true;
  recorder.stop();
  start.removeAttribute('disabled');
}



function makeLink(){
  /*let blob = new Blob(chunks, {type: media.type })
    , url = URL.createObjectURL(blob)
    , li = document.createElement('li')
    , mt = document.createElement(media.tag)
    , hf = document.createElement('a')
  ;
  mt.controls = true;
  mt.src = url;
  hf.href = url;
  hf.download = `${counter++}${media.ext}`;
  hf.innerHTML = `donwload ${hf.download}`;
  li.appendChild(mt);
  li.appendChild(hf);
  ul.appendChild(li);*/

  var data = new FormData();
    var oReq = new XMLHttpRequest();
    oReq.open("POST", 'upload.php', true);
    oReq.onload = function (oEvent) {
      // Uploaded.
      console.log("Uploaded");
    };

    var blob = new Blob(chunks, {type: media.type});
    data.append('file', blob);
    data.append('ext', media.ext);
    oReq.send(data);
    log("Chargement: send");

}