<?php
ob_start(); 
require_once "../../layout/header.php";
require_once '../../../lib/database.php';
$db=new Database();
if(isset($_GET) && $_GET !=NULL){
    $id=$_GET["id"];
}
$data=$db->fetchID("admin", $id);//data de add du lieu vo form
$oldpass=$data["password"];// bien check xem mat khau moi co giong mat khau cu hay ko
if(isset($_POST) && $_POST!=NULL){
   if($oldpass==$_POST["pass"]){
       $error="mat khau moi phai khac mat khau cu";//check pass moi co giong pass cu ko,neu khac thi moi cho post
   }else{
    if($_POST["pass"]== $_POST["repass"]){
        $db->updateAdmin($_POST,$id);
         header('Location: http://localhost/qhlmstore/admin/modules/admin/index.php');
      exit();
    }else{
      $error="password va repassword phai giong nhau";
    }
    
}
}
ob_end_flush();
?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Them moi Admin
        </h1>
        <ol class="breadcrumb">
         
            <li class="active">
                <i></i> <a href="index.php">View Admin List</a>
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action=""  method="post">
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Họ và tên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" required value="<?php if(isset($data)){ echo $data["name"]; } ?>">
                </div>
            </div>
              <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Địa chỉ Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="<?php if(isset($data)){ echo $data["email"]; } ?>">
                </div>
            </div>
              <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Số điện thoại</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="tel" name="tel" placeholder="Số điện thoại" required value="<?php if(isset($data["phone"])){ echo $data["phone"]; } ?>">
                </div>
            </div>
              <div class="form-group">
                <label for="input" class="col-sm-2 control-label">PassWord</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Mật khẩu" required>
                         <p class="text-danger"><?php if(isset($error)){echo $error;} ?></p>
                </div>
            </div>
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label">RePassWord</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="repass" name="repass" placeholder="Nhap lai Mật khẩu" required>
                         <p class="text-danger"><?php if(isset($error)){echo $error;} ?></p>
                </div>
            </div>
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Dia chi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="diachi" name="diachi" placeholder="dia chi" required value="<?php if(isset($data["address"])){ echo $data["address"]; } ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Chuc vu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="level" name="level" placeholder="level" required value="<?php if(isset($data["level"])){ echo $data["level"]; } ?>">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary " name="updateadmin">UPDATE ADMIN</button>
                </div>
            </div>
        </form>
    </div>   
</div>
<!-- /.row -->
<?php
require_once "../../layout/footer.php";
?>
 