<?

namespace App\Models;

use App\Services\SQLconn;
/**
* 
*/
class Cart
{
    public static function checkin($isbn)
    {
        if (isset($_SESSION['cart']['booklist'][$isbn])){
            return ture;
        }else return false;
    }

    public static function AddBook($isbn,$count = 1)
    {
        if(isset($_SESSION['cart'])){
            $items = $_SESSION['cart'];
        }
        if(isset($items['booklist'][$isbn])){
            $items['booklist'][$isbn]['count'] += $count;
        }else{
            $items['booklist'][$isbn]['count'] = $count;
        }
        isset($items['sum']) ? $items['sum'] += $count : $items['sum']=$count ;
        $_SESSION['cart']=$items;
    }

    public static function resetSession($items){
            $newItems = [];
            $newItems['sum'] = 0;
            foreach ($items as $value) {
                if($value[1] != 0){
                    $newItems['booklist'][$value[0]]['count'] = $value[1];
                    $newItems['sum'] += $value[1];
                }
            }
            unset($_SESSION['cart']);
            $_SESSION['cart'] = $newItems;
    }

    public static function DelBook($isbn,$count = 1)
    {
        if(!isset($_SESSION['cart'])){
            return "unset cart";
        }else {
            $items = $_SESSION['cart'];
            if(empty($items)){
                return "empty cart";
            }else if(!isset($items['booklist'][$isbn])){
                return "this book isn't in cart";
            }else{
                if($count<$items['booklist'][$isbn]['count']){
                $items['booklist'][$isbn]['count'] -= $count;
                $items['sum'] -= $count;
                }else{
                $items['sum'] -= $items['booklist'][$isbn]['count'];  
                unset($items['booklist'][$isbn]);
                }
                $_SESSION['cart'] = $items;
                return "success";
            }
        } 
    }

    public static function getOrderId($time){
        $conn = new SQLconn;
        $info = $conn->query("SELECT Orderid FROM `order` WHERE Time='".$time."'");
        return $info[0]['Orderid'];
    }

    public static function sureBuy()
    {
        $conn = new SQLconn;
        if(!$_SESSION['cart']['booklist']){
            return 0;
        }else {
            $data = $_SESSION['cart']['booklist'];
            $prices = 0;
            foreach ($data as $key => $value){
                $info = $conn->query("SELECT price FROM books WHERE isbn='".$key."'");
                $data[$key]['price'] = $info[0]['price'];
            }
            foreach ($data as $value) {
            $prices += ($value['price'] * $value['count']);
            }

            $t = time();
            $result = $conn->query("insert into `order` (Uid, TotalPrices, Time, State) values(\"".$_SESSION['user']['uid']."\",\"".$prices."\",\"".$t."\",\"0\");");
            if(!$result) return 1;
            $orderid = self::getOrderId($t);

            foreach($data as $key => $values){
                $result2 = $conn->query("insert into `order_item` (Orderid, isbn, price, count) values(\"".$orderid."\",\"".$key."\",\"".$values['price']."\",\"".$values['count']."\");");
            }
            return 0;
        }
    }


}