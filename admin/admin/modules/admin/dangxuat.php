<?php
session_start();
  if(isset($_SESSION["admin_login"]) && $_SESSION["admin_login"]!=null){
      unset($_SESSION["admin_login"]);
       echo '<script>alert("Đăng xuất thành công ");location.href="../../index.php"</script>';   
      
  }else{
        echo '<script>alert("Bạn ko đc vào trang này ");location.href="../../../../index.php"</script>';   
  }