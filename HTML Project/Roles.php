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
        <title>Hero Roles</title>
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
             
            
            <h1>Hero Roles</h1>
                         <?php
                    if (!empty($usrname))
                    {
                        echo "<h4 id=\"usr\">Welcome $usrname</h4>";
                       

                    }
                    else {
                         
                          echo "<h4 id=\"usr\">You are not logged in</h4>";

                     }
                 ?>
            <h1>Select a Role </h1>
            
        </header>
        
        <?php
        require ("sql.php");
        
        $getRoles = getRoles();
        
        $output = <<<HTML
                <table id="roles">
            
            <tr>
                <th>Role</th>
                <th>Role Detail</th>
            </tr>
                
            
            
HTML;
        foreach($getRoles as $role)
        {
            extract($role);
            $output .= <<<HTML
             <tr>
                <td><a href="roleDetail.php?role=$Role">$Role</td>
                <td>$RoleDetail</td>    
            </tr>        
            
          
HTML;
        }
        echo $output;
        ?>       
      
            
        <footer>&#9775 &nbspDeveloped by Tejashree Pradhan, Nayonika Roy and Vinay Tyagi &nbsp; &#9775 &nbsp;
            CIS 665 - Team 127 &nbsp; &#9775 &nbsp;</footer> 
    </body>
</html>
