<?
namespace App\Controllers;
use App\Controllers\baseController;

class indexController extends baseController
{
    public function index() 
    {
        require ("../App/Views/Categories.php");
    }
}