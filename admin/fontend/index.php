<?php
session_start();
require_once '../lib/Database.php';
$db=new Database();
include_once 'layout/header.php';
$results = $db->getAllCategories();
?>
    <div id="main_content">

<?php
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $user_id = $user['id'];
    $level = $user['level'];
    if($level == 3){
        foreach ($results as $result):
            ?>
            <div class="box_content">
                <div class="box_title">
                    <div class="title_icon"><img src="assets/images/mini_icon2.gif" alt="" title="" /></div>
                    <h2><?= $result['name'] ?></h2>
                    <a href="http://localhost/antoanpm/admin/fontend/list-post-by-category.php?cate_id=<?= $result['id'] ?>" class="view-all">view all</a>
                </div>
                <?php
                $posts = $db->getPostByCategoryId($result['id']);
                $i = 0;
                foreach ($posts as $post):
                    ?>
                    <div class="box_text_content"> <img src="assets/images/checked.gif" alt="" title="" class="box_icon" />
                        <div class="box_text">
                            <b><?= $post['title'] ?></b>
                            <?= substr($post['content'],0,100); ?>...
                        </div>
                        <a href="http://localhost/antoanpm/admin/fontend/single-post.php?post_id=<?= $post['id'];?>&user_id=<?= $post['user_id'];?>" class="details">+ details</a>
                    </div>
                    <?php
                    $i++;
                    if($i == 5){
                        break;
                    }
                endforeach;
                ?>
            </div>
            <?php
        endforeach;
    }else{
        foreach ($results as $result):
            ?>
            <div class="box_content">
                <div class="box_title">
                    <div class="title_icon"><img src="assets/images/mini_icon2.gif" alt="" title="" /></div>
                    <h2><?= $result['name'] ?></h2>
                    <a href="http://localhost/antoanpm/admin/fontend/list-post-by-category.php?cate_id=<?= $result['id'] ?>" class="view-all">view all</a>
                </div>
                <?php
                $posts = $db->getPostsByCategoryIdForUser($result['id'], $user_id);
                $i = 0;
                foreach ($posts as $post):
                    ?>
                    <div class="box_text_content"> <img src="assets/images/checked.gif" alt="" title="" class="box_icon" />
                        <div class="box_text">
                            <b><?= $post['title'] ?></b>
                            <?= substr($post['content'],0,100); ?>...
                        </div>
                        <a href="http://localhost/antoanpm/admin/fontend/single-post.php?post_id=<?= $post['id'];?>&user_id=<?= $post['user_id'];?>" class="details">+ details</a>
                    </div>
                    <?php
                    $i++;
                    if($i == 5){
                        break;
                    }
                endforeach;
                ?>
            </div>
            <?php
        endforeach;
    }
}else{
    foreach ($results as $result):
        ?>
        <div class="box_content">
            <div class="box_title">
                <div class="title_icon"><img src="assets/images/mini_icon2.gif" alt="" title="" /></div>
                <h2><?= $result['name'] ?></h2>
                <a href="http://localhost/antoanpm/admin/fontend/list-post-by-category.php?cate_id=<?= $result['id'] ?>" class="view-all">view all</a>
            </div>
            <?php
            $posts = $db->getPostsByCategoryIdForGuest($result['id']);
            $i = 0;
            foreach ($posts as $post):
                ?>
                <div class="box_text_content"> <img src="assets/images/checked.gif" alt="" title="" class="box_icon" />
                    <div class="box_text">
                        <b><?= $post['title'] ?></b>
                        <?= substr($post['content'],0,100); ?>...
                    </div>
                    <a href="http://localhost/antoanpm/admin/fontend/single-post.php?post_id=<?= $post['id'];?>&user_id=<?= $post['user_id'];?>" class="details">+ details</a>
                </div>
                <?php
                $i++;
                if($i == 5){
                    break;
                }
            endforeach;
            ?>
        </div>
        <?php
    endforeach;

}?>
        <div class="clear"></div>
    </div>
<?php
require_once 'layout/footer.php';
