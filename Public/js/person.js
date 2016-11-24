(function($){
    $(document).ready(function(){
        $("#Save").on("click",function(){
            $.ajax({
                "type":"POST",
                "url": "/person/updata",
                "data":{
                    "Address": $("#Address").val(),
                    "Phone": $("#phoneNumber").val(),
                },
                success:function(data){
                    alert(data);
                },
                error:function(data){
                    alert(data);
                }
            });
        });

        $("#SavePassword").on("click",function(){
            if($("#newPassword").val() != $("#newPassword2").val())
            {
                alert("两次输入不一致");
                $("#newPassword").val(null);
                $("#newPassword2").val(null);
            }else{
                 $.ajax({
                    "type":"POST",
                    "url": "/person/setpassword",
                    "data":{
                        "password": $("#password").val(),
                        "newPassword": $("#newPassword").val(),
                    },
                    success:function(data){
                        alert(data);
                    },
                    error:function(data){
                        alert(data);
                    }
                });
            }
        });


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
    });
})(jQuery)