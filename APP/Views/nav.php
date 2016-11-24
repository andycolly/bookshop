<?php
    use App\Models\Category;

    if(empty(Category::$info)){
        Category::updata();
        $Categories=Category::get();
    }else{
        $Categories=Category::$info;
    }
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">在线购书网</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/category">书类选择<span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">快速入口<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <?php
                foreach ($Categories as $value){
                    echo "<li><a href=\"/category/booklist?type=".$value['catid']."\">".$value['catname']."</a></li>";
                }

          ?>
            <li role="separator" class="divider"></li>
            <li><a href="/category/booklist?type=all">全部都学</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

        <?
            if(!isset($_SESSION['user'])){
            echo "<li><a href=\"/login/loginPage\">登陆</a></li>";
            }else{
              $Uname = $_SESSION['user']['username'];
              echo  "<li class=\"dropdown\">";
              echo  "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">欢迎你".$Uname."<span class=\"caret\"></span></a>";
              echo  "<ul class=\"dropdown-menu\">";
              echo  "<li><a href=\"/person\">个人中心</a></li>";
              echo  "<li><a href=\"/cart\">购物车</a></li>";
              echo  "<li><a href=\"/login/loginout\">注销</a></li>";
              echo  "<li role=\"separator\" class=\"divider\"></li>";
              echo  "<li><a href=\"#\">联系不存在的客服</a></li>";
              echo  "</ul></li>";
            }
            
        ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>