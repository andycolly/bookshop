(function($){
    $(document).ready(function(){
        $(".view-list li").fadeOut(0);
        $(".view-list li").eq(0).fadeIn();

        $(".control-list li").on("click",function(){
            if(!$(this).hasClass(".action")){
                $(this).siblings().removeClass(".action");
                $(this).addClass(".action");
                var i = $(this).index();
                $(".view-list li").fadeOut(300,function(){});
                setTimeout(function(){$(".view-list li").eq(i).fadeIn(300);},400); 
            }
        });
        $(".save-userinfo").on("click",function(){
            $.ajax({
                "type":"POST",
                "url": "/admin/updateUserInfo",
                "data":{
                    "username":$(this).parent().siblings().eq(1).html(),
                    "password":$(this).parent().siblings().eq(2).children("input").val(),
                    "address":$(this).parent().siblings().eq(3).children("input").val(),
                    "phone":$(this).parent().siblings().eq(4).children("input").val(),
                },
                success:function(data){
                    alert(data);
                },
                error:function(data){
                }
            });  
        });
        $(".save-catinfo").on("click",function(){
            $.ajax({
                "type":"POST",
                "url": "/admin/updateCategroyinfo",
                "data":{
                    "catid"    :$(this).parent().siblings().eq(0).html(),
                    "catname"  :$(this).parent().siblings().eq(1).children("input").val(),
                    "caticon"  :$(this).parent().siblings().eq(2).children("input").val(),
                    "iconcolor":$(this).parent().siblings().eq(3).children("input").val(),
                },
                success:function(data){
                    alert(data);
                },
                error:function(data){
                }
            });  
        });
        $(".save-bookinfo").on("click",function(){
            $.ajax({
                "type":"POST",
                "url": "/admin/updateBooksInfo",
                "data":{
                    "isbn"        :$(this).parent().siblings().eq(0).html(),
                    "catid"       :$(this).parent().siblings().eq(3).children("input").val(),
                    "price"       :$(this).parent().siblings().eq(4).children("input").val(),
                    "description" :$(this).parent().siblings().eq(5).children("input").val(),
                    "cover"       :$(this).parent().siblings().eq(6).children("input").val(),
                },
                success:function(data){
                    alert(data);
                },
                error:function(data){
                }
            });  
        });
        $(".add-bookinfo").on("click",function(){
            $.ajax({
                "type":"POST",
                "url": "/admin/addBookInfo",
                "data":{
                    "isbn"        :$(this).parent().siblings().eq(0).children("input").val(),
                    "title"       :$(this).parent().siblings().eq(1).children("input").val(),
                    "author"      :$(this).parent().siblings().eq(2).children("input").val(),
                    "catid"       :$(this).parent().siblings().eq(3).children("input").val(),
                    "price"       :$(this).parent().siblings().eq(4).children("input").val(),
                    "description" :$(this).parent().siblings().eq(5).children("input").val(),
                    "cover"       :$(this).parent().siblings().eq(6).children("input").val(),
                },
                success:function(data){
                    alert(data);
                },
                error:function(data){
                }
            });  
        });
        $(".del-bookinfo").on("click",function(){
            $.ajax({
                "type":"POST",
                "url": "/admin/delBookInfo",
                "data":{
                    "isbn" : $(this).parent().siblings().eq(0).html(),
                },
                success:function(data){
                    alert(data);
                },
                error:function(data){
                }
            });  
        });
        $(".save-orderinfo").on("click",function(){
            $.ajax({
                "type":"POST",
                "url": "/admin/updateOrderInfo",
                "data":{
                    "orderid"     :$(this).parent().siblings().eq(0).html(),
                    "state"       :$(this).parent().siblings().eq(7).children("input").val(),
                },
                success:function(data){
                    alert(data);
                },
                error:function(data){
                }
            });  
        });
        $("#loginout").on("click",function(){
            location.href = "/login/loginout";
        });
    });
})(jQuery)