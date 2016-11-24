<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8" / >
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>菜单</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/admin.css" />
    <script src="/js/jquery-2.0.0.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/admin.js" type="text/javascript"></script>
</head>

<body>
    <h1 class="text-center" style="padding: 10px 50px">欢迎你,管理员</h1>    
    <div class="container">
        <div class="col-sm-2">
            <ul class="list-group" >
                <li class="list-group-item text-center" id="loginout">退出登录</li>
            </ul>
            <ul class="list-group control-list text-center" >
                <li class="list-group-item" >用户管理</li>
                <li class="list-group-item" >商品管理</li>
                <li class="list-group-item" >订单管理</li>
            </ul>
        </div>
        <div class="col-sm-10">
            <ul class="view-list" style="padding-left: 0;">
                <li>
                    <h3>用户管理</h3>
                    <table class="table table-hover table-userinfo">
                        <thead>
                            <tr>
                                <th>Uid</th>
                                <th>用户名</th>
                                <th>重置密码</th>
                                <th>地址</th>
                                <th>联系电话</th>
                                <th>确认修改</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($userinfo as $value){
                                echo "<tr><td>".$value['Uid']."</td>";
                                echo "<td>".$value['username']."</td>";
                                echo "<td><input class=\"form-control input-sm\" value=\"".$value['password']."\"></td>";
                                echo "<td><input class=\"form-control input-sm\" value=\"".$value['address']."\"></td>";
                                echo "<td><input class=\"form-control input-sm\" value=\"".$value['phone']."\"></td>";
                                echo "<td><button class=\"btn btn-warning btn-sm save-userinfo\">保存修改</button></td></tr>";
                            }
                            ?>                           
                        </tbody>
                    </table>
                </li>
                <li>
                    <h3>类别管理</h3>
                    <table class="table table-hover table-cateinfo">
                        <thead>
                            <tr>
                                <th>类id</th>
                                <th>类名</th>
                                <th>icon(fontawesome)</th>
                                <th>icon颜色</th>
                            </tr>
                        </thead>
                            <?php foreach ($categoryinfo as $value){
                                echo "<tr><td>".$value['catid']."</td>";
                                echo "<td><input class=\"form-control input-sm\" value=\"".$value['catname']."\"></td>";
                                echo "<td><input class=\"form-control input-sm\" value=\"".$value['caticon']."\"></td>";
                                echo "<td><input class=\"form-control input-sm\" value=\"".$value['iconcolor']."\"></td>";
                                echo "<td><button class=\"btn btn-warning btn-sm save-catinfo\">保存修改</button></td></tr>";
                            }
                            ?>      
                        <tbody>
                        </tbody>
                    </table>
                    <h3>商品管理</h3>
                    <table class="table table-hover table-bookinfo">
                        <thead>
                            <tr>
                                <th>isbn</th>
                                <th>标题</th>
                                <th>作者</th>
                                <th>书类</th>
                                <th>单价</th>
                                <th>描述</th>
                                <th>封面路径</th>
                            </tr>
                        </thead>
                            <tr>
                                <td><input class="form-control input-sm"></td>
                                <td><input class="form-control input-sm"></td>
                                <td><input class="form-control input-sm"></td>
                                <td><input class="form-control input-sm"></td>
                                <td><input class="form-control input-sm"></td>
                                <td><input class="form-control input-sm"></td>
                                <td><input class="form-control input-sm"></td>
                                <td><button class="btn btn-warning btn-sm add-bookinfo">新增书</button></td>
                            </tr>
                            <?php foreach ($bookinfo as $value){
                                echo "<tr><td>".$value['isbn']."</td>";
                                echo "<td>".$value['title']."</td>";
                                echo "<td>".$value['author']."</td>";
                                echo "<td><input class=\"form-control input-sm\" value=\"".$value['catid']."\"></td>";
                                echo "<td><input class=\"form-control input-sm\" value=\"".$value['price']."\"></td>";
                                echo "<td><input class=\"form-control input-sm\" value=\"".$value['description']."\"></td>";
                                echo "<td><input class=\"form-control input-sm\" value=\"".$value['cover']."\"></td>";
                                echo "<td><button class=\"btn btn-warning btn-sm save-bookinfo\">保存修改</button></td>";
                                echo "<td><button class=\"btn btn-warning btn-sm del-bookinfo\">删除书</button></td></tr>";
                            }
                            ?>      
                        <tbody>
                        </tbody>
                    </table>
                </li>
                <li>
                    <h3>订单管理</h3>
                    <table class="table table-hover table-orderinfo">
                        <thead>
                            <tr>
                                <th>订单号</th>
                                <th>用户Uid</th>
                                <th>书名</th>
                                <th>单价</th>
                                <th>数量</th>
                                <th>总价</th>
                                <th>创建时间</th>
                                <th>状态</th>
                                <th>保存修改</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(!empty($orderinfo)){
                                    foreach ($orderinfo as $key => $value){
                                    echo "<tr><td>".$key."</td>";
                                    echo "<td>".$value['Uid']."</td>";
                                    $titlestr  = "";
                                    $pricestr = "";
                                    $countstr = "";
                                    $date = date('Y-m-d H:i:s',$value['Time']);
                                    foreach ($value['booklist'] as $key => $booklist) {
                                        $titlestr .= $booklist['title']."<br />";
                                        $pricestr .= $booklist['price']."元<br />";
                                        $countstr .= $booklist['count']."本<br />";
                                    }
                                    echo "<td>".$titlestr."</td>";
                                    echo "<td>".$pricestr."</td>";
                                    echo "<td>".$countstr."</td>";
                                    echo "<td>".$value['TotalPrices']."元</td>";
                                    echo "<td>".$date."</td>";
                                    echo "<td><input class=\"form-control input-sm\" value=\"".$value['State']."\"></td>";
                                    echo "<td><button class=\"btn btn-warning btn-sm save-orderinfo\">保存修改</button></td></tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>

