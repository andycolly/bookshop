<?
namespace App\Services;


class Test
{
    
    function __construct()
    {

    }

    function show($var = null)
    {
        if(empty($var)){
            echo 'null';
        }elseif (is_array($var)||is_object($var)) {
            //array,object
            echo '<pre>';
            print_r($var);
            echo '</pre>';
        }else{
            //string,int,float...
            echo $var;
        }
    }
}