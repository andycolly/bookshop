<?
namespace App\Models;

use App\Services\SQLconn;
use App\Models\Category;

/**
* 
*/
class Bookslist
{
    public $type;
    public $typename;
    public $list;

    function __construct($type)
    {
        $conn = new SQLconn;
        $info = $conn->query("SELECT * FROM books WHERE catid='".$type."'");
        $this->list = $info;
        $this->gettypename($type);
    }

    private function gettypename($type)
    {
        if(empty(Category::$info)){
            Category::updata();
            $Categories=Category::get();
        }else{
            $Categories=Category::$info;
        }
        if($type!="all"){
            $this->typename=Category::$info[$type-1]['catname'];
        }else{
            $this->getAllBook();
        }
    }

    public function get($type)
    {
        return $this->list;
    }

    public function getAllBook()
    {
        $this ->typename = "全部都学";
        $conn = new SQLconn;
        $info = $conn->query("SELECT * FROM books");
        $this ->list = $info;
    }
}