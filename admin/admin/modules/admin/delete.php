<?php

ob_start();    
   require_once "../../layout/header.php";
        require_once '../../../lib/database.php';
        $db=new Database();
      if(isset($_GET) && $_GET!=null){
      	var_dump($_GET);
      		$id=$_GET["id"];
      		$db->deleteAdmin($id);
      		 header("Location: http://localhost/qhlmstore/admin/modules/admin/index.php");
          	  exit();
      }else{
      	echo"deo dc";
      }
     
      ob_end_flush();