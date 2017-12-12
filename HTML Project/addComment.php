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
        
        $UID = (int)$_GET['UID'];
        echo "$UID";
         $UserID = $_SESSION['userInfo']['UserID'];
        
        ?>
        
        <table>
        <form action="add1.php?" method="POST">
            <input type="hidden" value="<?php echo $UID?>" name="UID"/>
            <input type="hidden" value="<?php echo $UserID?>" name="UserID"/>
            <tr>
                <th colspan="2"><label for="comment">New Comment: </label></th>
            </tr>
            
            <tr>
                <td colspan="2"><input type="text" name="comment" value="<?php echo $comment ?>" id="comment" placeholder="Enter new comment" required autofocus pattern="^[a-zA-Z0-9][\w\s\&,]*[a-zA-Z0-9\!\?\.]$" title="Comment has invalid characters"/>            
            </tr>
            <tr>
                <td><input type="submit" value="Add" id="add" name="add"></td>
                </form>
            <form action="Updates.php">
                <td><input type="submit" value="Cancle" id="cancle" name="cancle"></td>
             </form>
            </tr>
        
            </table>
        <footer>&#9775 &nbspDeveloped by Tejashree Pradhan, Nayonika Roy and Vinay Tyagi &nbsp; &#9775 &nbsp;
            CIS 665 - Team 127 &nbsp; &#9775 &nbsp;</footer> 
    </body>
</html>
