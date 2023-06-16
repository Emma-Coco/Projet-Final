<!DOCTYPE html>   
<html>
  <head>
    <title>Error</title>
  </head>
  <body>
    <?php
$error_msg=[];     /// Centralisation des messages d'erreur
$error_msg[0]="Some thing wrong happened";
$error_msg[1]="Incorrect user name or password";
$error_msg[2]="Error creating user account (try enother user name may help)";
$error_msg[3]="Error reading details of logement";

if (isset($_REQUEST['err']))
  $error_code=$_REQUEST['err'];
else $error_code=0;
echo "<h2> $error_msg[$error_code] </h2>Press back to go back";
?>
     </body>
</html>
