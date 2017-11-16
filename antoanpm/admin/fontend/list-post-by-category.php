<?php
session_start();
require_once '../lib/Database.php';
$db=new Database();
include_once 'layout/header.php';
if(isset($_GET['cate_id'])){
    $category_id = $_GET['cate_id'];
    $posts = $db->getPostByCategoryId($category_id);
}
?>
    <div id="main_content">
        <h1 align="center" style="margin: 5px 0px">
            <?php
                $category = $db->getCategoriesById($category_id);
                echo $category['name'];
            ?>
        </h1>
        <table class="manager-post">
            <tr>
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Tác giả</th>
                <th>Xem chi tiết</th>
            </tr>
        <?php $i=1; foreach ($posts as $post): ?>
            <tr>
                <td>
                    <?= $i; ?>
                </td>
                <td>
                    <?= $post['title'] ?>
                </td>
                <td>
                    <?= substr($post['content'],0,200); ?>
                </td>
                <td>
                    <?php
                    $user = $db->getUserById($user_id);
                    if(!empty($user)){
                        echo "<b>".$user['name']."</b>";
                    }
                    ?>
                </td>
                <td>
                    <a href="http://localhost/antoanpm/admin/fontend/single-post.php?post_id=<?= $post['id'];?>&user_id=<?= $post['user_id'];?>" class="details">details</a>
                </td>
            </tr>
        <?php $i++; endforeach;?>
        </table>
    </div>


<?php
require_once 'layout/footer.php';
