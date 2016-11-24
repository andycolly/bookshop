<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8" / >
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>菜单</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/category.css" />
    <script src="/js/jquery-2.0.0.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/category.js" type="text/javascript"></script>
</head>

<body>
    <div class="container">
        <? require("../App/views/nav.php"); ?>
        <h1 class="col-sm-12 text-center category-title">分类</h1>
        <ul>
            <?
             foreach ($Categories as $value) {
                echo "<li class=\"col-sm-4 text-center choose\" value=\"".$value['catid']."\"><i class=\"icon-font-style fa fa-".$value['caticon']."\" style=\"color:".$value['iconcolor']."\"></i><p class=\"font-style text-center\" style=\"color:".$value['iconcolor']."\">".$value['catname']."</p></li>";
            }
            ?>
        </ul>
    </div>
</body>

</html>
