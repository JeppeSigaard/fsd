var smamo_front_excel_export = {
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

    ajax_export : function(url){

        $.ajax({
            type: "POST",
            url: url,
            data: {
                    post_type: 'medlem',
                    action: 'smamo_excel_export'
                  },
            success: function(response){
                if(response.file){

                    window.location.href = response.file;

                }
            },
            dataType: 'json'
        });
    },
};

$(function(){
    
    $('a.excel-export').click(function(e){
        var target = $(e.target),
            url = $('meta[name=site_url]').attr('content') + '/wp-admin/admin-ajax.php';
        smamo_front_excel_export.ajax_export(url); 
    });
    
});