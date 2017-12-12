<!DOCTYPE html>

<?php

session_start();

$usrname = (isset($_SESSION['userInfo']))? $_SESSION['userInfo']['FirstName'] : "";

?>
<html>
    <head>
        <meta charset="UTF-8">
        <!--
            Project Title: Dota2Info.html
            Developed by: Tejashree Pradhan, Nayonika Roy and Vinay Tyaagi
            Group: Team127
            Page: Home.php
        !-->
        <title>Home</title>
        <link href="layout.css" rel="stylesheet">
    </head>
    <body>

        <header>
            <h1>Welcome to Dota2Info</h1>
            
             
            
            <img src="backgroundimg.jpg"  alt="dota2info" id="headerimg"/>

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
                        echo "<h4 id=\"usr\">Welcome $usrname</h4>";
                       

                    }
                    else {
                         
                          echo "<h4 id=\"usr\">Welcome Home</h4>";

                     }
                 ?>
                

        </header>

        <div class="main">

            <div id="search">
                <form name="home.php" method="post" action="searchResult.php"/>
                <label for="role">Search Role:</label>
                <input type="text" name="role" value="<?php echo $role?>" id="role" placeholder="Example: Disabler"/>
             
                <label for="hero">Search Hero:</label>
                <input type="text" name="hero" id="hero" value="<?php echo $hero?>" placeholder="Example: Lycan"/>
                <input type="submit" value="Search" name="searchbtn"/>
            </div>

        </div>

        <footer>&#9775 &nbspDeveloped by Tejashree Pradhan, Nayonika Roy and Vinay Tyagi &nbsp; &#9775 &nbsp;
            CIS 665 - Team 127 &nbsp; &#9775 &nbsp;</footer> 
        
    </body>
</html>
