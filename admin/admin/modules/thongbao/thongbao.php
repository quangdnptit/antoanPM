<?php
ob_start(); 
require_once "../../layout/header.php";
require_once '../../../lib/database.php';
$db=new Database();
if(isset($_POST) && $_POST!=NULL){
    $db->delThongBao();
     $db->AddThongBao($_POST);
}
 
ob_end_flush();
?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
           Thông báo ra trang chủ
        </h1>
        <ol class="breadcrumb">
         
           
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action=""  method="post">
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Thông báo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Viết thông báo" >
              

                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary " name="update thông báo">Thông báo</button>
                </div>
            </div>
        </form>
    </div>   
</div>
<!-- /.row -->
<?php
require_once "../../layout/footer.php";
?>
 