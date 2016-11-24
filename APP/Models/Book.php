<?

namespace App\Models;

use App\Services\SQLconn;

/**
* 
*/
class Book 
{
    private $info;
    private $isbn;

    public function __construct($isbn,$mode = "0")
    {
        if($mode == "0"){
            $conn = new SQLconn;
            $check = $conn->query("SELECT COUNT(*) FROM books WHERE isbn='".$isbn."'");
            if($check[0]["COUNT(*)"]){
                $info = $conn->query("SELECT * FROM books WHERE isbn='".$isbn."'");
                $this->info['isbn']        = $info[0]["isbn"];
                $this->info['title']       = $info[0]["title"];
                $this->info['catid']       = $info[0]["catid"];
                $this->info['price']       = $info[0]["price"];
                $this->info['author']      = $info[0]["author"];
                $this->info['description'] = $info[0]["description"];
                $this->info['cover']       = $info[0]["cover"];
                $this->getCatName();
                return true;
            } 
            else{
                return false;
            }
        }else if($mode == "update"){
            $this->isbn = $isbn; return 2;
        }       
    }

    public function getinfo()
    {
        return $this->info;
    }

    public function getCatName(){
        $conn = new SQLconn;
        $info = $conn->query("SELECT catname FROM categories WHERE catid='".$this->info['catid']."'");
        $this->info['catname'] = $info[0]['catname'];
    }

    public function updateDBbooks($catid,$price,$description,$cover){
        $conn = new SQLconn;
        $result = $conn ->query("update books set catid = \"".$catid."\",price = \"".$price ."\",description = \"".$description."\",cover = \"".$cover."\" where isbn = \"".$this->isbn."\"");
        return $result;
    }
}