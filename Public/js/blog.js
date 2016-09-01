$(function () {
    $('#position').owlCarousel({
        items : 1,
        loop:true,
        itemsDesktop:false,
        slideSpeed:400,
        autoPlay:3000 ,
        stopOnHover:true,
        animateOut: 'fadeOut',
        responsiveRefreshRate:100
    });

    $(".list").click(function(){
        $d = $(".keyList").css('display');
        if($d=='none'){
            $(".keyList").slideDown();
        }else{
            $(".keyList").slideUp();
        }
    })
})