<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

session_start();

$usrname = (isset($_SESSION['userInfo']))? $_SESSION['userInfo']['FirstName'] : "";
$usr = (isset($_SESSION['userInfo']))? $_SESSION['userInfo']['Username'] : "";

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
                         
                          echo "<h4 id=\"usr\">You are not logged in. You must login in order to Add/Edit/Delete your comment</h4>";

                     }
                 ?>
            
        </header>
        <?php
        require ("sql.php");
        
        $head = $_GET['head'];
        $detail = $_GET['detail'];
        $id = $_GET['uid'];
        
        
     $displayComment = displayComments($id);
        
        
        $output = <<<HTML
                <table>
                
                <tr>
                    <th colspan="4">$detail</th>
                </tr>
HTML;
        
        foreach($displayComment as $display)
        {
            extract($display);
            $output .= <<<HTML
                      <tr>
                        <td>$Comment</td>                    
                        <td>Comment By: $Username</td>
HTML;
                    
       // echo $_SESSION['userInfo']['Username'];
        //echo "$usr";
        
        if (!empty($usr))
          {
          //   echo "$usr";
           
              $foundComment = getComment($usr);
             
              foreach($foundComment as $found)
              {
                  if($found['CID']==$CID)
                  {
                      $cid=$found['CID'];
                      $output .= <<<HTML
                              
                               <td><a href="editComment.php?CID=$cid">Edit</td>
                              <td><a href="commentDel.php?CID=$cid">Delete</td>
                      </tr>
HTML;
                     
                  }            
 
              }
               
        }
         
        }
        if(!empty($usr))
        {
        $output .= <<<HTML
                       <tr>
                            <td colspan="4"><a href="addComment.php?UID=$id">Add Comment</td>
                       </tr>
HTML;
        } 
        $output .= <<<HTML
                <tr>
                        <td colspan="4"><a href="Updates.php">Back</td>
                    </tr>
HTML;
        echo $output;
        ?>
        <footer>&#9775 &nbspDeveloped by Tejashree Pradhan, Nayonika Roy and Vinay Tyagi &nbsp; &#9775 &nbsp;
            CIS 665 - Team 127 &nbsp; &#9775 &nbsp;</footer> 
    </body>
</html>
