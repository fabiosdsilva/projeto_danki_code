$(function(){

    var open = true;
    var windowSize = $(window)[0].innerWidth;

    var targetSizeMenu = (windowSize <= 400) ? 200 : 300;

    if(windowSize <= 768){
        open = false;
    }

$('.menu-btn').click(function(){
    if(open){
        $('nav').animate({'width': '0', 'padding': '0'});
        $('.content, header').animate({'width':'100%'});
        $('.content, header').animate({'left': '0','margin-top': 0});
        open=false;
    }else{
        $('nav').css('display','block');
        $('nav').css('possicion','fixed');
        $('nav').animate({'width':'250px'});
        $('.content, header').css('width','calc(100% - 250px)');
        open=true;
    }
})

})