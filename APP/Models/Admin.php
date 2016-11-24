<?

namespace App\Models;

use App\Services\SQLconn;

class Admin
{
    private $AllUserInfo;
    private $AllCategoryInfo;
    private $AllBooksInfo;
    private $AllOrderidInfo;
    private $AllOrderItemInfo;

    function __construct()
    {
        $this->getDBUserInfo();
        $this->getDBBookInfo();
        $this->getDBCategoryInfo();
        $this->getDBOrderInfo();
    }

    public function getDBUserInfo(){
        $conn = new SQLconn;
        $result = $conn->query("SELECT * FROM users WHERE uid <> '1'");
        $this->AllUserInfo = $result;
    }

    public function getDBBookInfo(){
        $conn = new SQLconn;
        $result = $conn->query("SELECT * FROM books");
        $this->AllBooksInfo = $result;
    }

    public function getDBCategoryInfo(){
        $conn = new SQLconn;
        $result = $conn->query("SELECT * FROM categories");
        $this->AllCategoryInfo = $result;
    }

    public function getDBOrderInfo(){
        $conn = new SQLconn;
        $conn = new SQLconn;
        $orderInfo = $conn->query("SELECT * FROM `order`");
        if(!empty($orderInfo)){
            foreach ($orderInfo as $key => $value) {
            $this->AllOrderidInfo[$key] = $value['Orderid'];
            $this->AllOrderItemInfo[$value['Orderid']]['Uid'] = $value['Uid'];
            $this->AllOrderItemInfo[$value['Orderid']]['Time'] = $value['Time'];
            $this->AllOrderItemInfo[$value['Orderid']]['State'] = $value['State'];
            $this->AllOrderItemInfo[$value['Orderid']]['TotalPrices'] = $value['TotalPrices'];
            }
        }
        foreach($this->AllOrderidInfo as $value){
            $orderItemInfo = $conn->query("SELECT * FROM `order_item`");
            if(!empty($orderItemInfo)){
                foreach ($orderItemInfo as $values) {
                $title =  $conn->query("SELECT title FROM books WHERE isbn='".$values['isbn']."'");
                $this->AllOrderItemInfo[$values['Orderid']]['booklist'][$values['isbn']]['title'] = $title[0]["title"];
                $this->AllOrderItemInfo[$values['Orderid']]['booklist'][$values['isbn']]['count'] = $values['count'];
                $this->AllOrderItemInfo[$values['Orderid']]['booklist'][$values['isbn']]['price'] = $values['price'];
                }
            }
        }
    }

    public function getUserInfo()
    {
        return $this->AllUserInfo;
    }

    public function getBookInfo()
    {
        return $this->AllBooksInfo;
    }

    public function getCategoryInfo()
    {
        return $this->AllCategoryInfo;
    }

    public function getOrderInfo()
    {
        return $this->AllOrderItemInfo;
    }


}