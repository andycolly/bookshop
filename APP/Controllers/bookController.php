<?

namespace App\Controllers;

use App\Controllers\baseController;
use App\Models\Book;


class bookController extends baseController{
    public function index()
    {
       echo "<script>location.href = \"/category\"</script>";
    }

    public function info()
    {
        $isbn =$_GET['isbn'];
        if($book = new Book($isbn)){
            $bookinfo = $book->getinfo();
            require ("../App/Views/book.php");
        }else{
            header("HTTP/1.1 404 Not Found");
            exit('找不到该书');
        }
    }
    
}