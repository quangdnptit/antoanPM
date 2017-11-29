<?php 
  		   
        require_once "../../layout/header.php";
        require_once '../../../lib/database.php';
        $db=new Database();
        $data=$db->fetchAll("category");

?>
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                               Danh sach danh muc
                               <a href="addcate.php" class=" btn btn-primary">Them danh muc</a>
                               
                            </h1>
                           
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-lg-12">
   
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <th>ID</th>
            <th>Name</th>
            <th>Hien Thi</th>
        </tr> 
        <?php
        if (isset($data)) {
            foreach ($data as $key => $item) {
                ?>
                <tr>
                    <td><?= $item["id"] ?></td>
                    <td><?= $item["name"] ?></td>
                    <td><a class="btn btn-xs btn-info" href="display.php?id=<?=$item["id"]?>"><i class ="fa fa-edit"><?php if($item["display"]=="0"){echo"Ngung Hien Thi";}else{echo "Hien Thi";}?></i></td>
                    <td><a class="btn btn-xs btn-info" href="edit.php?id=<?= $item["id"] ?>"><i class="fa fa-edit"></i>Edit</td>
                    <td><a class="btn btn-xs btn-danger" href="delete.php?id=<?= $item["id"] ?>"><i class="fa fa-edit">delete</td>

                </tr>

                <?php
            }
        }
        ?>
           
        </table>
        <div class="pull-right" style="padding-right: 30px">
        <nav aria-label="Page navigation">
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
    </div>
	</div>
	</div>
                    </div>
                    <!-- /.row -->
 <?php 
    require_once "../../layout/footer.php";
?>
 