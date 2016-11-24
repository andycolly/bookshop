<?

namespace App\Models;

use App\Services\SQLconn;

/**
* 
*/
class Category 
{
    public static $info;
    public static $count;

    public static function updata()
    {
        $conn = new SQLconn;
        $data = $conn->query("SELECT * FROM categories");
        self::$info = $data;
        self::$count = count($data);
    }

    public static function get()
    {
        return self::$info;
    }
}