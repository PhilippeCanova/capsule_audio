// set up basic variables for app

const record = document.querySelector('button.record');
const stopB = document.querySelector('button.stopB');
const soundClips = document.querySelector('.sound-clips');
const canvas = document.querySelector('.visualizer');
const mainSection = document.querySelector('.main-controls');
const displayNoRecord = document.querySelector('.no-recorder');
const greetingsSection = document.querySelector('.greetings');

// disable stop button while not recording

stopB.disabled = true;

// visualiser setup - create web audio api context and canvas

let audioCtx;
const canvasCtx = canvas.getContext("2d");

//main block for doing the audio recording

if (navigator.mediaDevices.getUserMedia) {
  console.log('getUserMedia supported.');

  const constraints = { audio: true };
  let chunks = [];
  let blob = null;

  let mediaOptions = {
      type: 'audio/webm;codecs=pcm',
      ext: '.wav'
  }

  let onSuccess = function(stream) {
    const mediaRecorder = new MediaRecorder(stream);

    visualize(stream);

    record.onclick = function() {
      mediaRecorder.start();
      console.log(mediaRecorder.state);
      console.log("recorder started");
      
      stopB.disabled = false;
      stopB.style.display = 'block';

      record.style.background = "red";
      record.disabled = true;
      record.style.display = "none";
    }

    stopB.onclick = function() {
      mediaRecorder.stop();
      console.log(mediaRecorder.state);
      console.log("recorder stopped");
      record.style.background = "";
      record.style.color = "";
      
      // mediaRecorder.requestData();

      stopB.disabled = true;
      stopB.style.display = "none";
      record.disabled = false;
      record.style.display = "block";
    }

    mediaRecorder.onstop = function(e) {
      console.log("data available after MediaRecorder.stop() called.");

      const clipName = 'mon_clip';
      mainSection.style.display = 'None';
      const clipContainer = document.createElement('article');
      const clipLabel = document.createElement('p');
      const audio = document.createElement('audio');
      const deleteButton = document.createElement('button');
      const sendButton = document.createElement('button');

      clipContainer.classList.add('clip');
      audio.setAttribute('controls', '');
      deleteButton.textContent = 'Effacer';
      deleteButton.className = 'delete';

      

      const autorisation = document.createElement('p');
      autorisation.textContent = 'En cliquant sur Send, j\'autorise l\'utilisation du fichier sonore pour la promotion de l\'hôtel';
      autorisation.className = 'send';
      sendButton.textContent = 'Envoyer';
      sendButton.className = 'send';

      /*if(clipName === null) {
        clipLabel.textContent = 'My unnamed clip';
      } else {
        clipLabel.textContent = clipName;
      }*/

      clipContainer.appendChild(audio);
      //clipContainer.appendChild(clipLabel);
      clipContainer.appendChild(deleteButton);
      clipContainer.appendChild(document.createElement('br'));
      clipContainer.appendChild(autorisation);
      clipContainer.appendChild(sendButton);
      soundClips.appendChild(clipContainer);


      var canRecordVp9 = MediaRecorder.isTypeSupported('audio/webm;codecs=opus');
      var canRecordPCM = MediaRecorder.isTypeSupported("audio/webm;codecs=pcm")
      if (canRecordPCM) {
        mediaOptions.type = 'audio/webm;codecs=pcm';
        mediaOptions.ext = '.wav';
        console.log("Peut faire du wav");
      }
      if (canRecordVp9) {
        mediaOptions.type = 'audio/webm;codecs=opus';
        mediaOptions.ext = '.webm';
        console.log("Peut faire du webm");
      } 
      
      audio.controls = true;
      blob = new Blob(chunks, { 'type' : 'audio/webm; codecs=opus' });

      chunks = [];
      const audioURL = window.URL.createObjectURL(blob);
      audio.src = audioURL;
      console.log("recorder stopped");

      deleteButton.onclick = function(e) {
        let evtTgt = e.target;
        evtTgt.parentNode.parentNode.removeChild(evtTgt.parentNode);
        mainSection.style.display = 'block';
      }

      sendButton.onclick = function() {
        if (mediaRecorder.state != 'inactive') {
          mediaRecorder.stop();
        }
        
        console.log("SEnd required");
        
        
        var data = new FormData();
        var oReq = new XMLHttpRequest();
        oReq.open("POST", 'upload.php', true);
        oReq.onload = function (oEvent) {
            // Uploaded.
            console.log("Uploaded");
            greetingsSection.style.display = "block";
            soundClips.style.display = "none";
        };

        data.append('file', blob);
        data.append('ext', mediaOptions.ext);
        data.append('hotel', hotel );
        oReq.send(data);
        console.log("Chargement: send");
      }

      /*clipLabel.onclick = function() {
        const existingName = clipLabel.textContent;
        const newClipName = prompt('Enter a new name for your sound clip?');
        if(newClipName === null) {
          clipLabel.textContent = existingName;
        } else {
          clipLabel.textContent = newClipName;
        }
      }*/
    }

    mediaRecorder.ondataavailable = function(e) {
      chunks.push(e.data);
    }
  }

  let onError = function(err) {
    displayNoRecord.style.display = "block";
    soundClips.style.display = "none";
    mainSection.style.display = "none";
    console.log('The following error occured: ' + err);
  }

  navigator.mediaDevices.getUserMedia(constraints).then(onSuccess, onError);

} else {
   console.log('getUserMedia not supported on your browser!');
}

function visualize(stream) {
  if(!audioCtx) {
    audioCtx = new AudioContext();
  }

  const source = audioCtx.createMediaStreamSource(stream);

  const analyser = audioCtx.createAnalyser();
  analyser.fftSize = 2048;
  const bufferLength = analyser.frequencyBinCount;
  const dataArray = new Uint8Array(bufferLength);

  source.connect(analyser);
  //analyser.connect(audioCtx.destination);

  draw()

  function draw() {
    const WIDTH = canvas.width
    const HEIGHT = canvas.height;

    requestAnimationFrame(draw);

    analyser.getByteTimeDomainData(dataArray);

    canvasCtx.fillStyle = 'rgb(200, 200, 200)';
    canvasCtx.fillRect(0, 0, WIDTH, HEIGHT);

    canvasCtx.lineWidth = 2;
    canvasCtx.strokeStyle = 'rgb(0, 0, 0)';

    canvasCtx.beginPath();

    let sliceWidth = WIDTH * 1.0 / bufferLength;
    let x = 0;


    for(let i = 0; i < bufferLength; i++) {

      let v = dataArray[i] / 128.0;
      let y = v * HEIGHT/2;

      if(i === 0) {
        canvasCtx.moveTo(x, y);
      } else {
        canvasCtx.lineTo(x, y);
      }

      x += sliceWidth;
    }

    canvasCtx.lineTo(canvas.width, canvas.height/2);
    canvasCtx.stroke();

  }
}

window.onresize = function() {
  canvas.width = mainSection.offsetWidth;
}

window.onresize();