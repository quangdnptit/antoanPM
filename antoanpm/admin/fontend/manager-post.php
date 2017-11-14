<?php
session_start();
if(isset($_SESSION['user'])){
    require_once '../lib/Database.php';
    $db=new Database();
    include_once 'layout/header.php';
    $user = $_SESSION['user'];
    $user_id = $user['id'];
    $results = $db->getPostByUserid($user_id);
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
        <?php foreach ($results as $result):?>
            <tr>
                <td><?= $result['id'] ?></td>
                <td><?= $result['title'] ?></td>
                <td>
                    <?php
                    $category = $db->getCategoriesById($result['category_id']);
                    echo $category['name'];
                    ?>
                </td>
                <td>
                    <?= substr($result['content'],0,100); ?>
                </td>
                <td>
                    <?= $result['status']=1?'Open':'Close' ?>
                </td>
                <td>
                    <a href="#">Edit</a>
                </td>
                <td>
                    <a href="#">Delete</a>
                </td>
            </tr>
        <?php endforeach;?>
        </table>
    </div>
<?php
    require_once 'layout/footer.php';
}else{
    echo "<script type='text/javascript'>alert('Bạn phải đăng nhập để có thể truy cập trang này!');</script>";
    header('Location: http://localhost/antoanpm/admin/fontend/index.php');
}
