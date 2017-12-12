<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

$usrname = (isset($_SESSION['userInfo']))? $_SESSION['userInfo']['FirstName'] : "";

require ("sql.php");

if((isset($_GET['CID'])) && (is_numeric($_GET['CID'])))
{
    deleteComment((int)$_GET['CID']);
}

header("Location: Updates.php");
exit;