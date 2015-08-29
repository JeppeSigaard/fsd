$(function(){

    if($('.front-page-slider').length){
        var slider = $('.front-page-slider .inner ul'),
            slideNav = $('.front-page-slider-prev-next');
        slider.flickity({
        
            setGallerySize: false,
            wrapAround: true,
            items:1,
            cellSelector : '.list-item',
            pageDots: false,
            prevNextButtons: false,
        });
        
        slideNav.on({click:function(e){
            e.preventDefault();
            var t = $(e.target);
            
            if(t.is('.left')){
                slider.flickity('next');
            }
            else{
                  slider.flickity('previous');
            }
        }});
    }
    
});