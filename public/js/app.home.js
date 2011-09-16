var App = App || {};
(function($) {
    App.Home = {
        init: function() {

        },
        
        quiz: function() {

            //Select anwser
            $('.answers').delegate('li', 'click', function(){
               
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
                    
                }
            });
        }
        
        
    };
})(this.jQuery);

