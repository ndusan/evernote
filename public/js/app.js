var App = App || {};
(function($) {
    App.Common = {
        init: function() {
            
            $('.jw').click(function(){
                var answer = confirm ("Are you sure you want to delete this line?");
                if (!answer) return false;
            });
            
            $('.jlogout').click(function(){
                var answer = confirm ("Are you sure you want to logout?");
                if (!answer) return false;
            });
        }
        
    };
})(this.jQuery);