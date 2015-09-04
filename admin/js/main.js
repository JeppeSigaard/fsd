jQuery(function($){

    var smamo_aside_control = {
    
        module : $('#aside_control'),
        selectListen : function(){
            
            smamo_aside_control.module.on('click',function(e){
                
                var t = $(e.target);
            
                if(t.is('.rwmb-clone>.rwmb-select-wrapper select')){
                    t.on('change',function(){
                        
                        t.parents('.rwmb-clone').find('.rwmb-group-wrapper').removeClass('show');
                        
                        if(t.val() === 'quick_links'){
                            t.parents('.rwmb-select-wrapper').next('.rwmb-group-wrapper').addClass('show');
                            
                        }
                        
                        else if(t.val() === 'list'){
                            t.parents('.rwmb-select-wrapper').next('.rwmb-group-wrapper').next('.rwmb-group-wrapper').addClass('show');
                        }
                        
                        
                        t.off('change');
                    });
                    
                }
                
                else if(t.is('.add-clone')){
                    
                    setTimeout(function(){
                        
                        smamo_aside_control.module.find('.rwmb-clone:last-of-type').find('.rwmb-group-wrapper').removeClass('show');
                        
                    },50);
                
                }
            
            });
            
        },

    };
    
    smamo_aside_control.module.find('.rwmb-clone>.rwmb-select-wrapper select').each(function(){
        if($(this).val() === 'quick_links'){
            $(this).parents('.rwmb-select-wrapper').next('.rwmb-group-wrapper').addClass('show');

        }

        else if($(this).val() === 'list'){
            $(this).parents('.rwmb-select-wrapper').next('.rwmb-group-wrapper').next('.rwmb-group-wrapper').addClass('show');
        }
    });
    
    smamo_aside_control.selectListen();
});