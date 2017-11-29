<?php
session_start();
if(isset($_SESSION['user'])){
    require_once '../lib/Database.php';
    $db=new Database();
    include_once 'layout/header.php';
    $post_id = isset($_GET['post_id'])?$_GET['post_id']:'';
    $author_id = isset($_GET['author_id'])?$_GET['author_id']:'';
    $action = isset($_GET['action'])?$_GET['action']:'';//action
    if($action == 'edit'){
        $post = $db->getPostByPaUid($post_id,$author_id);
    }elseif ($action == 'delete'){
        if($db->deletePost($post_id)){
            echo "<script type='text/javascript'>alert('Comment thành công!');</script>";
            header('Location: http://localhost/antoanpm/admin/fontend/manager-post.php');
        }
    }
    if(isset($_POST['btnSumit'])){
        $user = $_SESSION['user'];
        $user_id = $user['id'];
        $title = isset($_POST['title_post'])?$_POST['title_post']:'';
        $category = isset($_POST['category'])?$_POST['category']:'';
        $content = isset($_POST['editor1'])?$_POST['editor1']:'';
        $status = isset($_POST['status'])?$_POST['status']:1;
        $permission = isset($_POST['permission'])?$_POST['permission']:0;
        if(empty($title) || empty($category) || empty($content)){
            echo "<script type='text/javascript'>alert('Bạn phải điền đầy đủ vào các ô!');</script>";
        }else{
            $data = array(
                'id' => $post_id,
                'user_id' => $user_id,
                'category_id' => $category,
                'title' => addslashes ($title),
                'content' => addslashes ($content),
                'status' => $status,
                'permission' => $permission
            );
            if($db->updatePost($data)){
            ?>
                <script type='text/javascript'>
                    alert('Sửa bài thành công!');
                    window.location = "http://localhost/antoanpm/admin/fontend/index.php";
                </script>
            <?php
                header("Location: http://localhost/antoanpm/admin/fontend/edit-post.php?action=edit&post_id=$post_id&author_id=$user_id");
            }
        }
    }
    ?>
    <div id="main_content">
        <h1 align="center" style="margin: 5px 0px">Edit post</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Tiêu đề</td>
                    <td>
                        <input type="text" placeholder="Title" name="title_post" id="title_post" required="" value="<?= isset($post['title'])?$post['title']:''; ?>"/>
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
                                    if($post['category_id'] == $category['id']){
                                ?>
                                        <option value="<?= $category['id'] ?>" selected>
                                            <?= $category['name'] ?>
                                        </option>
                                <?php
                                    }else{
                                ?>
                                        <option value="<?= $category['id'] ?>">
                                            <?= $category['name'] ?>
                                        </option>
                                <?php
                                    }
                            ?>
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
                        <textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10" placeholder="Content"><?= $post['content']?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <td>
                        <select name="status">
                        <?php
                            if($post['status'] == 1){
                        ?>
                                <option value="1" selected>Open</option>
                                <option value="0">Close</option>
                        <?php
                            }else{
                        ?>
                                <option value="1">Open</option>
                                <option value="0" selected>Close</option>
                        <?php
                            }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Chế độ người xem</td>
                    <td>
                        <select name="permission">
                            <?php if($post['permission'] == 0){ ?>
                                <option value="0" selected="selected">Mọi người</option>
                                <option value="1">Thành viên trong form</option>
                                <option value="2">Chỉ mình tôi</option>
                            <?php }elseif ($post['permission'] == 1){ ?>
                                <option value="0">Mọi người</option>
                                <option value="1" selected="selected">Thành viên trong form</option>
                                <option value="2">Chỉ mình tôi</option>
                            <?php }else{?>
                                <option value="0">Mọi người</option>
                                <option value="1">Thành viên trong form</option>
                                <option value="2" selected="selected">Chỉ mình tôi</option>
                            <?php }?>
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
    echo "<script type='text/javascript'>alert('Bạn phải đăng nhập để truy cập vào trang này!');</script>";
    header('Location: http://localhost/antoanpm/admin/fontend/index.php');
}
