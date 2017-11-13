<?php 
  		   
        require_once "../../layout/header.php";
        require_once '../../../lib/database.php';
        $db=new Database();
        $data=$db->fetchAllDESC("transaction");
    

?>
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                            Quản lí đơn hàng                            
                            </h1>
                           
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-lg-12">
   
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <th>ID</th>
            <th>Tổng giá trị</th>
            <th>Tên người dùng</th>
             <th>Số điện thoại</th>
              <th>Địa chỉ</th>
            <th>Trạng thái</th>
            <th>Ghi Chú</th>
            <th>Ngày-giờ tạo</th>
          
        </tr> 
        <?php
        if (isset($data)) {
            foreach ($data as $key => $item) {
                $dataname=$db->selectByID("users", $item["users_id"]);//lap de lay ra name dien vao bang
                $dem=0;//gán đếm để lặp ra item
            
                ?>
                    <td><?= $item["id"] ?></td>
                    <td><?= $item["amount"]." VNĐ" ?></td>
                    <td><?= $dataname[$dem]["name"] ?></td>
                     <td><?= $dataname[$dem]["phone"] ?></td>
                    <td><?= $item["address"] ?></td>
                    <td><a class="btn btn-xs btn-info" href="process.php?id=<?php echo $item["id"]."&&status=".$item["status"];?>"><i  class="fa fa-arrow-circle-left" ><?php if($item["status"]==0){echo "Chưa thanh toán"; }else{echo "Đã thanh toán";}?></i></a></td>
                    <td><?= $item["note"] ?></td>
                    <td><?= $item["created_at"] ?></td> 
                    <td><a class="btn btn-xs btn-danger" href="process.php?id=<?= $item["id"]."&&action=del" ?>"><i class="fa fa-edit">delete</td>
                                 <td><a class="btn btn-xs btn-danger" href="process.php?id=<?= $item["id"]."&&action=capnhat" ?>"><i class="fa fa-edit">Cập nhật Sản Phẩm</td>

                </tr>

                <?php
                $dem++;
            }
        }
        ?>
           
        </table>
        <div class="pull-right" style="padding-right: 30px">
        <nav aria-label="Page navigation">
</nav>
    </div>
	</div>
	</div>
                    </div>
                    <!-- /.row -->
 <?php 
    require_once "../../layout/footer.php";
?>
 