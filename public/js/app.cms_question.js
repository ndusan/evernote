var App = App || {};
(function($) {
    App.Cms_question = {
        init: function() {
            
            //Set check on required fields
            $('body').delegate('form', 'submit', function(){
                var allOk = true;
                
                $('.jr').each(function(){
                    if($(this).val().length <= 0){
                        console.log($(this));
                        $(this).addClass('warning');
                        allOk = false;
                    }else{
                        $(this).removeClass('warning');
                    }
                });
                if(!allOk) return false;
            });
            
            //On change
            $('#level').change(function(){
                
                if($('select option:selected').attr('class') > 5){
                    //Hide 
                    $('#answerForm').hide();
                    $('#answerForm input[type="text"]').each(function(){
                        $(this).removeClass('jr');
                    });
                }else{
                    //Show
                    $('#answerForm').show();
                    $('#answerForm input[type="text"]').each(function(){
                        $(this).addClass('jr');
                    });
                }
            });
        },
        index: function() {
            
            //Set datatable
            $('#questionsTable').dataTable();
        }
    };
})(this.jQuery)