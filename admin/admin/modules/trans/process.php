<?php

require_once '../../../lib/database.php';
$db = new Database();

if (isset($_GET["id"]) && isset($_GET["status"]) && !isset($_GET["action"])) {
    $status = $_GET["status"];
    $id = $_GET["id"];
    if ($status == 1) {
        $sql = "update `transaction` set  status=0 where id=$id";
    } else {
        $sql = "update `transaction` set  status=1 where id=$id";
    }
    $db->usequery($sql);
    header('Location: http://localhost/qhlmstore/admin/modules/trans/index.php');
    exit();
}
if (isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] == "del") {
    $id = $_GET["id"];
    $sql2 = "DELETE FROM `orders` WHERE transaction_id=$id"; //xoa cac ban ghi o 2 bang order va transaction
    $db->usequery($sql2);
    $sql = "delete from `transaction` where id=$id";
    $db->usequery($sql);

    header('Location: http://localhost/qhlmstore/admin/modules/trans/index.php');
    exit();
}
if (isset($_GET["action"]) && $_GET["action"] != null) {//cap nhat so luong san pham
    $id = $_GET["id"];
    $sql="select * from orders where transaction_id= $id";
    $result=$db->usequery("$sql");
     $data = [];
       if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            var_dump($data);
            
            foreach ($data as $key => $item) {
                $id_product=$item["product_id"];//lay ra so luong san pham
               $number= $db->numberProduct($item["product_id"]);//lay ra so luong dat mua
             
                $sohangconlai=$number[0]["number"]-$item["qty"];  
                if($sohangconlai<0){//neu k du san pham thi cap nhat lai nhu cu~
               
                     echo '<script>alert("Số lượng sản phầm trong kho không đủ ");location.href="index.php"</script>';
                }else{
                $sql1="update `product` set number= $sohangconlai where id=$id_product";
                $db->usequery($sql1);
                echo '<script>alert("Cập nhật thành công ");location.href="index.php"</script>';
            }}
}
?>