<?
    use App\Models\Book;
    if(!isset($_SESSION['cart']['booklist'])||empty($_SESSION['cart']['booklist'])){
        $state = 404;
    }else{
        $state = 200;
        $bookslist = [];
        $data = $_SESSION['cart']['booklist'];
        foreach ($data as $key => $value) {
            $item = new Book($key);
            $bookslist[$key] = $item->getinfo();
            $bookslist[$key]['count'] = $value['count'];
        }
    }
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8" / >
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>菜单</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/cart.css" />
    <script src="/js/jquery-2.0.0.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/cart.js" type="text/javascript"></script>
</head>

<body>
    <div class="container">
        <? require("../App/views/nav.php"); ?>
        <h1 class="col-sm-12 category-title">购物车</h1>
        <ul class="row">
            <?php
                if($state == 404){
                    echo "<h3>购物篮为空</h3>";
                }else if($state == 200){
                    foreach ($bookslist as $key => $value) {
                        echo "<li class=\"col-sm-12\"><img class=\"col-sm-2\" src=\"/img/cover/".$value['cover']."\"></img><div class=\"col-sm-7\"><h4>标题:".$value['title']."</h4><h4>作者:".$value['author']."</h4><h4>简介:".$value['description']."</h4></div><div class=\"col-sm-3\"><h4 class='price'>单价:".$value['price']."</h4><h4 class='itemPrices'>小结:".$value['price'] * $value['count']."</h4><div class=\"choose\"><i class=\"fa fa-minus\"></i><input class=\"form-control count\" id=".$key." value=".$value['count']." /><i class=\"fa fa-plus\"></i></div></div></li>";
                    }
                }
            ?>
        </ul>
        <div class="sure-buy col-sm-4 col-sm-offset-8">
            <button class="btn btn-default" id="back">返回</button>
            <h4 id="TotalPrices">0.00元</h4>
            <button class="btn btn-default" id="sure">确认购买</button>
        </div>
    </div>
</body>

</html>

