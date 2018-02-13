<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard Kondisi Umpan</title>
  
<style>
#container {
    margin: 0px auto;
    width: 320px;
    height: 240px;
    border: 10px #333 solid;
}

#videoElement {
    width: 320px;
    height: 240px;
    background-color: #666;
}
</style>
</head>
  
<body>
<div id="container">
    <video autoplay="true" id="videoElement">
     
    </video>
</div>
<script> var video = document.querySelector("#videoElement");
 
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;
 
if (navigator.getUserMedia) {       
    navigator.getUserMedia({video: true}, handleVideo, videoError);
}
 
function handleVideo(stream) {
    video.src = window.URL.createObjectURL(stream);
}
 
function videoError(e) {
    // do something
}
</script>
</body>
</html>

<?php
//file read
$file = '/sys/bus/w1/devices/28-03165564e5ff/w1_slave';

//read file line by line
$lines = file($file);

//get temp from second line
$temp = explode('=', $lines[1]);

//setup some nice formatting
$temp = number_format($temp[1]/1000,1,'.','');
?>

<h3>
Suhu Air : <?php echo $temp;
echo " ° Celcius";
?>
</h3>

<h3>
GPS : <br>
- Latitude	: <br>
- Longitude	: <br>
</h3>

<?php
?>