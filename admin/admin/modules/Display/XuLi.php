<?php
ob_start(); 
require_once "../../layout/header.php";
require_once '../../../lib/database.php';
$db=new Database();

if(isset($_GET["id"]) && $_GET!=null && isset($_GET["req"])){
    
    if($_GET["req"]=="hot"){//ham xu li neu req= hot
    $id=$_GET["id"];
   $data=$db->fetchID("product", $id); //bat id cua product va request
   if($data["hot"]=="1"){
       $sql="update product set hot ='0' where id= $id";//neu -1 thi
   }else{
       $sql="update product set hot ='1' where id= $id";
   }
    $db->usequery($sql);
    header('Location: http://localhost/qhlmstore/admin/modules/Display/index.php');
      exit();
}elseif ($_GET["req"]=="slide"){//xu li khi hot =slider
  $id=$_GET["id"];
   $data=$db->fetchID("product", $id); //bat id cua product va request
   if($data["slide"]=="1"){
       $sql="update product set slide ='0' where id= $id";//neu -1 thi
   }else{
       $sql="update product set slide ='1' where id= $id";
   }
    $db->usequery($sql);
    header('Location: http://localhost/qhlmstore/admin/modules/Display/index.php');
      exit();
}

   }
ob_end_flush();
?>