;(function($) {
  var plugname = 'deckCtrl';
  var methods = {
    init : function(){
      console.log("plugin\"deckCtrl\" is available")
      return this;
    },
    saveCheckState : function(target){
      //クッキーに、チェックボックスのチェックの有無を保存
      var targetUcfirst = target.substring(0,1).toUpperCase() + target.substring(1);
      $("."+target+"-check-box").change(function(){
        var targetChkVal = [];
        var isChecked = false;
        var checkedCount = 0;
        $("."+target+"-check-box").each(function(){
          //このスコープ内ではthisはeachの各要素を指す・・・はず
          this.checked && targetChkVal.push(encodeURIComponent(this.value));
          if(this.checked){
            isChecked = true;
            ++checkedCount;
          }
        });
        $(".checkedNum"+targetUcfirst).text(checkedCount);
        $.cookie("selected_"+targetUcfirst,targetChkVal.join(","));
        console.log($.cookie("selected_"+targetUcfirst));//debug
        if(isChecked){
          $("."+target+"Card-btn").show();
        }else{
          $("."+target+"Card-btn").hide();
        }
      }); 
      return this;
    },
    loadCheckState : function(target){
      //クッキーの値を読み込んで、読み込み時にチェックボックスの状態を復活させる
      console.log("loadCheckState start. target-label="+target);
      if($.cookie("selected_"+target)){
        console.log($.cookie("selected_"+target));//debug
        var load_values = $.cookie("selected_"+target).split(",");
        
        for(var i = 0; i< load_values.length; ++i){
          load_values[i] = decodeURIComponent(load_values[i]);
        }
        console.log(load_values);//debug
      } 
      $("."+target+"-check-label").each(function(){
        var $chkBox=$(this).find("."+target+"-check-box");
        $chkBox.checked = $.inArray($chkBox.val(), load_values) != -1;
        if($chkBox.checked){
          $(this).addClass('active');
          $chkBox.prop('checked',true);
        }
      });
      return this;
    },
    confirmBtn : function(target){
      var checkedCount = 0;
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
