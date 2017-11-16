<?php
session_start();
require_once '../lib/Database.php';
$db=new Database();
include_once 'layout/header.php';
$post_id = $_GET['post_id'];
$user_id = $_GET['user_id'];
$post = $db->getPostById($post_id);
$data = array();
if(isset($_POST['btmPostCmt'])){
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        $content = isset($_POST['content_comment'])?$_POST['content_comment']: '';
        if(empty($content)){
            echo "<script type='text/javascript'>alert('Ô bình luận không được bỏ trống!');</script>";
        }else{
            $data = array(
                'post_id' => $post_id,
                'user_id' => $user['id'],
                'derc' => $content
            );
            $result = $db->createComment($data);
            if($result){
                echo "<script type='text/javascript'>alert('Comment thành công!');</script>";
                header('Location: http://localhost/antoanpm/admin/fontend/single-post.php?post_id='.$post_id.'&user_id='.$user_id.'');
            }else{
                echo "<script type='text/javascript'>alert('Comment thất bại!');</script>";
            }
        }
    }else{
        echo "<script type='text/javascript'>alert('Bạn phải đăng nhập để có thể bình luận trong bài viết này!');</script>";
    }
}
if(isset($_POST['btmEditCmt'])){
    if($_SESSION['user']){
        $userId = isset($_POST['user'])?$_POST['user']: 0;
        $comment_id = isset($_POST['comment_id'])?$_POST['comment_id']: 0;
        $content = isset($_POST['content_edit'])?$_POST['content_edit']: '';
        if(empty($content)){
            echo "<script type='text/javascript'>alert('Ô bình luận không được bỏ trống!');</script>";
        }else{
            $data = array(
                'id' => $comment_id,
                'post_id' => $post_id,
                'user_id' => $userId,
                'derc' => $content
            );
            $result = $db->updateComment($data);
            if($result){
                echo "<script type='text/javascript'>alert('Sửa comment thành công!');</script>";
                header('Location: http://localhost/antoanpm/admin/fontend/single-post.php?post_id='.$post_id.'&user_id='.$user_id.'');
            }else{
                echo "<script type='text/javascript'>alert('Sửa comment thất bại!');</script>";
            }
        }
    }else{
        echo "<script type='text/javascript'>alert('Bạn phải đăng nhập để có thể bình luận trong bài viết này!');</script>";
    }
}
if(isset($_POST['btmDeleteCmt'])){
    if($_SESSION['user']){
        $comment_id = isset($_POST['comment_id'])?$_POST['comment_id']: 0;
        if($comment_id > 0){
            $result = $db->deleteComment($comment_id);
            if($result){
                echo "<script type='text/javascript'>alert('Xóa comment thành công!');</script>";
                header('Location: http://localhost/antoanpm/admin/fontend/single-post.php?post_id='.$post_id.'&user_id='.$user_id.'');
            }else{
                echo "<script type='text/javascript'>alert('Xóa comment thất bại!');</script>";
            }
        }
    }else{
        echo "<script type='text/javascript'>alert('Bạn phải đăng nhập để có thể bình luận trong bài viết này!');</script>";
    }
}
if(!empty($post)){
?>
    <div id="main_content">
        <h1 style="text-align: center; margin-top: 30px;"><?= $post['title'] ?></h1>
        <div class="content_post">
            <?= $post['content'] ?>
        </div>
        <div class="name_author">Tác giả:
            <?php
                $user = $db->getUserById($user_id);
                if(!empty($user)){
                    echo "<b>".$user['name']."</b>";
                }
            ?>
        </div>
        <?php
            if($post['status'] == 1) {
                ?>
                <div class="post_comment">
                    <button class="button button_comment" type="button">Post comment</button>
                    <form action="" method="post">
                        <table style="width: 90%; display: none;" class="table_commnent">
                            <tr>
                                <td>
                                    <textarea type="text" name="content_comment" placeholder="comment"
                                              required="required"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="btmPostCmt" value="Comment" style="margin-top: 10px;"
                                           class="button"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

                <?php
            }else{
                echo "Close post";
            }
        ?>

        <?php
            $comments = $db->getAllCommentByPostId($post_id);
            foreach (array_reverse($comments) as $comment):
        ?>
                <div class="comment">
                    <div class="user-comment">
                        <?php
                            $uc = $db->getUserById($comment['user_id']);
                            echo $uc['name'];
                        ?>
                    </div>
                    <div class="dialogbox">
                        <div class="body">
                            <span class="tip tip-up"></span>
                            <div class="message">
                                <span><?= $comment['derc'] ?></span>
                            </div>
                        </div>
                        <?php
                        if(isset($_SESSION['user'])):
                            $user = $_SESSION['user'];
                            if($user['id'] == $comment['user_id'] || $user['level'] == 3):
                        ?>
                                <span style="margin-left: 80px;">
                                    <input type="button" value="edit" class="edit" style="float: left;margin-left: 80px;"/>
                                    <form action="" method="post" id="delete_comment">
                                        <input type="hidden" name="comment_id" value="<?= $comment['id']; ?>"/>
                                        <input type="submit" name="btmDeleteCmt" value="delete" />
                                    </form>
                                <form action="" method="post">
                                    <table style="width: 90%; display: none;" class="form_edit_commnent">
                                        <tr>
                                            <td>
                                                <textarea type="text" name="content_edit" placeholder="comment" required="required" style="height: 70px;width: 300px;margin-left: 80px;margin-top: 10px;"><?= $comment['derc'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="hidden" name="comment_id" value="<?= $comment['id']; ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="hidden" name="user" value="<?= $comment['user_id']; ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="submit" name="btmEditCmt" value="Edit" style="margin-top: 10px;margin-left: 80px;" class="Edit"/>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                        <?php
                            endif;
                        endif;
                        ?>
                    </div>
                </div>
        <?php
            endforeach;
        ?>
    </div>

<?php
}
?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.button_comment').click(function () {
            jQuery('.table_commnent').show();
            jQuery('.button_comment').hide();
        });
        jQuery('.edit').click(function () {
            jQuery('.form_edit_commnent').show();
        });
        jQuery('.delete').click(function () {
            if(confirm("Bạn có muốn xóa comment của mình")){
                jQuery('.delete_comment').submit();
                jQuery('.delete_comment').submit();
            }
        });
    });
</script>
<?php
require_once 'layout/footer.php';
