<?php

// Define your username and password
$username = "YOUR_USER-NAME";
$password = "YOUR_PASSWORD";

if ($_POST['txtUsername'] != $username || $_POST['txtPassword'] != $password) {

?>
<!DOCTYPE html>
<html>
<head>
<style>
body {background-color: powderblue;}
h1   {color: blue;}
p    {color: red;}
</style>
</head>
<body>
<h1>Please Enter Credentials</h1>
<h5>Invalid username or password will not allow playback</h5>
<form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<label for="txtUsername">Username:</label>
<input type="text" title="Enter your Username" name="txtUsername" /></p>
<label for="txtpassword">Password:</label>
<input type="password" title="Enter your password" name="txtPassword" /></p>
<input type="submit" name="Submit" value="Login" /></p>
</form>
</body>
</html>
<?php
}
else {
?>
<!-- Secure Player Code Here -->
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- END -->
<?php

}

?>
