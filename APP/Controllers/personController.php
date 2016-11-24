<?
namespace App\Controllers;

use App\Controllers\baseController;
use App\Models\User;
use App\Models\Order;

class personController extends baseController
{
    public function index(){
        $user = new User($_SESSION['user']['username']);
        $user->getPersonInfo();
        $userinfo = $user->getinfo();
        $order = new Order($_SESSION['user']['uid']);
        $order->getDBOrderList();
        $orderinfo = $order->getOrderinfoList();
        require ("../App/Views/person.php");
    }

    public function updata(){
        if(!isset($_POST)&&empty($_POST)) exit('请输入数据');
        $user = new User($_SESSION['user']['username']);
        $user ->updata($_POST['Address'],$_POST['Phone']);
        exit('保存成功');
    }

    public function setpassword(){
        if(!isset($_POST)||empty($_POST)) exit('传送数据不能为空');
        $password=$_POST['password'];
        $newPassword=$_POST['newPassword'];

        $user = new User($_SESSION['user']['username']);
        if(!$user->checkPassword($password)) exit('原密码错误');
        $user->setpassword($newPassword); exit('成功');
    }
}