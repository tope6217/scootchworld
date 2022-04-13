<div class="scroll up">
    <i class="fa fa-arrow-down"></i>
</div>

<script>
    $('.scroll').click(function (e) {
    e.preventDefault();
    if($(this).hasClass('up')){
       $("html, body").animate({scrollTop:0},2000)
    }else{
        $("html, body").animate({scrollTop:$(document).height()},2000)
    }
})

$(window).scroll(function(e){
    e.preventDefault();
    scrollposition = $(window).scrollTop();
    if(scrollposition > 70){
        $('.scroll').addClass('up')
    }else{
        $('.scroll').removeClass('up')
    }
})
</script>
