<?

namespace App\Models;

use App\Services\SQLconn;
use App\Services\regexTool;

/**
* 
*/
class User 
{
    private $uid;
    private $username;
    private $password;
    private $info;
    private $authority; //该用户的权限

    function __construct($username){
        $this->username = $username;
    }

    public function checkPassword($password){
        $md5password = md5($password);
        $conn = new SQLconn;
        $check = $conn->query("SELECT COUNT(*) FROM users WHERE username='".$this->username."' AND password='".$md5password."'");
        if($check[0]["COUNT(*)"]){
            $this->getDBInfo($this->username);
            return true;
        } 
        else{
            return false;
        }
    }

    public function checkUsername($username)
    {
        $conn = new SQLconn;
        $check = $conn->query("SELECT COUNT(*) FROM users WHERE username='".$username."'");
        if($check[0]["COUNT(*)"]){
            return true;
        }else{
            return false;
        }
    }

    public function getPersonInfo(){
        $this->getDBInfo($this->username);
    }

    private function getDBInfo($username)
    {
        $conn = new SQLconn;
        $info = $conn->query("SELECT * FROM users WHERE username='".$username."'");
        $this->uid             = $info[0]["Uid"];
        $this->username        = $info[0]["username"];
        $this->password        = $info[0]["password"];
        $this->authority       = $info[0]["authority"];
        $this->info['address'] = $info[0]["address"];
        $this->info['phone']   = $info[0]['phone'];
    }

    public function getinfo()
    {
        return $this->info;
    }

    public function getuid()
    {
        return $this->uid;
    }

    public function getauthority()
    {
        return $this->authority;
    }

    public function register($password){
        $md5password = md5($password);

        if($this->checkUsername($this->username)){
            return 1;
        }else{
            $regex = new regexTool();
                if(!$regex->isUsername($this->username)){
                    return 2;
                }
                if(!$regex->isPassword($password)){
                    return 3;
                }
            $conn = new SQLconn;
            $result = $conn->query("insert into users(username, password) values(\"".$username."\",\"".$md5password."\");");
            if($result) return 0;
        }
    }

    public function updata($Address,$Phone)
    {
        $conn = new SQLconn;
        $result = $conn ->query("update users set address = \"".$Address."\",phone = \"".$Phone."\" where username = \"".$this->username."\"");
        return $result;
    }

    public function setpassword($password){
        $conn = new SQLconn;
        $md5password = md5($password);
        $result = $conn ->query("update users set password = \"".$md5password."\" where username = \"".$this->username."\"");
        return $result;
    }
}