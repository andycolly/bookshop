(function($){
    $(document).ready(function(){

        $(".addCart").on("click",function(){
            var isbn = $(this).parent().parent().attr("value");
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

        $(".getBookinfo").on("click",function(){
            var isbn = $(this).parent().attr("value");
            $.ajax({
                "type":"Get",
                "url": "/book/info",
                "data":{
                    "isbn":isbn,
                },
                success:function(data){
                    location.href = "/book/info?isbn=" + isbn;
                },
                error:function(data){
                    alert('isbn不合法');
                }
            });  
        });
    });
})(jQuery);