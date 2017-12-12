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
        <title>Dota2 Updates</title>
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
             <h1>Dota2 Updates!!</h1>
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
        <?php
        
        require ("sql.php");
        
        $title = getUpdateHead();
        
     
        $output = <<<HTML
                <table id="updateHead">
                <tr>
                    <th>Updates!!</td>
                </tr>
               
HTML;
        
        foreach($title as $head)
        {
            extract($head);
            $output .= <<<HTML
            <tr>
                    <td><a href="UpdateDetails.php?uid=$UID&&$head=$Heading&&detail=$UpDetails">$Heading</td>
            </tr>
            
HTML;
        }             
                  
                        if($_SESSION['userInfo']['Access']=='Admin')
                        {
                            $output .= <<<HTML
                                    <tr>
                                        <td id="up"><a href="addUpdate.php">Add new Update</a></td>
                                    </tr>
HTML;
                        }
                    
               
        echo $output;
        ?>
    
        <footer>&#9775 &nbspDeveloped by Tejashree Pradhan, Nayonika Roy and Vinay Tyagi &nbsp; &#9775 &nbsp;
            CIS 665 - Team 127 &nbsp; &#9775 &nbsp;</footer> 
    </body>
</html>
