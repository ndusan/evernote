var App = App || {};
(function($) {
    App.Login = {
        init: function() {
            
            //Set check on required fields
            $('body').delegate('form', 'submit', function(){
                var allOk = true;
                
                $('.jr').each(function(){
                    if($(this).val().length <= 0){
                        $(this).addClass('warning');
                        allOk = false;
                    }else{
                        $(this).removeClass('warning');
                    }
                });
                
                if(!allOk) return false;
            });
        }
    };
})(this.jQuery)