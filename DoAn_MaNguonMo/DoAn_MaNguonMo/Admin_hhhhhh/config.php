<?php
 const HOST='localhost';
 const U='root';
 const P='';
 const DB='ql_caycanh_nhom3';
 
try
{
    $conn=new PDO('mysql:host='.HOST.';dbname='.DB,U,P);
    $conn->query('set names utf8');
    
} catch(PDO_Exception $e)
{
    echo'err';
    exit;
}