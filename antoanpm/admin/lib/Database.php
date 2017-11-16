

<?php

/**
 * 
 */
class Database {

    /**
     * Khai báo biến kết nối
     * @var [type]
     */
    public $link;

    public function __construct() {
        $this->link = mysqli_connect("localhost", "root", "root", "antoanphanmem");
        mysqli_set_charset($this->link, "utf8");
    }

    public function fetchID($table, $id) {
        $sql = "rSELECT * FROM {$table} WHERE id = $id ";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchID " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }

    public function fetchAll($table) {
        $sql = "SELECT * FROM " . $table;
        $result = mysqli_query($this->link, $sql) or die("Lỗi Truy Vấn fetchAll " . mysqli_error($this->link));
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }
    
       public function fetchMod() {
        $sql = "SELECT * FROM  user where level >2" ;
        $result = mysqli_query($this->link, $sql) or die("Lỗi Truy Vấn fetchAll " . mysqli_error($this->link));
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    /* tu viet */ /* categories */

    public function usequery($command) {//ham use querry nhanh
        if (!empty($command)) {
            $rs = mysqli_query($this->link, $command);
        }
        return $rs;
    }

    public function insertcate($data = null) {
        $sql = "insert into category(name) values ('" . $data['cate_name'] . "')";

        $this->usequery($sql);
        return false;
    }

    public function deletecate($id) {
        $sql = "delete from category WHERE id= $id";
        $this->usequery($sql);
    }

    public function updateCate($data, $id) {//truyen them id vao,vi data posst len k co id
        $query = "update category set name='" . $data["cate_name"] . "' where id='" . $id . "'";
        $this->usequery($query);
    }

    public function addproduct($data, $thunbarname) {
        $sql = "INSERT INTO `product`(`name`, `price`, `sale`,`thunbar`,`cpu`,`ram`,`hdd`,`hdh`, `vga`, `category_id`, `content`, `number`) VALUES
      ('" . $data['name'] . "','" . $data['price'] . "','" . $data['sale'] .
                "','" . $thunbarname . "','" . $data['cpu'] . "','" . $data['ram'] . "','" . $data['hdd'] . "','" . $data['hdh'] . "','" . $data['vga'] . "','" . $data['category_id'] . "','" . $data['content'] . "','" . $data['Soluong'] . "')";
        $this->usequery($sql);
    }

    public function deleteproduct($id) {
        $sql = "delete from product WHERE id= $id";
        $this->usequery($sql);
    }

    public function updateProduct($data, $thunbarname, $id) {
        $query = "update product set name='" . $data["name"] . "',price='" . $data["price"] . "',sale='" . $data["sale"] . "',thunbar='" . $thunbarname . "',category_id='" . $data["category_id"] . "',content='" . $data["content"] . "',number='" . $data["Soluong"] . "' where id='" . $id . "'";
        $this->usequery($query);
    }

    public function addAdmin($data) {
        $sql = "INSERT INTO `admin`(`name`, `address`, `email`, `password`, `phone`, `level`) VALUES
        ('" . $data['name'] . "','" . $data['diachi'] . "','" . $data['email'] . "','" . $data['pass'] . "','" . $data['tel'] . "','" . $data['level'] . "')";
        $this->usequery($sql);
    }

    public function deleteAdmin($id) {
        $sql = "delete from admin WHERE id=$id";
        $this->usequery($sql);
    }

    public function updateAdmin($data, $id) {
        $sql = "UPDATE `admin` SET `name`='" . $data['name'] . "',`address`='" . $data['diachi'] . "',`email`='" . $data['email'] . "',`password`='" . $data['pass'] . "',`phone`='" . $data['tel'] . "',`level`='" . $data['level'] . "' WHERE id= $id";
        $this->usequery($sql);
    }

    public function fetchProductByCate($id) {
        $sql = "SELECT * FROM product WHERE category_id = $id";
        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function fetchCateDisplay() {
        $sql = "SELECT * FROM category WHERE display =0";
        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function CountProductbyId($id) {
        $sql = "SELECT COUNT(*) AS so_luong from product WHERE category_id=$id";
        $result = $this->usequery($sql);
        $data = mysqli_fetch_assoc($result);

        return $data;
    }

    public function Phantrang($batdau, $Sp1trang, $id) {
        $sql = "SELECT *FROM product  WHERE category_id=$id LIMIT $batdau, $Sp1trang";
        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function countAllbyCate($id) {
        $sql = "SELECT COUNT(*) AS so_luong from product where category_id =$id";
        $result = $this->usequery($sql);
        $data = mysqli_fetch_assoc($result);

        return $data;
    }

    public function sortDESC($id) {
        $sql = "select *from product where category_id=$id  ORDER by price DESC";
        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function sortASC($id) {
        $sql = "select *from product where category_id=$id ORDER by price ASC";
        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function GetNameByCateId($id) {
        $sql = "select name from category where id=$id";
        $result = $this->usequery($sql);
        $data = mysqli_fetch_assoc($result);

        return $data;
    }

    public function fetchProductHot() {
        $sql = "SELECT *FROM product WHERE hot='1' ORDER BY updated_at LIMIT 0,2";
        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function fetchProductSlider($id) {
        $sql = "SELECT *FROM product WHERE category_id=$id AND slide='1' ORDER BY updated_at LIMIT 0,4";
        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    function countCateDisplay() {
        $sql = "SELECT COUNT(*) AS n_cate_display from category WHERE display=0";
        $result = $this->usequery($sql);
        $data = mysqli_fetch_assoc($result);

        return $data;
    }

    public function cateNameById($id) {
        $sql = "select * from category where id=$id";
        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function GetThongBao() {
        $sql = "SELECT * from thongbao";
        $result = $this->usequery($sql);
        $data = mysqli_fetch_assoc($result);

        return $data;
    }

    public function delThongBao() {
        $sql = "delete thongbao from thongbao";
        $this->usequery($sql);
    }

    public function AddThongBao($data) {
        $sql = "INSERT INTO `thongbao`(`thongbao`)VALUES ('" . $data['name'] . "')";
        $this->usequery($sql);
    }

//mo dau file search
//endfile
    public function searchByName($key) {

        $sql = "select *from product where name like '%$key%' ";

        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function countAllbyName($key) {
        $sql = "SELECT COUNT(*) AS so_luong from product where name like '%$key%'";
        $result = $this->usequery($sql);
        $data = mysqli_fetch_assoc($result);

        return $data;
    }

    public function GetProductByPrice($dau, $cuoi) {

        $sql = "select *from product where price between $dau AND $cuoi ";

        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function CountProductbyPrice($dau, $cuoi) {

        $sql = "SELECT COUNT(*) AS so_luong from product WHERE price between $dau AND $cuoi";
        $result = $this->usequery($sql);
        $data = mysqli_fetch_assoc($result);

        return $data;
    }

    public function PhanTrangByPrice($batdau, $Sp1trang, $a, $b) {
        $sql = "SELECT *FROM product  WHERE price between $a AND $b LIMIT $batdau, $Sp1trang";
        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function sort_SearchASC($key) {
        $sql = "select *from product where name like '%$key%' ORDER by price ASC";
        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function sort_SearchDESC($key) {
        $sql = "select *from product where name like '%$key%' ORDER by price DESC";
        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function sort_andPhanTrangDESC($dau, $cuoi) {
        $sql = "select *from product ORDER by price DESC LIMIT $dau,$cuoi";

        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function sort_andPhanTrangASC($dau, $cuoi) {
        $sql = "select *from product ORDER by price ASC LIMIT $dau,$cuoi";

        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function CountProductbyPriceAndCate($dau, $cuoi, $id) {

        $sql = "SELECT COUNT(*) AS so_luong from product WHERE category_id= $id AND price between $dau AND $cuoi";
        $result = $this->usequery($sql);
        $data = mysqli_fetch_assoc($result);

        return $data;
    }

    public function GetProductByPriceAndCate($dau, $cuoi, $id) {

        $sql = "select *from product where category_id =$id AND price between $dau AND $cuoi ";

        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function PhanTrangByPriceAndCate($batdau, $Sp1trang, $a, $b, $id) {
        $sql = "SELECT *FROM product  WHERE category_id=$id AND price between $a AND $b LIMIT $batdau, $Sp1trang";
        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function PhanTrangByKey($batdau, $Sp1trang, $key) {
        $sql = "SELECT *FROM product  WHERE name like '%$key%' LIMIT $batdau, $Sp1trang";
        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function fectchProductByCateDisplay($id) {

        $sql = "select *from product where category_id =$id ";

        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function addUser($data) {
        $sql = "INSERT INTO `users`(`name`, `email`, `phone`,  `address`,`password`,`status`) VALUES
        ('" . $data['name'] . "','" . $data['email'] . "','" . $data['sdt'] . "','" . $data['address'] . "','" . $data['pass'] . "',0)";
        $this->usequery($sql);
    }

    public function Login($data) {
        $sql = "select *  from users where name='" . $data['name'] . "' AND password='" . $data['pass'] . "'";
        $result = $this->usequery($sql);
        $data1 = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data1[] = $num;
            }
        }
        return $data1;
    }

    public function insertTrans($data) {
        $sql = "INSERT INTO `transaction`( `amount`, `users_id`,`note`,`address`, `updated_at`) VALUES ('" . $data['amount'] . "','" . $data['users_id'] . "','" . $data['note'] . "','" . $data['address'] . "','0')";
        $this->usequery($sql);
    }

    public function returnId_trans($data) {
        $sql = "select id from transaction where amount= '" . $data['amount'] . "' AND users_id = '" . $data['users_id'] . "' AND note = '" . $data['note'] . "' AND address = '" . $data['address'] . "' ";
        $result = $this->usequery($sql);
        $id = mysqli_fetch_assoc($result);

        return $id;
    }

    public function insertOrder($data) {
        $sql = "INSERT INTO `orders`(`transaction_id`, `product_id`, `qty`, `price`, `updated_at`) VALUES ('" . $data['transaction_id'] . "','" . $data['product_id'] . "','" . $data['qty'] . "','" . $data['price'] . "','0')";
        $this->usequery($sql);
    }

    public function fetchAllDESC($table) {
        $sql = "SELECT *FROM $table  ORDER BY id DESC";
        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function selectByID($table, $id) {
        $sql = "SELECT * from $table where id =$id";
        $result = $this->usequery($sql);
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

        public function LoginAdmin($data) {
        $sql = "select *  from admin where username='" . $data['name'] . "' AND password='" . $data['pass'] . "'";
        $result = $this->usequery($sql);
        $data1 = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data1[] = $num;
            }
        }
        return $data1;
    }
    public function updateView($id,$view){
            $query = "update product set view=$view where id=$id";
            $this->usequery($query);

    }
///////////////////////////////////code của tao///////////////////////////////////
    public function checkLogin($user,$pass){
        $query = "SELECT * FROM user WHERE username='" .$user. "' AND password='".$pass."'";
        $result = $this->usequery($query);
        $data1 = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data1[] = $num;
            }
        }
        return $data1;
    }
    public function getAllCategories(){
        $query = "SELECT * FROM category";
        $result = $this->usequery($query);
        $data1 = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data1[] = $num;
            }
        }
        return $data1;
    }
    public function getCategoriesById($id){
        $query = "SELECT * FROM category WHERE id = $id";
        $result = $this->usequery($query);
        $data1 = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data1 = $num;
            }
        }
        return $data1;
    }
    public function getAllCategoriesByUserId($user_id){
        $query = "SELECT * FROM category WHERE user_id = $user_id";
        $result = $this->usequery($query);
        $data1 = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data1[] = $num;
            }
        }
        return $data1;
    }
    public function createPost($data){
        $sql = "INSERT INTO `post`(`user_id`, `category_id`, `title`, `content`, `status`) VALUES ('" . $data['user_id'] . "','" . $data['category_id'] . "','" . $data['title'] . "','" . $data['content'] . "','1')";
        if($this->usequery($sql)){
            return true;
        }else{
            return false;
        }
    }
    public function getPostByUserid($user_id){
        $sql = "SELECT * FROM post WHERE user_id = $user_id";
        $result = $this->usequery($sql);
        $data1 = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data1[] = $num;
            }
        }
        return $data1;
    }
    public function getPostByCategoryId($category_id){
        $query = "SELECT * FROM `post` WHERE `category_id` = $category_id";
        $result = $this->usequery($query);
        $data1 = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data1[] = $num;
            }
        }
        return $data1;
    }
    public function getPostById($id){
        $query = "SELECT * FROM `post` WHERE `id` = $id";
        $result = $this->usequery($query);
        $data1 = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data1 = $num;
            }
        }
        return $data1;
    }
    public function getPostByPaUid($post_id, $user_id){
        $query = "SELECT * FROM `post` WHERE `id` = $post_id AND `user_id` = $user_id";
        $result = $this->usequery($query);
        $data1 = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data1 = $num;
            }
        }
        return $data1;
    }
    public function getUserById($use_id){
        $query = "SELECT * FROM `user` WHERE `id` = $use_id";
        $result = $this->usequery($query);
        $data1 = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data1 = $num;
            }
        }
        return $data1;
    }
    public function createComment($data){
        $sql = "INSERT INTO `comment`(`post_id`, `user_id`, `derc`) VALUES ('" . $data['post_id'] . "','" . $data['user_id'] . "','" . $data['derc'] . "')";
        if($this->usequery($sql)){
            return true;
        }else{
            return false;
        }
    }
    public function updateComment($data){
        $sql = "UPDATE `comment` SET `derc`='" . $data['derc'] . "' WHERE `id`= ".$data['id']."";
        if($this->usequery($sql)){
            return true;
        }else{
            return false;
        }
    }
    public function getAllCommentByPostId($post_id){
        $query = "SELECT * FROM `comment` WHERE `post_id` = $post_id";
        $result = $this->usequery($query);
        $data1 = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data1[] = $num;
            }
        }
        return $data1;
    }
    public function deleteComment($comment_id){
        $sql = "DELETE FROM `comment` WHERE id= $comment_id";
        if($this->usequery($sql)){
            return true;
        }else{
            return false;
        }
    }
    public function updatePost($data){
        $sql = "UPDATE `post` SET `category_id`='" . $data['category_id'] . "',`title`='" . $data['title'] . "',`content`='" . $data['content'] . "',`status`='" . $data['status']."' WHERE `id`= ".$data['id']." AND `user_id`='" . $data['user_id'] . "'";
        if($this->usequery($sql)){
            return true;
        }else{
            return false;
        }
    }
    public function deletePost($post_id){
        $sql = "DELETE FROM `post` WHERE id= $post_id";
        if($this->usequery($sql)){
            return true;
        }else{
            return false;
        }
    }
}

//end file
?>