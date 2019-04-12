(function($){
  //デッキへのメモの追加削除に関するチェックボックスやボタンの制御をするプラグイン
  //$('セレクタ').deckctrl('メソッド名',引数1,引数2,...)という形で呼び出す
  var methods = {
    init : function(){
      return this;
    },
    //以下関数で利用するtargetは、deck,add,rmvいずれか
    saveCheckState : function(target){
      //クッキーに、チェックボックスのチェックの有無を保存
      $("."+target+"-check-box").change(function(){
        var targetChkVal = [];
        $("."+target+"-check-box").each(function(){
          //このスコープ内ではthisはeachの各要素を指す・・・はず
          this.checked && targetChkVal.push(encodeURIComponent(this.value));
        });
        $.cookie("selected_"+target,targetChkVal.join(","));
        console.log($.cookie("selected_"+target));//debug
      }); 
    },
    loadCheckState : function(target){
      //クッキーに保存したチェックボックスのチェック状況を復元する
      if($.cookie("selected_"+target)){
        console.log($.cookie("selected_"+target));//debug
        var load_values = $.cookie("selected_"+target).split(",");
        
        for(var i = 0; i< load_values.length; ++i){
          load_values[i] = decodeURIComponent(load_values[i]);
        }
        console.log(load_values);//debug
      } 
      $("."+target+"-check-label").each(function(){
        var $chkBox=$(this).find('.')
      })
    }
    revisionDeck : function(target){
    }
  }
  $.fn.deckCtrl = function(method){
    if(methods[method]){
      return methods[method].apply( this, Array.prototype.slice.call(arguments, 1 ));
    }else if (typeof method === 'object' || ! method){
      return methods.init.apply( this,arguments );
    }else{
      $.error('Method' + method + ' does not exist on jQuery.deckCtrl');
    }
  };
})(jQuery);
