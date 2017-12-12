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
        <title>Heroes</title>
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
        
        
        <table id="charTable">
            <tr>
                <th colspan="4">Select a Hero</th>
            </tr>
            <tr>
                <td><a href="charDetail.php?searchHero=Earthshaker"/> Earthshaker</td>
                <td><a href="charDetail.php?searchHero=Luna"/>Luna</td>
                <td><a href="charDetail.php?searchHero=Enchantress"/>Enchantress</td>
                <td><a href="charDetail.php?searchHero=Axe"/>Axe</td>
                
            </tr>
            <tr>
                <td><a href="charDetail.php?searchHero=IO"/>IO</td>
                <td><a href="charDetail.php?searchHero=Jakiro"/>Jakiro</td>
                <td><a href="charDetail.php?searchHero=Slardar"/>Slardar</td>
                <td><a href="charDetail.php?searchHero=Crystal Maiden"/>Crystal Maiden</td>
                
            </tr>
            <tr>
                <td><a href="charDetail.php?searchHero=Phantom Assassin"/>Phantom Assassin</td>
                <td><a href="charDetail.php?searchHero=Sven"/>Sven</td>
                <td><a href="charDetail.php?searchHero=Invoker"/>Invoker</td>
                <td><a href="charDetail.php?searchHero=Faceless Void"/>Faceless Void</td>
                                 
            </tr>
            <tr>
                <td><a href="charDetail.php?searchHero=Medusa"/>Medusa</td>
                <td><a href="charDetail.php?searchHero=Nyx"/>Nyx</td>
                <td><a href="charDetail.php?searchHero=Lina"/>Lina</td>      
                <td><a href="charDetail.php?searchHero=Lycan"/>Lycan</td>      
            </tr>
           
        </table>
            
        </form>     
     
   
    
    <footer>&#9775 &nbspDeveloped by Tejashree Pradhan, Nayonika Roy and Vinay Tyagi &nbsp; &#9775 &nbsp;
            CIS 665 - Team 127 &nbsp; &#9775 &nbsp;</footer> 
         </body>
</html>
