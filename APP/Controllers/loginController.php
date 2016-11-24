<?
namespace App\Controllers;

use App\Controllers\baseController;
use App\Models\User;

class loginController extends baseController
{
    public function login()
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $user = new User($username);
        if($user->checkpassword($password)){
            $_SESSION['user']['username'] = $username;
            $_SESSION['user']['uid'] = $user->getuid();
            $_SESSION['user']['authority'] = $user->getauthority();
            if($_SESSION['user']['authority']== "1") exit('管理员登陆成功');
            exit('登陆成功');
        }else{
            unset($user);
            exit('用户名或者密码出错');  
        }
    }

    public function loginout(){
        session_destroy();
        echo "<script>location.href = \"/login/loginPage\";</script>";
    }

    public function loginPage(){
        require("../App/Views/login.php");
    }

    public function register(){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $user = new User($username);
        switch($user->register($password)){
            case 0: exit('注册成功');
            case 1: exit('用户名已存在');
            case 2: exit('用户名不合法');
            case 3: exit('密码不合法');
            default: exit('未知错误');
        }
    }
}