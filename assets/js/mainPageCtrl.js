$(function(){
  //ページを読み込んだら、チェックボックスにクッキーの値を反映する
  $('div').deckCtrl();
  $('div').deckCtrl('loadCheckState','deck'); 
  //addとrmvの状態を再読み込み時にクッキーを反映するかどうかは検討中。
  //却って煩雑になるかも?
  //$('div').deckCtrl('loadCheckState','add');
  //$('div').deckCtrl('loadCheckState','rmv');

  //各エェックボックスの状態をクッキーに保存。
  $("div").deckCtrl('saveCheckState','deck');
  $("div").deckCtrl('saveCheckState','add');
  $("div").deckCtrl('saveCheckState','rmv');
  //選択中のメモを選択中のデッキに追加するボタン(設計中)
  $("div").deckCtrl('confirmBtn','add');
  $("div").deckCtrl('confirmBtn','rmv');
});
