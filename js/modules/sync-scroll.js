$(function(){if($('.site-nav').length){

    var lastScrollTop = 0,
        fancyScroll = $('.site-nav');
    
    $(window).on('scroll', function () {
        
        
        var st = $(this).scrollTop(),
            diff = st - lastScrollTop,
            scrollStop = $(window).innerHeight() + $(window).scrollTop(),
            fancyHeight = fancyScroll.offset().top + fancyScroll.innerHeight(),
            fancyScrollAmount = fancyScroll.scrollTop() + diff;
        
        if(fancyScroll.hasClass('fixed') || $(window).width < 768){fancyScroll.scrollTop(fancyScrollAmount);}
        
        if(fancyScroll.offset().top - 70 > $(window).scrollTop()){

            fancyScroll.addClass('start').scrollTop(0);
            
        }
        else{
            fancyScroll.removeClass('start');
            
        }
        
        if (st > lastScrollTop){
            // Nedad
            
            if(scrollStop > fancyHeight ){
                fancyScroll.addClass('stop');
                
               
            }
        } else {
            // Opad
            
             if(scrollStop < fancyHeight ){
                fancyScroll.removeClass('stop').scrollTop($(this).scrollTop());
            }
        }
        lastScrollTop = st;
    }); 

}});