<?php
session_start();
require_once '../lib/Database.php';
$db=new Database();
include_once 'layout/header.php';
$post_id = $_GET['post_id'];
$user_id = $_GET['user_id'];
$post = $db->getPostById($post_id);
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
    </div>
<?php
}
?>


<?php
require_once 'layout/footer.php';
