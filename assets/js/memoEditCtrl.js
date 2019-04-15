;(function($) {
  var plugname = 'memoCtrl';
  var methods = {
    init : function(){
      console.log("plugin\"memoCtrl\" is available")
      return this;
    },
    post-btn : function(){
      return this;
    },
    edit-btn : function(){
      return this;
    }
    del-btn : function(){
      return this;
    }
  };

  $.fn[plugname] = function(method) {
    if ( methods[method] ) {
      return methods[ method ]
        .apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof method === 'object' || ! method ) {
      return methods.init.apply( this, arguments );
    } else {
      $.error( 'Method ' +  method + ' does not exist on jQuery.' + plugname );
      return this;
    }
  };
})(jQuery);
