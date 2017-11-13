<?php
ob_start(); 
require_once "../../layout/header.php";
require_once '../../../lib/database.php';
$db=new Database();

if(isset($_GET) && $_GET!=NULL){
		$id=$_GET["id"];
		$data=$db->fetchID("category",$id);//lay ra id can edit
              
}
if(isset($_POST)&& $_POST!=NULL){
        $check=0;//check trung ten cate--fetchall ra roi so sanh vs $_post
        $allCate=$db->fetchAll("category");
        if (isset($allCate)) {
        foreach ($allCate as $key => $item) {//forreach ktra
            if($item["name"]==$_POST["cate_name"]) $check=1;
            
        }
        }
	if($_POST["cate_name"]=="" && $_POST["cate_name"]==NULL){
        $error="vui long nhap category";
        }elseif($check==1){
            $error="danh muc da ton tai";
        }else{
	$db->updateCate($_POST,$id);//do tren form k luu lai id cua cate can sua=> can truyen vao id
           header("Location: http://localhost/qhlmstore/admin/modules/categories/displaycate.php");
          	  exit();
}

        }
ob_end_flush();
?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Them moi danh muc
        </h1>
        <ol class="breadcrumb">
            <li>
                <i></i> <a href="index.html">Danh muc</a>
            </li>
            <li class="active">
                <i></i> <a href="displaycate.php">View Cate</a>
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action=""  method="post">
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Categories</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cate_name" name="cate_name" placeholder="Categories" value="<?php echo $data["name"]?>">
                    <p class="text-danger"><?php if(isset($error)){echo $error;} ?></p>

                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary " name="EditCate">Edit</button>
                </div>
            </div>
        </form>
    </div>   
</div>
<!-- /.row -->
<?php
require_once "../../layout/footer.php";
?>
 