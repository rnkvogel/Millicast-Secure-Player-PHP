<?php
$streamName = ($_GET["id"]);
$label = ($_GET["l"]);
error_reporting(E_ALL);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.millicast.com/api/subscribe_token/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"subscribesAuth": true, "label": "'. $label.'", "streams": [{"streamName":"'. $streamName.'"}]}');
$headers = array();
$headers[] = 'Authorization: Bearer FROM_MILLICAT_PORTAL_ACCOUNT_API_TOKEN';
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
;
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
//print_r($result).'<br />';
?>
<!DOCTYPE html>
<html>
<head>
<style>
html, body {
  margin: 0;
  height: 100%;             /* need for iframe height 100% to work */
}
</style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

var result = <?php echo json_encode($result); ?>;
var obj = JSON.parse(result);
     // Define recursive function to print nested values
    function printValues(obj) {
        for(var k in obj) {
            if(obj[k] instanceof Object) {
                printValues(obj[k]);
            } else {
                document.write(obj[k] + "<br>");
            };
        }
};
     // Printing all the values from the resulting object
    // printValues(obj);
    // document.write("<hr>");
    // Printing a single value so time stamp can be added later for expiring token
    //document.write(obj["data"]["token"] + "<br>");  
    //document.write(obj["data"]["expiresOn"] + "<br>");
function getQueryVariable(variable)
{
var query = window.location.search.substring(1);
var vars = query.split("&");
for (var i=0;i<vars.length;i++) {
var pair = vars[i].split("=");
if(pair[0] == variable){return pair[1];}
       }
return(false);
}

    var viewer = "https://viewer.millicast.com/v2?streamId=";
    var accountID = "YOURID" + "/";
   var vid =  getQueryVariable("id");
    var vid_esc = decodeURI(vid);
	var muted = "&muted=false";//works for sound and autoplay
	var token = (obj["data"]["token"]); 
   
    var http = viewer + accountID + vid + "&token=" + token ;
  function myFunction() {
  document.getElementById("source").src = http;
}
//alert(http);

var a = document.createElement('iframe');
a.setAttribute('id','video'); // assign an id
a.src =  http ; //add your iframe path here
a.width = "100%";
a.height = "100%";
a.setAttribute('allowFullscreen','true');
a.setAttribute('allow', 'autoplay');
a.setAttribute('frameBorder', '0');
document.querySelector('body').ap
</script>
</body>
</html>
