<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8" / >
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>菜单</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/book.css" />
    <script src="/js/jquery-2.0.0.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/book.js" type="text/javascript"></script>
</head>

<body>
    <div class="container">
        <? require("../App/views/nav.php"); ?>
        <div class="col-sm-12">
            <img class="col-sm-5" <?= "src=\"/img/cover/".$bookinfo['cover']."\""; ?> </img>
            <div class="col-sm-7">
                <h4>标题:<?= $bookinfo['title']; ?></h4>
                <h4>作者:<?= $bookinfo['author']; ?></h4>
                <h4>单价:<?= $bookinfo['price']; ?></h4>
                <h4>种类:<?= $bookinfo['catname']; ?></h4>
                <h4 id="isbn">ISBN:<?= $bookinfo['isbn']; ?></h4>
                <h4>简介:<?= $bookinfo['description']; ?></h4>
            </div>
            <button class="btn btn-default" id="addCart">加入购物车</button>
        </div>
    </div>
</body>

</html>

