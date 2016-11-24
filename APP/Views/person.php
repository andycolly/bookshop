<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8" / >
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>菜单</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/person.css" />
    <script src="/js/jquery-2.0.0.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/person.js" type="text/javascript"></script>
</head>

<body>
    <div class="container">
    <? require("../App/views/nav.php"); ?>
        <div class="col-sm-3">
            <ul class="list-group control-list" >
                <li class="list-group-item" >修改个人信息</li>
                <li class="list-group-item" >查看订单内容</li>
            </ul>
        </div>
        <div class="col-sm-9">
            <ul class="view-list" style="padding-left: 0;">
                <li>
                    <h3>修改密码</h3>
                    <form id="personForm" class="form-horizontal" method="post">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="password" placeholder="请输入原密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="newPassword" placeholder="请输入新密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="newPassword2" placeholder="再次输入新密码">
                            </div>
                        </div>

                        <div>
                            <button type="button" id="SavePassword" class="btn btn-default col-sm-2 col-sm-offset-10">保存</button>
                        </div>
                    <h3>个人信息</h3>
                    <form id="personForm" class="form-horizontal" method="post">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="Address" placeholder=
                                <?php
                                echo !empty($userinfo['address'])?$userinfo['address'] : "Please input your address"; 
                                 ?>
                                  name="address" value= <?php
                                echo !empty($userinfo['address'])?$userinfo['address'] : "Please input your address"; 
                                 ?>
                                 >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="phoneNumber" placeholder=
                                <?php 
                                echo !empty($userinfo['phone'])? $userinfo['phone'] : "Please input your phoneNumber"; 
                                ?> name="phone" value=<?php 
                                echo !empty($userinfo['phone'])? $userinfo['phone'] : "Please input your phoneNumber"; 
                                ?>
                                >
                            </div>
                        </div>
                        <div>
                            <button type="button" id="Save" class="btn btn-default col-sm-2 col-sm-offset-10">保存</button>
                        </div>
                    </form>
                </li>
                <li>
                   <table class="table table-hover">
                        <h3>订单列表</h3>
                        <thead>
                            <tr>
                                <th>订单号</th>
                                <th>书号</th>
                                <th>单价</th>
                                <th>数量</th>
                                <th>总价</th>
                                <th>创建时间/状态</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            if(!empty($orderinfo)){
                                foreach ($orderinfo as $key => $value){
                                echo "<tr><td>".$key."</td>";
                                $titlestr  = "";
                                $pricestr = "";
                                $countstr = "";
                                $date = date('Y-m-d H:i:s',$value['Time']);
                                switch ($value['State']) {
                                    case 0: $Statestr = "已提交";break;
                                    case 1: $Statestr = "已付款";break;
                                    case 2: $Statestr = "已发货";break;
                                    case 3: $Statestr = "已完成";break;
                                    case 4: $Statestr = "订单关闭";break;
                                    default: break;
                                }
                                foreach ($value['booklist'] as $key => $booklist) {
                                    $titlestr .= $booklist['title']."<br />";
                                    $pricestr .= $booklist['price']."元<br />";
                                    $countstr .= $booklist['count']."本<br />";
                                }
                                echo "<td>".$titlestr."</td>";
                                echo "<td>".$pricestr."</td>";
                                echo "<td>".$countstr."</td>";
                                echo "<td>".$value['TotalPrices']."元</td>";
                                echo "<td>".$date."<br />".$Statestr."</td></tr>";
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

