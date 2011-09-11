var App = App || {};
(function($) {
    App.Home = {
        init: function() {

        },
        
        quiz: function() {

            //Request to post 
            $('#quiz').delegate('form', 'submit', function(e){
                e.preventDefault();
                var allOk = false;

                //Proces only if one answer selected
                $('input[type=radio]').each(function(){
                    if($(this).is(':checked')) allOk = true;
                });
                
                if(allOk){
                    $.ajax({
                        type:       'POST',
                        url:        $(this).attr('action')+'.json',
                        dataType:   'html',
                        data:       $(this).serialize(),
                        beforeSend: function() {
                            $('#quiz').addClass('loader');
                        },
                        success:    function(response){
                            $('#quiz').removeClass('loader').html(response);
                        }
                    });
                }else{
                    //Non answers was selected
                    
                }
            });
        }
        
        
    };
})(this.jQuery);

