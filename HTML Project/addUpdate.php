<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

session_start();

$usrname = (isset($_SESSION['userInfo']))? $_SESSION['userInfo']['FirstName'] : "";

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Updates</title>
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
            
            
            <h1>Add new Update</h1>
            
        <?php
                    if (!empty($usrname))
                    {
                        echo "<h4 id=\"usr\">Welcome $usrname</h4>";
                       

                    }
                    else {
                         
                          echo "<h4 id=\"usr\">You are not logged in</h4>";

                     }
                 ?>
         
        
            
        </header>
        <table>
        <form action="addUpdate1.php" method="GET">
            <tr>
                <td>
                     <label for="heading">Update Heading: </label>
                </td>
                <td>
                    <input type ="text" name="heading" value="<?php echo $heading?>" pattern="^[A-Za-z ][A-Za-z0-9!@#$%^&.* ]*$" autofocus id="heading" required placeholder="Enter Update Heading" title="Update head has invalid characters"/>
           
                </td>
            </tr>
            <tr>
                
                <td>
                    <label for="details">Update Details: </label>
                </td>
                <td>
                    <input type ="text" name="details" value="<?php echo $details?>" id="details" required placeholder="Enter Update details" pattern="^[A-Za-z ][A-Za-z0-9!@#$%^&.* ]*$"/>
                </td>
            
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Add" id="add" name="add"> </td>
        </tr>
        </form>
            <form action="Updates.php">
                
            <tr>
                <td colspan="2"><input type="submit" value="Cancel" name="cancel" id="cancel"></td>
            </tr>
            </form>
            </table>
        <footer>&#9775 &nbspDeveloped by Tejashree Pradhan, Nayonika Roy and Vinay Tyagi &nbsp; &#9775 &nbsp;
            CIS 665 - Team 127 &nbsp; &#9775 &nbsp;</footer> 
    </body>
</html>
