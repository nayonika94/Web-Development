<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

session_start();

$usrname = (isset($_SESSION['userInfo']))? $_SESSION['userInfo']['FirstName'] : "";
$usr = (isset($_SESSION['userInfo']))? $_SESSION['userInfo']['Username'] : "";
$id  = (isset($_SESSION['userInfo']))? $_SESSION['userInfo']['UserID'] : "";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="layout.css" rel="stylesheet"/>
        <link href="tables.css" rel="stylesheet"/>
    </head>
    <body>
        <header>
             <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="characters.php">Characters</a></li>
                    <li><a href="Updates.php">Updates</a></li>
                    <li><a href="Roles.php">Roles</a></li>
                    <?php 
                    if (!empty($usrname))
                    {
                      echo "<li><a href=\"logout.php\">Logout</a></li>";  
                    }
                    else
                    {
                        echo "<li><a href=\"Login.php\">Login</a></li>";
                    }
                    
                    ?>
                </ul>
            </nav>
            
            
            <h1>Add new Comment</h1>
             <?php
                    if (!empty($usrname))
                    {
                        echo "<h4 id=\"usr\">Welcome $usrname</h4>";
                       

                    }
                    else {
                         
                          echo "<h4 id=\"usr\">You are not logged in. You must login in order to Add/Edit/Delete your comment</h4>";

                     }
                 ?>
            
        </header>
        
<?php

$UID = $_POST['UID'];
$UserID = $_POST['UserID'];
$comment = $_POST['comment'];


require ("sql.php");
$UID = (int)$UID;
addComment($comment, $UserID, $UID);

$getComm = searchComment($comment);

foreach($getComm as $commResult)
{
    extract($commResult);
    
    $output = <<<HTML
            <h1>Comment added successfully!!</h1>
            <table>
                    <form action="Updates.php">
                    <tr>
                        <th>Back to updates</th>
                    </tr>
                    <tr>
                        <td><input type="submit" value="update" id="update"></td>
                    </tr>
                    </form>
             </table>
HTML;
}
echo $output;
?>
        <footer>&#9775 &nbspDeveloped by Tejashree Pradhan, Nayonika Roy and Vinay Tyagi &nbsp; &#9775 &nbsp;
            CIS 665 - Team 127 &nbsp; &#9775 &nbsp;</footer> 
</body>
</html>
