(function($){
    $(document).ready(function(){
        $(".choose").on("click",function(){

            var thisval = $(this).val();
            $.ajax({
                "type":"GET",
                "url": "/category/booklist?type="+thisval,
                success:function(data){
                    location.href = "/category/booklist?type="+thisval;
                },
                error:function(data){
                    alert('失败');
                }
            });  
        });
    });
})(jQuery);