(function(){
  //ページを読み込んだら、チェックボックスにクッキーの値を反映する
  //$('body').deckCtrl('saveCheckState',) 
  if($.cookie("selected_deck")){
    console.log($.cookie("selected_deck"));
    var load_values = $.cookie("selected_deck").split(",");
 
    for(var i = 0; i < load_values.length; ++i){
      load_values[i] = decodeURIComponent(load_values[i]);
    }
    console.log(load_values);
    $(".deck-check-label").each(function(){
      var $chkBox=$(this).find('.deck-check-box');
      $chkBox.checked = $.inArray($chkBox.val(), load_values) != -1;
      if($chkBox.checked){
        $(this).addClass('active');
        $chkBox.prop('checked',true);
      }
    });
  }

  //チェックを変えたらクッキーを保存するイベントを登録する
  //保存先のデッキ選択
  $(".deck-check-box").change(function(){
    var deckChkVal = [];
    
    $(".deck-check-box").each(function(){
      this.checked && deckChkVal.push(encodeURIComponent(this.value));
    });

    $.cookie("selected_deck", deckChkVal.join(","));
    console.log($.cookie("selected_deck"));
  });
  //デッキに保存するメモ選択
  $(".add-check-box").change(function(){
    var addChkVal = [];
    var isChecked = false;
    var checkedCount = 0;
    $(".add-check-box").each(function(){
      this.checked && addChkVal.push(encodeURIComponent(this.value)); 
      if(this.checked){
        isChecked = true;
        ++checkedCount;
      }
    });
    $('.selectedCardNumAdd').text(checkedCount);
    $.cookie("selected_Addcard", addChkVal.join(","));
    console.log($.cookie("selected_Addcard"));
    if(isChecked){
      $('.addCard-btn').show();
    }else{
      $('.addCard-btn').hide();
    }
  });
  //選択中のメモを選択中のデッキに追加するボタン(設計中)
  $(".addCard-btn").find('button').click(function(){
    console.log("addCardBtn clicked");
    var checkedCount = 0;
    $(".add-check-label").each(function(){
      var $chkBox=$(this).find('.add-check-box');
      console.log(this.checked);
      $(this).removeClass('active');
      $chkBox.prop('checked',false);
    });
    $(".addCard-btn").hide();
  });
  //デッキから削除するメモ選択
  $(".rmv-check-box").change(function(){
    var rmvChkVal = [];
    var isChecked = false;
    var checkedCount = 0;
    $(".rmv-check-box").each(function(){
      this.checked && rmvChkVal.push(encodeURIComponent(this.value)); 
      if(this.checked){
        isChecked = true;
        ++checkedCount;
      }
    });

    $.cookie("selected_Rmvcard", rmvChkVal.join(","));
    console.log($.cookie("selected_Rmvcard"));
    $('.selectedCardNumRmv').text(checkedCount);
    if(isChecked){
      $('.rmvCard-btn').show();
    }else{
      $('.rmvCard-btn').hide();
    }
  });
});
