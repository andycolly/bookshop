<?

namespace App\Models;
use App\Services\SQLconn;

class Order
{
    private $uid;
    private $orderidlist;
    private $orderinfolist;

    function __construct($uid)
    {
        $this->uid = $uid;
    }

    public function getDBOrderList(){
        $conn = new SQLconn;
        $orderInfo = $conn->query("SELECT * FROM `order` WHERE Uid='".$this->uid."'");
        if(!empty($orderInfo)){
            foreach ($orderInfo as $key => $value) {
            $this->orderidlist[$key] = $value['Orderid'];
            $this->orderinfolist[$value['Orderid']]['Time'] = $value['Time'];
            $this->orderinfolist[$value['Orderid']]['State'] = $value['State'];
            $this->orderinfolist[$value['Orderid']]['TotalPrices'] = $value['TotalPrices'];
            }
            $this->getDBOrderinfo();
        }
        
    }

    public function getDBOrderinfo(){
        $conn = new SQLconn;
        foreach($this->orderidlist as $value){
            $orderItemInfo = $conn->query("SELECT * FROM `order_item` WHERE Orderid='".$value."'");
            if(!empty($orderItemInfo)){
                foreach ($orderItemInfo as $values) {
                $title =  $conn->query("SELECT title FROM books WHERE isbn='".$values['isbn']."'");
                $this->orderinfolist[$values['Orderid']]['booklist'][$values['isbn']]['title'] = $title[0]["title"];
                $this->orderinfolist[$values['Orderid']]['booklist'][$values['isbn']]['count'] = $values['count'];
                $this->orderinfolist[$values['Orderid']]['booklist'][$values['isbn']]['price'] = $values['price'];
                }
            }
        }
    }

    public function getOrderinfoList(){
        return $this->orderinfolist;
    }
}