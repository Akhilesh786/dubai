<?php

if(strlen($_SESSION['id'])==0)
{
header('location:https://awesomesauce.in/admin/');
}
else{

$userid = $_SESSION['id'];
}
?>