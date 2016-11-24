(function($){
    $(document).ready(function(){
        $("#LoginIN").on("click",function(){
            $.ajax({
                "type":"POST",
                "url": "/login/login",
                "data":{
                    "username":$("#Username").val(),
                    "password":$("#Password").val(),
                },
                success:function(data){
                    alert(data);
                    if(data== "登陆成功"){
                        location.href = "/category";
                    }else if (data == "管理员登陆成功"){
                        location.href = "/admin";
                    }
                },
                error:function(data){
                }
            });  
        });

        $("#Register").on("click",function(){
            $.ajax({
                "type":"POST",
                "url": "/login/register",
                "data":{
                    "username":$("#Username").val(),
                    "password":$("#Password").val(),
                },
                success:function(data){
                    alert(data);
                },
                error:function(data){
                }
            });  
        });


    });
})(jQuery);