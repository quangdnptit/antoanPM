<?php 
  		   
        require_once "../../layout/header.php";
        require_once '../../../lib/database.php';
        $db=new Database();
        $data=$db->fetchAll("product");
 
 


?>
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                              Quan Li Hien Thi San Pham
                             
                               
                            </h1>
                           
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-lg-12">
   
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <th>ID</th>
            <th>Name</th>
            <th>Avar</th>
            <th>Hien Thi San Pham Hot</th>
            <th>Hien Thi San Pham Slider</th>
        </tr> 
        <?php
        if (isset($data)) {
            foreach ($data as $key => $item) {
                ?>
                <tr>
                    <td><?= $item["id"] ?></td>
                    <td><?= $item["name"] ?></td>
                    <td>
                        <img id="imghihi" src="../../../public/upload/product/ <?php echo $item["thunbar"]?>">
                   </td>
                    <td><a class="btn btn-xs btn-info" href="XuLi.php?id=<?=$item["id"]."&req=hot"?>"><i class ="fa fa-arrow-down"><?php if($item["hot"]=="1"){echo"Ngung Hien Thi";}else{echo "Hien Thi";}?></i></td>
                    <td><a class="btn btn-xs btn-info" href="XuLi.php?id=<?=$item["id"]."&req=slide"?>"><i class ="fa fa-arrow-up"><?php if($item["slide"]=="1"){echo"Ngung Hien Thi";}else{echo "Hien Thi";}?></i></td>
                </tr>

                <?php
            }
        }
        ?>
           
        </table>
 
	</div>
	</div>
                    </div>
                    <!-- /.row -->
 <?php 
    require_once "../../layout/footer.php";
?>
 