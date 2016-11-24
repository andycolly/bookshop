<?

namespace App\Services;

use App\Services\Config;
use mysqli;
/**
* 
*/
class SQLconn 
{
    private $db;
    public $result;
    public $data;

    function __construct()
    {
        if(empty(Config::$configs['db'])){
            Config::get('db');
        }
        $host = Config::$configs['db']['HOST'];
        $username = Config::$configs['db']['USERNAME'];
        $password = Config::$configs['db']['PASSWORD'];
        $database = Config::$configs['db']['DATABASE'];

        $this->db = new mysqli($host,$username,$password,$database);
        if (mysqli_connect_errno()) {
         echo "Error: Could not connect to database.  Please try again later.";
         exit;
        }
        $this->db->query('set names utf8');
    }

    public function query($sql)
    {
        empty($this->result);
        @$this->result = $this->db->query($sql);
        if(empty($this->result))
        {
            return NULL;
        }elseif(is_array($this->result)||is_object($this->result)) {
            return $this->fetch($this->result);
        } else{
            return $this->result;
        }
    }

    private function fetch($res)
    {
        empty($this->data);
        $i = 0;
        while($r =  $res->fetch_assoc()){
            $this->data[$i] = $r;
            $i++;
        }
        return $this->data;
    }
}