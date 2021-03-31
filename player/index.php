<?php
#$streamName = ($_GET["id"]); //if dynamic from URL or login page
#$accountId = ($_GET["account"]);
$url = 'https://api.millicast.com/api/subscribe_token/';
$headers = array();
$headers[] = 'Authorization: Bearer YOUR_API_SECRET_KEY';
$headers[] = 'Content-Type: application/json';
$streamName = 'YOUR_STREAM_NAME';
$accountId = 'MILLICAST_ACCOUNT_ID';
$label = 'YOUR_STREAM_LABEL';
$allowedDomains = 'YOUR_SECURE_DOMAIN';
error_reporting(E_ALL);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
#curl_setopt($ch, CURLOPT_POSTFIELDS, '{"subscribesAuth": true, "label": "'. $label.'", "streams": [{"streamName":"'. $streamName.'"}], "allowedOrigins": ["huhtm4.cloud.influxis.com", "*.millicast.com"]}');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"subscribesAuth": true, "label": "'. $label.'", "streams": [{"streamName":"'. $streamName.'"}], "allowedOrigins": ["'.$allowedDomains.'"]}');
$result = curl_exec($ch);;

$result = json_decode( $result, true);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
#print_r($result).'<br />';//outputs array
#Just need the token
$token=  $result['data']['token'];
?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="css/viewer.css" rel="stylesheet">
<link href="css/offline.css" rel="stylesheet">
<!-- <?php echo "?id=". $streamName. "&account=". $accountId. "&token=". $token; ?>  -->
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- Standard shim for WebRTC browser compatibility -->
<script src="js/adapter-latest.js"></script>
<script src="js/offline.js"></script>
<script src="js/usercount.js"></script>
<script>

    $(function(){
         var
            $online = $('.online'),
            $offline = $('.offline');

        Offline.on('confirmed-down', function () {
            $online.fadeOut(function () {
                $offline.fadeIn();
            });
        });

        Offline.on('confirmed-up', function () {
        	//internet has been down for a long time.

        	connect();
             $offline.fadeOut(function () {
                $online.fadeIn();

            });
        });
     });

</script><!-- autoplay = muted autoplay-->
<div class="wrapper">
  <input type="hidden" id="token" value=<?php echo $token;?>  >
    <input type="hidden" id="id"  value=<?php echo $streamName;?> >
	  <input type="hidden"  id="account" value=<?php echo $accountId;?> >

<video id="player" disablePictureInPicture controlsList="nodownload" autoplay muted playsinline poster="images/starting.png" >
  <!--   <source src="video/test.mp4" type="video/mp4">   --> </video>
</div>

<div id="userCntView"><p id="count">viewing: 00</p></div>

<div id="msgView">
  <h3 id="msgOverlay">One Moment...</h3>
</div>
<!-- <h3 style="position: absolute; left: 10px; bottom: 10px;">THIS IS A TEST!!</h3> -->
<button id="audioBtn" class="btn-audio"  onClick="toggleMute()" type="button"></button>
</div>

<script src="js/viewer.js"></script>
</body>
</html>
