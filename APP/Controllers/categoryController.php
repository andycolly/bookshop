<?
namespace App\Controllers;

use App\Controllers\baseController;
use App\Models\Category;
use App\Models\Bookslist;

class categoryController extends baseController
{
    public function index()
    {
        if(empty(Category::$info)){
            Category::updata();
            $Categories=Category::get();
        }else{
            $Categories=Category::$info;
        }
        require ("../App/Views/Categories.php");
    }

    public function booklist(){
        $type=$_GET['type'];
        unset($bookslist);
        $bookslist = new Bookslist($type);
        require("../APP/Views/bookslist.php");
    }
}
