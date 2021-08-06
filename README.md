Creating simple PHP player to view your secure stream on your hosting provider with your Millicast account.
The code can be modified to use other languages as desired.


Requires a Millicast.com account.
You can view the API and docs to find additional information.

Create a secure stream name.
For this example create stream lable secure and select any stream name.
Under settings you will see label as secure. You can set token as required.

This example will include Domain restrictions. We are going to create the token in your portal using cUrl
https://reqbin.com/curl

UPDATE THE CAPS WITH YOUR INFORMATION!!

<code>
curl -H "Authorization: Bearer YOUR_MILLICAST_API_KEY" \
     -H "Content-Type: application/json" \
     https://api.millicast.com/api/publish_token/ \
     -d '{"subscribeRequiresAuth": true, "label": "YOUR_LABEL_NAME", "streams": [{"streamName": "YOUR_STREAM_LABEL"}], "allowedOrigins": ["YOUR_DOMAIN"]}'
     
    

     
     
Once you have run the Curl call check your portal to see the newley created stream label.
You will be using the new label and token to publish your stream.

Install the player on your PHP Web Host.

On Index.php upodated the following lines.

<code>
$headers[] = 'Authorization: Bearer YOUR_API_SECRET_KEY';
$streamName = 'YOUR_STREAM_NAME';
$accountId = 'MILLICAST_ACCOUNT_ID';
$label = 'YOUR_STREAM_LABEL';
$allowedDomains = 'YOUR_SECURE_DOMAIN';

     
     
Test the player with your secure stream. 

https://YOUR_SECURE_DOMAIN.com/player/index.php

This player has a viewer count and offline recconect if the internet goes down for the viewer.














