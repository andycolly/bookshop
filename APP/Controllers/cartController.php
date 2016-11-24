<?
namespace App\Controllers;

use App\Controllers\baseController;
use App\Models\Cart;

class cartController extends baseController
{
    public function index()
    {
        if(!isset($_SESSION['user'])||empty($_SESSION['user'])){
            echo "<script>alert(\"请先登陆\");location.href = \"/login/loginPage\";</script>";
        }else require("../App/Views/Cart.php");
    }

    public function addToCart()
    {
        if(!isset($_POST)||empty($_POST)){
             header("HTTP/1.1 404 Not Found");
             echo "isbn !isset or empty";
        }else{
            $isbn = $_POST['isbn'];
            Cart::AddBook($isbn);
            echo "the book has added to cart";
        }
    }

    public function cartFunction()
    {
        $items = $_POST['Arr'];
        if(!isset($_POST['handletype'])||empty($_POST['handletype'])) exit('请设置处理类型');
        $handletype = $_POST['handletype'];
        if(!empty($items)){
            Cart::resetSession($items);
        }
        if($handletype=="save"){
            exit('保存购物列表成功');
        }else if($handletype=="sure"){
            $res = cart::surebuy();
            switch($res){
            case 0:exit('成功提交订单');
            case 1:exit('提交订单失败');
            default:exit('未知错误');
            }
        }
    }
}