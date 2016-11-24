(function($){
    $(document).ready(function(){
        $(".fa-plus").on("click",function(){
            var count = parseInt($(this).prev().val()) + 1;
            $(this).prev().val(count);
            updataItemPrices($(this));
        });

        $(".fa-minus").on("click",function(){
            var count = parseInt($(this).next().val()) - 1;
            if(count >= 0){
                $(this).next().val(count);
                updataItemPrices($(this));
            }
        });

        $(".count").keyup(function(){
            var count = parseInt($(this).val());
            if(count <= 0){
                $(this).val(1);
            }
            updataItemPrices($(this).next());
        });


        function updataItemPrices(dom){
            var count = parseInt(dom.siblings(".count").val());
            var str   = dom.parent().siblings(".price").html();
            var price = getprice(str);
            var itemprices = price * count;
            if(isNaN(itemprices)) itemprices = 0;
            dom.parent().siblings(".itemPrices").html("小结:"+itemprices.toFixed(2));
            updataTotalPrices();
        }

        function updataTotalPrices(){
            var TotalPrices = 0;
            for(var i=0;i<$(".itemPrices").length;i++)
            {
                TotalPrices += getprice($(".itemPrices").eq(i).html());
                $("#TotalPrices").html(TotalPrices.toFixed(2)+"元");        
            }
        }

        updataTotalPrices();

        function getprice(str){
            var arr   = str.split(":");
            return parseFloat(arr[1]);
        }

        function getArray(){
            var items = new Array();

            for(var i=0;i<$(".count").length;i++){
                items[i] = new Array();
                items[i][0] = $(".count").eq(i).attr("id");
                items[i][1] = parseInt($(".count").eq(i).val());
            }
            return items;
        }

        

        function sendAjax(type){
             var items = getArray();
             $.ajax({
                "type":"POST",
                "url": "/cart/cartFunction",
                "data":{
                    "handletype":type,
                    "Arr": items,
                },
                success:function(data){
                    alert(data);
                    // location.href = "/category";
                },
                error:function(data){
                    alert('失败');
                }
            });  
        }

        $("#back").on("click",function(){
            sendAjax("save");
        });

        $("#sure").on("click",function(){
            sendAjax("sure");
        });
        

        
    });

})(jQuery)