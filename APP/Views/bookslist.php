<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8" / >
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>菜单</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/bookslist.css" />
    <script src="/js/jquery-2.0.0.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/bookslist.js" type="text/javascript"></script>
</head>

<body>
    <div class="container">
        <? require("../App/views/nav.php"); ?>
        <h1 class="col-sm-12 text-center category-title"> <?= $bookslist->typename; ?>
        </h1>
        <ul class="row">
        <?
            foreach ($bookslist->list as $value) {
            echo "<li class=\"col-sm-12\" value=".$value['isbn']."><img class=\"col-sm-2 getBookinfo\" src=\"/img/cover/".$value['cover']."\"></img><div class=\"col-sm-7\"><h4>标题:".$value['title']."</h4><h4>作者:".$value['author']."</h4><h4>简介:".$value['description']."</h4></div><div class=\"col-sm-3\"><h4>价格:".$value['price']."</h4><button class=\"btn btn-default addCart\">加入购物车</button></div></li>";
            }
        ?>
        </ul>
    </div>
</body>

</html>

