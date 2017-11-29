<?php
session_start();
require_once '../../lib/Database.php';
$db=new Database();
?>
<html>
    <header>
        <title>
            Login forum
        </title>
        <style>
            body{
                width: 100%;
                height: 100%;
                font-family: 'Open Sans', sans-serif;
                background: #ffffff;
            }
            input {
                width: 100%;
                margin-bottom: 10px;
                border: none;
                outline: none;
                padding: 10px;
                font-size: 13px;
                text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
                border: 1px solid rgba(0,0,0,0.3);
                border-radius: 4px;
                box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
                -webkit-transition: box-shadow .5s ease;
                -moz-transition: box-shadow .5s ease;
                -o-transition: box-shadow .5s ease;
                -ms-transition: box-shadow .5s ease;
                transition: box-shadow .5s ease;
            }
            .login{
                position: absolute;
                top: 50%;
                left: 50%;
                margin: -150px 0 0 -150px;
                width: 300px;
                height: 300px;
            }
            .btn-block {
                width: 100%;
                display: block;
                color: #ffffff;
                background-color: #4a77d4;
                border: 1px solid #3762bc;
                text-shadow: 1px 1px 1px rgba(0,0,0,0.4);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5);
                padding: 9px 14px;
                font-size: 15px;
                line-height: normal;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
            }
            .btn-block:hover {
                filter: none;
                background-color: #4a77d4;
            }
        </style>
    </header>
    <body>
        <?php
            if(isset($_POST['btnSubmit'])){
                $username = isset($_POST['username'])?$_POST['username']:'';
                $password = isset($_POST['password'])?$_POST['password']:'';
                if(empty($username) || empty($password)){
                    echo "<script>alert('Please enter full information in the box');</script>";
                }else{
                    $result  = $db->checkLogin($username,$password);
                    if(!empty($result)){
                        $_SESSION['user'] = $result[0];
                    ?>
                        <script type='text/javascript'>
                            alert('Đăng nhập thành công!');
                            window.location = "http://localhost/antoanpm/admin/fontend/index.php";
                        </script>
                    <?php
                    }
                    //$user_id = $result[0]['id'];
                }
            }
        ?>
        <div class="login">
            <h1>Login</h1>
            <form method="post">
                <input type="text" name="username" placeholder="Username" required="required" />
                <input type="password" name="password" placeholder="Password" required="required" />
                <input type="submit" class="btn-block" value="Login" name="btnSubmit"/>
            </form>
        </div>
    </body>

</html>
