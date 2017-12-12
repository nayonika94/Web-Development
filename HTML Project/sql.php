<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ("dbConnExec.php");

function searchHero($hero)
{
    $query = <<<ABC
            Select HeroName, Role, Type, Description
            From Hero
            Where HeroName='$hero'
ABC;
    return executeQuery($query);
}

function getHeroByRole($heroRole)
{
    $query = <<<ABC
            Select HeroName, Role, Type, Description
            From Hero
            Where Role='$heroRole'
ABC;
    return executeQuery($query);
    
}

function getRoles()
{
    $query = <<<ABC
            Select Role, RoleDetail
            From Role
ABC;
    return executeQuery($query);
}

function getUser($username,$password)
{
    $query = <<<ABC
            Select UserID, FirstName, LastName, Username, Password, Access
            From [User]
            Where Username='$username' 
            and Password='$password'
            
ABC;
    return executeQuery($query);
}

function addUser($firstname,$lastname,$username,$password)
{
    $query = <<<ABC
            Insert Into [User] (FirstName,LastName,Username,Password,Access)
            Values('$firstname','$lastname','$username','$password','User')
ABC;
    executeQuery($query);
}

function getUpdateHead()
{
    $query = <<<ABC
            Select UID, Heading, UpDetails
            From DotaUpdate
ABC;
    return executeQuery($query);
}

function getHead($head)
{
    $query = <<<ABC
            Select Heading
            From DotaUpdate
            Where Heading='$head'
ABC;
    return executeQuery($query);
}

function getComment($usr)
{
    $query = <<<ABC
            Select Comments.CID, Comments.Comment, [User].Username
            From [User]
            Inner Join Comments
            On [User].UserID=Comments.UserID
            Where Username='$usr'
ABC;
    return executeQuery($query);
}

function displayComments($uid)
{
    $query=<<<ABC
            Select Comments.CID, Comments.Comment, [User].Username
            From Comments
            Inner Join [User]            
            On Comments.UserID=[User].UserID
            Where UID='$uid'
ABC;
    return executeQuery($query);
}

function addUpdate($head,$details)
{
    $query =<<<ABC
            Insert Into DotaUpdate (Heading, UpDetails)
            Values ('$head','$details')
ABC;
    
     executeQuery($query);
}

function deleteComment($CID)
{
    $query = <<<ABC
            Delete
            From Comments
            Where CID=$CID
ABC;
    executeQuery($query);
}

function getComm($CID)
{
    $query = <<<ABC
            Select CID, Comment
            From Comments
            Where CID='$CID'
ABC;
    
    return executeQuery($query);
}

function editComment($CID,$Comment)
{
    $query = <<<ABC
            Update Comments
            Set Comment = '$Comment'
            Where CID='$CID'
               
ABC;
    
    executeQuery($query);
}

function searchUpdate($searchstr)
{
    $query = <<<ABC
            Select UID, Heading, UpDetails
            From DotaUpdate
            Where Heading like '%$searchstr%'
ABC;
    
    return executeQuery($query);
}

function addComment($comment,$UserID,$UID)
{
   $query = <<<ABC
           Insert Into Comments (Comment,UserID,UID)
    Values ('$comment','$UserID','$UID')
ABC;
   executeQuery($query);
}

function searchComment($comment)
{
    $query = <<<ABC
            Select Comment
            From Comments
            Where Comment='$comment'
ABC;
    return executeQuery($query);
}

function getResult($role,$hero)
{
    $query = <<<ABC
            Select HeroName, Role, Type, Description
            From Hero
            Where 0=0
            
ABC;

    if ($role != '')
    {
        $query .= <<<ABC
                And Role='$role'
ABC;
    }
    
    if ($hero != '')
    {
        $query .= <<<ABC
                And HeroName like '%$hero%'
ABC;
    }
  $query .= <<<ABC
          Order by HeroName
ABC;
 
    return executeQuery($query);
}