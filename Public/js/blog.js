$(function () {
    $('#owl-demo').owlCarousel({
        items : 1,
        itemsDesktop:false,
        slideSpeed:800,
        navigation:true,
        navigationText:['上一篇','下一篇'],
        autoPlay:2000,
        stopOnHover:true
    });
    $(".listPng").click(function () {
        $d = $(".keyList").css('display');
        if($d=='none'){
            $(".keyList").slideDown();
        }else{
            $(".keyList").slideUp();
        }
    })
    var width = $(".banner").width();
    $(".banner .item img").width(width);
    $(".banner .item").width(width);
    $(window).resize(function(){
        var width = $(".banner").width();
        $(".banner .item img").width(width);
    })
})