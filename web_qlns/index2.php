<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/view.css" type="text/css" />
    <title>Chụp ảnh</title>
    <style>
        #video {
            width: 100%;
            max-width: 600px;
            margin-bottom: 10px;
        }
        #canvas {
            display: none;
        }
    </style>
</head>
<body>
<div class="panel">
  <button id="switchFrontBtn">Front Camera</button>
  <button id="switchBackBtn">Back Camera</button>
  <button id="snapBtn">Snap</button>
</div>
<div style="width:100%">
  <!-- add autoplay muted playsinline for iOS -->
  <video id="cam" autoplay muted playsinline>Not available</video>
  <canvas id="canvas" style="display:none"></canvas>  
  <img id="photo" alt="The screen capture will appear in this box.">  
</div>
    
    
</body>
<script src="script.js"></script>
</html>