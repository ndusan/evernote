var App = App || {};
(function($) {
    App.Home = {
        init: function() {

        },
        
        quiz: function() {

            //Select anwser
            $('#jquiz').delegate('.answers li', 'click', function(){
               
               var currInput = $(this).find('input');
               
               $('.answers li').each(function(){
                  if($(this).find('input').val() != currInput.val()){
                      $(this).removeClass('selected').find('input').attr('checked');
                  }else{
                      $(this).addClass('selected').find('input').attr('checked', 'checked');
                  }
               });
            });
            
            //Request to post 
            $('#jquiz').delegate('form', 'submit', function(e){
                e.preventDefault();
                var allOk = false;
                
                //Process only if one answer selected
                $('input[type=radio]').each(function(){
                    if($(this).attr('checked')) allOk = true;
                });
                
                if(allOk){
                    $.ajax({
                        type:       'POST',
                        url:        $(this).attr('action')+'.json',
                        dataType:   'html',
                        data:       $(this).serialize(),
                        beforeSend: function() {
                            $('#jquiz').addClass('loader');
                        },
                        success:    function(response){
                            $('#jquiz').removeClass('loader').html(response);
                        }
                    });
                }else{
                    //Non answers was selected
                    $('#c1').show();
                }
            });
        },
        
        form: function() {
            $('#jquiz').delegate('form', 'submit', function(){
                
                var allOk = true, c1 = false, c2 = false;
                var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                //Default
                $('#c1').hide();
                $('#c2').hide();
                
                $('.r').each(function(){
                    if($(this).val().length <=0 || reg.test($('#email').val()) == false){
                        allOk = false;
                        c1 = true;
                    }
                });
                if(allOk && ($('#tac').attr("checked") == "undefined" || $('#tac').attr("checked") != "checked")){
                    allOk = false;
                    c2 = true;
                }
                
                if(c1){
                    $('#c2').hide();
                    $('#c1').show();
                }
                if(c2){
                    $('#c1').hide();
                    $('#c2').show();
                }
                
                if(!allOk) return false;
            });
        },
        
        extra: function() {
            $('#jquiz').delegate('form', 'submit', function(){
                var allOk = true; 
                
                $('.r').each(function(){
                    if($(this).val().length <= 0){
                        allOk = false;
                        $('#c1').show();
                    }
                });
                
                if(!allOk) return false;
            });
        },
        
        score: function() {
            
            
        }
        
        
    };
})(this.jQuery);

