<?php
ob_start(); 
require_once "../../layout/header.php";
require_once '../../../lib/database.php';
$db=new Database();

if(isset($_GET["id"]) && $_GET!=null){
    $id=$_GET["id"];
   $data=$db->fetchID("category", $id); 
   if($data["display"]=="1"){
       $sql="update category set display ='0' where id= $id";
      
   }else{
       $sql="update category set display ='1' where id= $id";
   }
    $db->usequery($sql);
  header('Location: http://localhost/qhlmstore/admin/modules/categories/displaycate.php');
      exit();
}
ob_end_flush();
?>