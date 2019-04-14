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
      var targetUcfirst = target.substring(0,1).toUpperCase() + target.substring(1);
      //クッキーの値を読み込んで、ページ表示後にチェックボックスの状態を復活させる
      console.log("loadCheckState start. target-label="+target);
      if($.cookie("selected_"+targetUcfirst)){
        console.log($.cookie("selected_"+targetUcfirst));//debug
        var load_values = $.cookie("selected_"+targetUcfirst).split(",");
        
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
      if(target!='add'&& target!='rmv'){
        console.log('confirmBtn Error: target is wrong. current target is \"'+target+'\"');
        return this;
      }
      $("."+target+"Card-btn").find('button').click(function(){
        console.log(target+"CardBtn clicked");
        var checkedCount=0;
        var checkedMemos = [];
        var alertText1 ={add:'選択中',rmv:'表示中'}
        var alertText2 ={add:'に追加',rmv:'から削除'}
        $("."+target+"-check-label").each(function(){
          var $chkBox=$(this).find("."+target+"-check-box");
          if($chkBox.prop("checked")){
            //ここでチェックのついたメモの配列を作成
            //php側に渡せるようにしておく。
            checkedCount++;
            checkedMemos.push($chkBox.val());
          }
          $(this).removeClass("active");
          $chkBox.prop("checked",false);
        });
        alert(checkedCount+"枚のカードを"+alertText1[target]+"のデッキ"+alertText2[target]+"しました");
        console.log(checkedMemos);//debug
        $("."+target+"Card-btn").hide();
      });
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
