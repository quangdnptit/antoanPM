<?php
session_start();
if(isset($_SESSION['user'])){
    require_once '../lib/Database.php';
    $db=new Database();
    include_once 'layout/header.php';
    $user = $_SESSION['user'];
    $user_id = $user['id'];
    $categories = $db->getAllCategoriesByUserId($user_id);
?>
    <div id="main_content">
        <h1 align="center" style="margin: 5px 0px">Manager your post</h1>
        <table class="manager-post">
            <tr>
                <th> ID </th>
                <th> Tiêu đề </th>
                <th> Category </th>
                <th> Nội dung </th>
                <th> Status </th>
                <th colspan="2">

                </th>
            </tr>
<?php
    foreach ($categories as $category):
        $posts = $db->getPostByCategoryId($category['id']);
        foreach ($posts as $post):
    ?>
            <tr>
                <td><?= $post['id'] ?></td>
                <td><?= $post['title'] ?></td>
                <td>
                    <?php
                        $cate = $db->getCategoriesById($post['category_id']);
                        echo $cate['name'];
                    ?>
                </td>
                <td><?= substr($post['content'],0,100); ?></td>
                <td><?= $post['status']==1?'Open':'Close' ?></td>
                <td><?= $post['id'] ?></td>
                <td>
                    <a href="http://localhost/antoanpm/admin/fontend/edit-post.php?action=edit&post_id=<?= $post['id']; ?>&author_id=<?= $post['user_id']; ?>">Edit</a>
                </td>
                <td>
                    <a href="http://localhost/antoanpm/admin/fontend/edit-post.php?action=delete&post_id=<?= $post['id']; ?>&author_id=<?= $post['user_id']; ?>">Delete</a>
                </td>
            </tr>
    <?php
        endforeach;
    endforeach;
    ?>
        </table>
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
