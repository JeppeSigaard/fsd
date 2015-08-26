$(function(){

    $(window).on({
        
        scroll : function(){
            
            // Indstil header
            var headerBar = $('.header-bar'),
                sideNav = $('.site-nav'),
                windowTop = $(window).scrollTop(),
                headerTop = headerBar.offset().top;
            
            if(windowTop > headerTop && !headerBar.hasClass('fixed')){
            
                headerBar.addClass('fixed');
                sideNav.addClass('fixed');
                
            }
            
            else if(windowTop < headerTop && headerBar.hasClass('fixed')){
            
                headerBar.removeClass('fixed');
                sideNav.removeClass('fixed');
            }
    
        }

    });
});