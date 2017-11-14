<?php
session_start();
require_once '../lib/Database.php';
$db=new Database();
include_once 'layout/header.php';
$post_id = $_GET['post_id'];
$post = $db->getPostById($post_id);
if(!empty($post)){
?>
    <div id="main_content">
        <h1><?= $post['title'] ?></h1>
        <div>
            
        </div>
    </div>
<?php
}
?>


<?php
require_once 'layout/footer.php';
