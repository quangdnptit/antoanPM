<?php
session_start();
if(isset($_SESSION['user'])){
    session_destroy();
}
header('Location: http://localhost/antoanpm/admin/fontend/index.php');