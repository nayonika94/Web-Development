<?php

require_once ("sql.php");

//echo $_POST['CID'];

if (isset($_POST['CID']))
{
   // echo $_POST['Comment'];
   // echo "Found";
editComment((int)$_POST['CID'], $_POST['Comment']);
    
}
    

header("Location: Updates.php");
exit;

?>
