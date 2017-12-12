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
            
            <?php
                    if (!empty($usrname))
                    {
                        $output = <<<HTML
                                <h4>Welcome $usrname</h4>
HTML;
                         echo $output;
                    }
                    else {
                          $output = <<<HTML
                                <h4>Welcome Home</h4>
HTML;
                         echo $output;
                     }
                 ?>
            <h1>Add Update</h1>           
        </header>
        
        <?php
         require ("sql.php");
         
        $head = $_GET['heading'];
         $details = $_GET['details'];        
                  
          /*echo $head;
          echo $details;*/
         $getUpdate = getUpdateHead();
         
         if(count($getUpdate)==1)
         {
             $output = <<<HTML
                    <h1>Update already exists! Error adding update</h1>
                    <table>
                        <tr>
                            <td><a href="Update.php">Back</td>
                        </tr>
                        <tr>
                            <td><a href="Home.php">Home</td>
                        </tr>
                    </table>
                  
HTML;
             
         }
        else {
            addUpdate($head,$details);
            
            $update = getUpdateHead();
            foreach($update as $upHead)
            {
                extract($upHead);
                
                $output = <<<HTML
                        <table>
                        <tr>
                            <th>Update added successfully!</th>
                        </tr>
                        <tr>
                            <td><a href="Updates.php">All Updates</td>
                        </tr>
                        </table>
HTML;
                
            }
               
            
        }       
         
       echo $output;
         ?>
        <footer>&#9775 &nbspDeveloped by Tejashree Pradhan, Nayonika Roy and Vinay Tyagi &nbsp; &#9775 &nbsp;
            CIS 665 - Team 127 &nbsp; &#9775 &nbsp;</footer> 
    </body>
</html>
