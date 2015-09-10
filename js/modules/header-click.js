$(function(){
    
    $('.header-bar').on({
        
        'click' : function(e){
            
        var t = $(e.target);
        
            if(t.is('.button-menu-toggle')){
                e.preventDefault();
                t.toggleClass('show');
                $('.site-nav').toggleClass('show');

            }
        
        
    
        },
            
    });

});