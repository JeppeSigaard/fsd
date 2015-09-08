jQuery(function($){

    var smamo_aside_control = {
        
        module : $('#aside_control'),
        
        makeChange : function(t){
        
            if(t.val() === 'quick_links'){
                t.parents('.rwmb-clone').children('.quick_links_field').addClass('show');
                t.parents('.rwmb-clone').children('.list_field').removeClass('show');
                t.parents('.rwmb-clone').children('.member_list_field').removeClass('show');

            }

            else if(t.val() === 'list'){
                t.parents('.rwmb-clone').children('.quick_links_field').removeClass('show');
                t.parents('.rwmb-clone').children('.list_field').addClass('show');
                t.parents('.rwmb-clone').children('.member_list_field').removeClass('show');
            }

            else if(t.val() === 'member_list'){
                t.parents('.rwmb-clone').children('.quick_links_field').removeClass('show');
                t.parents('.rwmb-clone').children('.list_field').removeClass('show');
                t.parents('.rwmb-clone').children('.member_list_field').addClass('show');
            }
            
            else{
                t.parents('.rwmb-clone').children('.quick_links_field, .list_field, .member_list_field').removeClass('show');
            }
    
        },
        
        selectListen : function(){
            
            smamo_aside_control.module.on('click',function(e){
                
                var t = $(e.target);
                
                if(t.is('.rwmb-clone>.rwmb-select-wrapper select')){
                    t.on('change',function(){
                        
                        smamo_aside_control.makeChange(t);
                        
                        t.off('change');
                    });
                    
                }
                
                else if(t.is('.add-clone')){
                    
                    setTimeout(function(){
                        
                        smamo_aside_control.module.find('.rwmb-clone:last-of-type').find('.show').removeClass('show');
                        
                    },50);
                
                }
            
            });
            
        },

    };
    
    smamo_aside_control.module.find('.rwmb-clone>.rwmb-select-wrapper select').each(function(){
        
        var t = $(this);
        
        smamo_aside_control.makeChange(t);
    });
    
    smamo_aside_control.selectListen();
});