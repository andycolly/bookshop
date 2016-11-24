<?

namespace App\Controllers;

class baseController
{

    function __construct()
    {
        session_start();
    }

    function __destruct()
    {

    }
}