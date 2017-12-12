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
        <title>Hero Details</title>
        <link href="layout.css" rel="stylesheet"/>
        <link href="details.css" rel="stylesheet" />
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
            <h1>Character Guide</h1>
            
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
        
        include ("sql.php");
        
        if(isset($_GET['searchHero']))
        {
           $hero = $_GET['searchHero'];         
        }
        
        
        $heroDetail = searchHero($hero);
        
        $output = <<<HTML
                <table id="hero">
                <tr>
                    <th>Hero Name </th>
                    <th>Hero Role</th>
                    <th>Hero Type</th>
                    <th>Hero Details</th>
                </tr>
HTML;
        
        foreach($heroDetail as $detail)
        {
            extract($detail);
            $output .= <<<HTML
            <tr>
                     <td>$HeroName</td>
                     <td>$Role</td>
                     <td>$Type</td>
                     <td>$Description</td>
            </tr>
            <tr>
                     <td id="a" colspan=4 color=white><a href="characters.php">Back</td>
            </tr>
                     <footer>&#9775 &nbspDeveloped by Tejashree Pradhan, Nayonika Roy and Vinay Tyagi &nbsp; &#9775 &nbsp;
            CIS 665 - Team 127 &nbsp; &#9775 &nbsp;</footer> 
HTML;
            
        }
        
        echo $output;
        ?>                
       
        
        <footer>&#9775 &nbspDeveloped by Tejashree Pradhan, Nayonika Roy and Vinay Tyagi &nbsp; &#9775 &nbsp;
            CIS 665 - Team 127 &nbsp; &#9775 &nbsp;</footer> 
    </body>
</html>
