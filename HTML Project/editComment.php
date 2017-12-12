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
       <title>Edit Comment</title>
        <link href="layout.css" rel="stylesheet"/>
        <link href="tables.css" rel="stylesheet"/>
    </head>
    <body>
         <header>
            
             <nav>
                <ul
                    >
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
            <h1>Edit Comment</h1>
        <?php
                    if (!empty($usrname))
                    {
                        echo "<h4 id=\"usr\">Welcome $usrname</h4>";
                       

                    }
                    else {
                         
                          echo "<h4 id=\"usr\">You are not logged in</h4>";

                     }
                 ?>
            
            
            <?php
            require("sql.php");
            
            $editmode = false;
            
            if((isset($_GET['CID'])) && (is_numeric($_GET['CID'])))
            {
                $commentDetail = getComm((int)$_GET['CID']);
                
                $editmode = (count($commentDetail)==1);
            }
            
            if($editmode)
            {
                extract($commentDetail[0]);
                $com = $Comment;
                //echo $com;
            }
            else
            {
                $Comment = '';
            }
            ?>
            
            <table>
                <form action="edit1.php" method="POST" onsubmit="return checkForm(this)">
                    <tr>
                        <th colspan="2">Edit Comment</th>
                    </tr>
                    <tr>
                        
                        <td colspan="2"><input type="hidden" name="CID" value="<?php echo $CID; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="comment">Comment: </label></td>
                    
                        <td> <input type="text" name="Comment" id="comment" value="<?php echo $Comment; ?>" autofocus required pattern="^[A-Za-z ][A-Za-z0-9!@#$%^&.* ]*$" title="Invalid characters for Comment" />
                    </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Edit" name="edit" id="edit"></td>
                    </tr>
                   
                    
                </form>
                <form action="Updates.php">
                     <tr>
                        <td colspan="2"><input type="submit" value="Cancel" name="cancel" id="cancel"></td>
                    </tr>
                </form>
            </table>
         </header>
        
   
    <footer>&#9775 &nbspDeveloped by Tejashree Pradhan, Nayonika Roy and Vinay Tyagi &nbsp; &#9775 &nbsp;
            CIS 665 - Team 127 &nbsp; &#9775 &nbsp;</footer> 
 </body>
</html>
