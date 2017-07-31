$(function(){
var url = window.location;
// Will only work if string in href matches with location
$('ul.nav a[href="'+ url +'"]').parent().addClass('active');

// Will also work for relative and absolute hrefs
$('ul.nav a').filter(function() {
    return this.href == url;
}).parent().addClass('active');
// Confirme Member delete
$('.confirm').click(function(){

        return confirm('Are you sure?');
})
});

$(window).load(function(){
    $('.preloader').fadeOut(2000);

});

/*
** Remove Upper Navigation On Scroll down
**
 */
var lastScroll = 0, hundert;
$(".mdl-layout__content").scroll(function(){
    //NAVIGATION FADEIN/OUT
    var st = $(".mdl-layout__content").scrollTop();
    if (st > 50 && st > lastScroll){
        $('.upper-bar').addClass('nav-up');
        $('.logo').fadeIn('slow');
        $('.logo').addClass('display-block');
        hundert = st;
    }
    else if(st < (hundert - 150)){
        $('.upper-bar').removeClass('nav-up');
        $('.logo').fadeOut('slow');
        $('.logo').removeClass('display-block');
    }
    lastScroll = st;
});
/*
**Mega Menu FadeIn An Out
 */
 $(".mega-menu").hover(function(){
        $(".mega-container").fadeIn("slow");
    },
    function(){
        $(".mega-container").fadeOut("fast");
    });

 


/* Show Login Form Or sign up Upon Click */
$(document).ready(function(){
    
    $(".signup-span").click(function(){
        $(".loggin-in").fadeOut('fast');
        $(".sign-up").fadeIn("slow");
        $(".sign-up").addClass("sign-up-active");
      
    });
    $(".signin-span").click(function(){
        $(".loggin-in").fadeIn('fast');
        $(".sign-up").fadeOut("slow");
        $(".sign-up").removeClass("sign-up-active");
      
    });
});
