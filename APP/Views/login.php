<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8" / >
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>登陆界面</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/login.css" />
    <script src="/js/jquery-2.0.0.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/login.js" type="text/javascript"></script>
</head>

<body>
    <div class="container">
        <div class="col-sm-8 col-sm-offset-2">
            <h1 class="text-center">Welcome Bookshop!</h1>
            <form id="loginForm" class="form-horizontal" method="post">
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <input type="text" class="form-control" id="Username" placeholder="Please input your username" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <input type="password" class="form-control" id="Password" placeholder="Please input your password" name="password">
                    </div>
                </div>
                <div>
                    <button type="button" id="LoginIN" class="btn btn-default col-sm-2 col-sm-offset-3">LoginIN</button>
                    <button type="button" id="Register" class="btn btn-default col-sm-2 col-sm-offset-2">register</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
