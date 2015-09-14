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

	var smamo_excel_export = {
		get get(){
			var vars= {};
			if(window.location.search.length!==0)
				window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value){
					key=decodeURIComponent(key);
					if(typeof vars[key]==="undefined") {vars[key]= decodeURIComponent(value);}
					else {vars[key]= [].concat(vars[key], decodeURIComponent(value));}
				});
			vars.action = 'smamo_excel_export';
			return vars;
		},

		ajax_export : function(){

			$.ajax({
				type: "POST",
				url: 'admin-ajax.php',
				data: smamo_excel_export.get,
				success: function(response){
				    if(response.file){
                        
                        window.location.href = response.file;
                    
                    }
				},
				dataType: 'json'
			});
		},
	};

	// Tilføj export til excel
	if($('body').is('.edit-php.post-type-medlem') || $('body').is('.edit-php.post-type-tilmelding')){

		var ul = $('.subsubsub'),
			li = $('<li class="excel-export"> | <a href="#" class="excel-export">Exportér til Excel</a></li>');

		ul.append(li);

		li.on('click',function(e){
			e.preventDefault();
			if(confirm('Eksportér nuværende sortering til excel? Alle matchende poster medtages')){
				smamo_excel_export.ajax_export();
			}
		});
	}
});
