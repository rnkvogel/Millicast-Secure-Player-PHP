Creating simple PHP player to view your secure stream on your hosting provider.

Requires a Millicast.com account.
You can view the API and docs to find additional information.

Create a secure stream name.
For this example create stream lable secure and select any stream name.
Under settings you will see label as secure. You can set token as required.

You can take the PHP example and place on your PHP hosting provider.
Change line 11: $headers[] = 'Authorization: Bearer FROM_MILLICAT_PORTAL_ACCOUNT_API_TOKEN';
FROM_MILLICAT_PORTAL_ACCOUNT_API_TOKEN can be found the account drop down in your Millicast portal.
API Secret
Change line 58:     var accountID = "YOURID" + "/";
YOURID can be found as your ACCOUNT ID in the API broadcast tab.

Navigate to your site and change
YOURSITE
id=StreamName  //Using built in broadcaster you will see name populated in the top left.
l=Label   //If you named it something else then secure

https://YOURSITE.com/player/index.php?id=SteamName&l=secure




