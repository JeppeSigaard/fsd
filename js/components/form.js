
var checkSuccess = function(target){
    
    if(target.val() === ''){

        
            target.removeClass('success').next('label').removeClass('stayup');
            
        }
    
    else if(target.is('input[type="checkbox"], input[type="radio"]')){console.log('not valid field type');}
    
    else{
        
        target.addClass('success').next('label').addClass('stayup');
    }

}

var validateEmail = function(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

var formJsInit = function(){
    
    $('form input, form textarea').each(function(){
        checkSuccess($(this));
    });
    
    //autosize($('form textarea:not(.no-autosize)'));

    // Check for allerede udfyldt felter ved sideload
    $('form input, form textarea').each(function(){
        var target = $(this);
        checkSuccess(target);
    });
    
    // Kosmetisk opdatering ved blur
    $('form input, form textarea').off().on('blur',function(e){
        var target = $(e.target);
        
        // Fjern error
        target.removeClass('error');
        
        // Check om feltet er tomt
        checkSuccess(target);
        
        if(target.is('input[type="email"]') && target.val() !== ''){
        
            if(!validateEmail(target.val())){
            
                target.addClass('error');
            }
            
        
        }

    });
    
    // Keyup validering
    $('form').off().on('keyup',function(e){
    
        var target = $(e.target);
        
        // Fjern error og success
        target.removeClass('error').removeClass('success');
        
        if(target.is('input[type="number"]')){
        
            var value = target.val().replace(/[^0-9]/g, '');
            
            target.val(value);
        
        }
        
    })

}

$(function(){
    
    formJsInit();
    
});