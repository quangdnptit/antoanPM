<?php
session_start();
if(isset($_SESSION['user'])){
    require_once '../lib/Database.php';
    $db=new Database();

    include_once 'layout/header.php';
    if(isset($_POST['btnSumit'])){
        $user = $_SESSION['user'];
        $title = isset($_POST['title_post'])?$_POST['title_post']:'';
        $category = isset($_POST['category'])?$_POST['category']:'';
        $content = isset($_POST['editor1'])?$_POST['editor1']:'';
        $permission = isset($_POST['permission'])?$_POST['permission']:0;
        if(empty($title) || empty($category) || empty($content)){
        ?>
            <script type='text/javascript'>
                alert('Bạn phải điền đầy đủ vào các ô!');
            </script>
        <?php
        }else{
            $data = array(
                'user_id' => $user['id'],
                'category_id' => $category,
                'title' => addslashes ($title),
                'content' => addslashes ($content),
                'permission' => $permission
            );
            if($db->createPost($data)){
            ?>
                <script type='text/javascript'>
                    alert('Đăng bài thành công!');
                </script>
            <?php
            }
        }
    }
?>
    <div id="main_content">
        <h1 align="center" style="margin: 5px 0px">Write post</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Tiêu đề</td>
                    <td>
                        <input type="text" placeholder="Title" name="title_post" id="title_post" required=""/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Categories
                    </td>
                    <td>
                        <select name="category">
                            <?php
                            $categories = $db->getAllCategories();
                            if(isset($categories)){
                                foreach ($categories as $category):
                            ?>
                                    <option value="<?= $category['id'] ?>">
                                        <?= $category['name'] ?>
                                    </option>

                            <?php
                                endforeach;
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nội dung</td>
                    <td>
                        <textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10" placeholder="Content"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Chế độ người xem</td>
                    <td>
                        <select name="permission">
                            <option value="0">Mọi người</option>
                            <option value="1">Thành viên trong form</option>
                            <option value="2">Chỉ mình tôi</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="btnSumit" value="Post"/>
                    </td>
                </tr>

            </table>
        </form>
    </div>
    <?php
    require_once 'layout/footer.php';
}else{
?>
    <script type='text/javascript'>
        alert('Bạn phải đăng nhập để truy cập vào trang này!');
        window.location = "http://localhost/antoanpm/admin/fontend/index.php";
    </script>
<?php
}
