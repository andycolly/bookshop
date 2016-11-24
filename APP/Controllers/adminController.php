<?
namespace App\Controllers;

use App\Controllers\baseController;
use App\Models\User;
use App\Services\SQLconn; 
use App\Models\Admin;
use App\Models\Book;

class adminController extends baseController
{
    public function index(){
        if($_SESSION['user']['authority']!="1") exit('你不是个老司机');
        $admin          = new Admin;
        $userinfo       = $admin->getUserInfo();
        $bookinfo       = $admin->getBookInfo();
        $categoryinfo   = $admin->getCategoryInfo();
        $orderinfo      = $admin->getOrderInfo();
        require("../App/Views/admin.php");
    }

    public function updateUserInfo(){
        if($_SESSION['user']['authority']!="1") exit('你不是个老司机');
        if(!isset($_POST)||empty($_POST)) exit('传送数据不能为空');
        $username = $_POST['username'];
        $password = $_POST['password'];
        $address  = $_POST['address'];
        $phone    = $_POST['phone'];
        $user = new User($username);
        $user ->updata($address,$phone);
        $user ->setpassword($password);
        exit('成功');
    }

    public function updateCategroyinfo(){
        if($_SESSION['user']['authority']!="1") exit('你不是个老司机');
        if(!isset($_POST)||empty($_POST)) exit('传送数据不能为空');
        $catid     = $_POST['catid'];
        $catname   = $_POST['catname'];
        $caticon   = $_POST['caticon'];
        $iconcolor = $_POST['iconcolor'];
        $conn = new SQLconn;
        $conn ->query("update categories set catname = \"".$catname."\",caticon = \"".$caticon ."\",iconcolor = \"".$iconcolor."\" where catid = \"".$catid."\"");
        exit('成功');
    }

    public function updateBooksInfo(){
        if($_SESSION['user']['authority']!="1") exit('你不是个老司机');
        if(!isset($_POST)||empty($_POST)) exit('传送数据不能为空');
        $isbn        = $_POST['isbn'];
        $catid       = $_POST['catid'];
        $price       = $_POST['price'];
        $description = $_POST['description'];
        $cover       = $_POST['cover'];

        $book = new Book($isbn,"update");
        $book->updateDBbooks($catid,$price,$description,$cover);
        exit('成功');
    }

    public function updateOrderInfo(){
        if($_SESSION['user']['authority']!="1") exit('你不是个老司机');
        if(!isset($_POST)||empty($_POST)) exit('传送数据不能为空');
        $orderid     = $_POST['orderid'];
        $state       = $_POST['state'];
        $conn = new SQLconn;
        $result = $conn ->query("update `order` set State = \"".$state."\" where Orderid = \"".$orderid."\"");
        exit('成功');
    }


    public function addBookInfo()
    {
        if(!isset($_POST)||empty($_POST)) exit('传送数据不能为空');
        $isbn           = $_POST["isbn"];
        $title          = $_POST["title"];
        $author         = $_POST["author"];
        $catid          = $_POST["catid"];
        $price          = $_POST["price"];
        $description    = $_POST["description"];
        $cover          = $_POST["cover"];
        if(empty($isbn)||empty($title)||empty($author)||empty($catid)||empty($price)||empty($description)||empty($cover)) exit('不能有某项为空');
        $conn = new SQLconn;
        $result = $conn->query("insert into books(isbn,title,author,catid,price,description,cover) values(\"".$isbn."\",\"".$title."\",\"".$author."\",\"".$catid."\",\"".$price."\",\"".$description."\",\"".$cover."\");");
        exit('成功');
    }

    public function delBookInfo()
    {
        if(!isset($_POST)||empty($_POST)) exit('传送数据不能为空');
        $isbn = $_POST["isbn"];
        $conn = new SQLconn;

        if($result = $conn->query("delete from books where isbn = \"".$isbn."\""))
        exit('成功');
        
    }
}