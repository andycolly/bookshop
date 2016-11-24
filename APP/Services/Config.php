<?

namespace App\Services;

/**
* 
*/
class Config 
{
    public static $configs;

    public static function get($key)
    {
        $config = require("../config.php");

        self::$configs[$key]=$config[$key];

        return $config[$key];
    }
}

