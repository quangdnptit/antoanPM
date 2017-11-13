<?php
ob_start(); 
require_once "../../layout/header.php";
require_once '../../../lib/database.php';
$db=new Database();

if(isset($_POST) && $_POST!=NULL){
    var_dump($_POST);
    if($_POST["pass"]== $_POST["repass"]){
        $db->addAdmin($_POST);
         header('Location: http://localhost/qhlmstore/admin/modules/admin/index.php');
      exit();
    }else{
      $error="password va repassword phai giong nhau";
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
                    <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" required value="<?php if(isset($_POST["name"])){ echo $_POST["name"]; } ?>">
                </div>
            </div>
              <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Địa chỉ Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="<?php if(isset($_POST["email"])){ echo $_POST["email"]; } ?>">
                </div>
            </div>
              <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Số điện thoại</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="tel" name="tel" placeholder="Số điện thoại" required value="<?php if(isset($_POST["tel"])){ echo $_POST["tel"]; } ?>">
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
                    <input type="text" class="form-control" id="diachi" name="diachi" placeholder="dia chi" required value="<?php if(isset($_POST["diachi"])){ echo $_POST["diachi"]; } ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Chuc vu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="level" name="level" placeholder="level" required value="<?php if(isset($_POST["level"])){ echo $_POST["level"]; } ?>">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary " name="addadmin">Thêm mới admin</button>
                </div>
            </div>
        </form>
    </div>   
</div>
<!-- /.row -->
<?php
require_once "../../layout/footer.php";
?>
 