<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hero Roles</title>
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
                    <li><a href="Login.php">Login</a></li>
                </ul>
            </nav>
            <h1>Hero Roles</h1>
            
        </header>
       
        <?php
        
        include ("sql.php");
        
        
        
        if(isset($_GET['role']))
        {
           $heroRole = $_GET['role'];         
        }
        
        $getRole = getHeroByRole($heroRole);
        
        $output = <<<HTML
                <table id="roleDetails">
                <tr>
                    <th>Hero Name</th>
                    <th>Hero Role</th>
                    <th>Hero Type</th>
                    <th>Hero Details</th>
                </tr>
HTML;
        
        foreach($getRole as $roleDetail)
        {
            extract($roleDetail);
            $output .= <<<HTML
            <tr>
                     <td>$HeroName</td>
                     <td>$Role</td>
                     <td>$Type</td>
                     <td>$Description</td>
            </tr>
                    
            
HTML;
        }
        $output .= <<<HTML
        <tr>
                     <td id="r" colspan=4 color=white><a href="Roles.php">Back</td>
            </tr>
                </table>
HTML;
        
        
        echo $output;
        ?>
        <footer>&#9775 &nbspDeveloped by Tejashree Pradhan, Nayonika Roy and Vinay Tyagi &nbsp; &#9775 &nbsp;
            CIS 665 - Team 127 &nbsp; &#9775 &nbsp;</footer> 
    </body>
</html>
