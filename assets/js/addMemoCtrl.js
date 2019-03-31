$(function(){
  //ページを読み込んだら、チェックボックスにクッキーの値を反映する
  if($.cookie("selected_deck")){
    console.log($.cookie("selected_deck"));
    var load_values = $.cookie("selected_deck").split(",");
 
    for(var i = 0; i < load_values.length; ++i){
      load_values[i] = decodeURIComponent(load_values[i]);
    }
    console.log(load_values);
    $(".deck-btn").each(function(){
      var $chkBox=$(this).find('.deckChk');
      $chkBox.checked = $.inArray($chkBox.val(), load_values) != -1;
      if($chkBox.checked){
        $(this).addClass('active');
        $chkBox.prop('checked',true);
      }
    });
  }

  //チェックを変えたらクッキーを保存するイベントを登録する
  $(".deckChk").change(function(){
    var save_values = [];
    
    $(".deckChk").each(function(){
        this.checked && save_values.push(encodeURIComponent(this.value));
    });

    $.cookie("selected_deck", save_values.join(","));
    console.log($.cookie("selected_deck"));
  });
  $("#debugForDeck").click(function(){
    $('.deckChk').each(function(){
      console.log(this.checked);
    })
  });
});
