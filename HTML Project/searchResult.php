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
        <title>Search Results</title>
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
            <h1>Search Result</h1>
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
        
        //echo $_POST['search'];
        require ("sql.php");
        
        $title = getUpdateHead();
         foreach($title as $head)
                 {
                     extract($head);
                 }
        $role = $_POST['role'];
        $hero = $_POST['hero'];
        
        $role = preg_replace("/[^a-zA-Z0-9\s]/", '', $role);
         $hero = preg_replace("/[^a-zA-Z0-9\s]/", '', $hero);
        echo "$role";
        echo "$hero";
        $output = <<<HTML
                <table>
                    <tr>
                <th colspan="4">Showing results for search</th>
                        </tr>
HTML;
        
      //  $getUpdate = searchUpdate($update);
        $getResult = getResult($role,$hero);
        
        $matchingRecords = count($getResult);
        
        if ($matchingRecords == 0)
        {
           $output .= <<<HTML
               
                    <tr>
                        <td>No Results found!!</td>
                    </tr>
                    <tr>
                        <td><a href="Home.php">Back</td>
                    </tr>
                   
HTML;
        }
            else
        {
                
          $output .= <<<HTML
                  
                  <tr>
                    <th colspan="4">Search Results</th>
                  </tr>
HTML;
      
          foreach($getResult as $result)
          {
              extract($result);
              $updatenum ++;
              
              
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
                        <td colspan="4" id="s"><a href="Home.php">Back</td>
                    </tr>
                   
                  </table>
HTML;
        }           
        
        echo $output;
        ?>
         <footer>&#9775 &nbspDeveloped by Tejashree Pradhan, Nayonika Roy and Vinay Tyagi &nbsp; &#9775 &nbsp;
            CIS 665 - Team 127 &nbsp; &#9775 &nbsp;</footer>
    </body>
</html>
