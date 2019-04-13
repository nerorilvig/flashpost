$(function(){
  //ページを読み込んだら、チェックボックスにクッキーの値を反映する
  $('div').deckCtrl();
  $('div').deckCtrl('loadCheckState','deck'); 
  //addとrmvの状態を再読み込み時に戻すかどうかは検討中。
  //却って煩雑になるかも。
  //$('div').deckCtrl('loadCheckState','add');
  //$('div').deckCtrl('loadCheckState','rmv');

  //チェックを変えたらクッキーを保存するイベントを登録する
  //各エェックボックスの状態をクッキーに保存しておく。
  $("div").deckCtrl('saveCheckState','deck');
  $("div").deckCtrl('saveCheckState','add');
  $("div").deckCtrl('saveCheckState','rmv');
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
});
