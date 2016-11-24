(function($){
    $(document).ready(function(){

        function getisbn(str){
            var arr   = str.split(":");
            return arr[1];
        }


        $("#addCart").on("click",function(){
            var isbn = getisbn($("#isbn").html());
            $.ajax({
                "type":"POST",
                "url": "/cart/addToCart",
                "data":{
                    "isbn": isbn,
                },
                success:function(data){
                    alert("成功加入购物车");
                },
                error:function(data){
                    alert('商品isbn出错');
                }
            });
        });
    });
})(jQuery)