
<?php //カード(メモ)のデータ格納と表示用メソッドを提供するクラス
class Card{
  private $card_ID;
  private $textA;
  private $textB;
  private $userName;
  private $tags;

  public function __construct(int $card_ID,string $textA, string $textB, string $userName, array $tags){
    //tagがなければtagsは空配列で渡すこと
    $this->card_ID = $card_ID;
    $this->textA = $textA;
    $this->textB = $textB;
    $this->userName = $userName;
    $this->tags = $tags;
  }

  public function displayCard($state){
  //$stateだけ外部から受け取る
    $card_ID = $this->card_ID;
    $textA = $this->textA;
    $textB = $this->textB;
    $userName = $this->userName;
    $tags = $this->tags;
    $memoID_A="memoTogglerA-".($card_ID);
    $memoID_B="memoTogglerB-".($card_ID);
?>
  <div class="card" id="cardId:<?php echo $card_ID ?>"> 
    <ul style="list-style:none;padding:0px;">
      <li class="float-left">
      <?php
        //セレクトボックスの編集可否はphp側でuseridと照合して決定されるようにする
        //html&javascript側でenable/disableを制御するだけでは不十分。開発者ツールで書き換えられてしまう
        //これはメモの編集機能なども同様。idが一致しなかった場合、その旨を表示して戻すこと。
      ?>
        <select disabled class="custom-select" >
          <option selected="notPublic">非公開</option>
          <option value="Public">公開</option>
        </select>
      </li>
      <li class="float-right">
        <a class="btn btn-danger memo-btn" href="#"><i class="fas fa-times"></i><span class="disableInMobile">メモを削除</span></a>
      </li>
      <li class="float-right">
        <a class="btn btn-info memo-btn" href="#"><i class="fa fa-edit"></i><span class="disableInMobile">メモを編集</span></a>
      </li>
      <li class="float-right">
        <?php if($state=="Deck"):?>
        <a class="btn btn-warning memo-btn" href="#"><i class="fas fa-minus"></i><span class="disableInMobile">表示中のデッキから削除</span></a>
        <?php else:?>
        <a class="btn btn-primary memo-btn" href="#"><i class="fas fa-plus"></i><span class="disableInMobile">デッキへ追加</span></a>
        <?php endif?>
      </li>
    </ul>
    <div class="card-body">
    <h5 class="card-title">@<?php echo $userName;?></h5>
    <button class="btn btn-primary w-100 disableInTablet disableInPC mobile-toggler" data-toggle="collapse" href="#<?php echo $memoID_A;?>">Aを表示/隠す</button>
      <div class="memo memo-a">
        <!--初期状態でのpタグのクラスがshowかcollapseかは、ユーザにドロップダウンメニューで選ばせること-->
        <!--カードの表示内容や表示形式はphp側で制御する-->
        <button class="btn btn-primary rounded-circle p-0 disableInMobile" data-toggle="collapse" href="#<?php echo $memoID_A;?>">A</button>
        <p class="<?php echo "show"?>" id="<?php echo $memoID_A?>">
          <?php echo $textA;?>
        </p>
      </div>
      <button class="btn btn-success w-100 disableInTablet disableInPC mobile-toggler" data-toggle="collapse" href="#<?php echo $memoID_B;?>">Bを表示/隠す</button>
      <div class="memo memo-b">
      <button class="btn btn-success rounded-circle p-0 disableInMobile" data-toggle="collapse" href="#<?php echo $memoID_B;?>">B</button>
        <p class="<?php echo "collapse";?>" id="<?php echo $memoID_B;?>" >
          <?php echo $textB;?>
        </p>
      </div>
      <div class="tags">
        <h6 class="card-subtitle">Tags</h6>
        <ul style="list-style:none;">
        <?php if(!empty($tags)):?>
          <?php foreach($tags as $tag) :?>
          <li style="float:left;"><a href="<?php echo "#"; //検索用のクエリを仕込む予定?>"><?php echo $tag?></a>&nbsp</li>
          <?php endforeach?>
        <?php endif?>
        </ul>
      </div>
    </div>
  </div>
<?php
  } //function:displayCardの終点
} //class:Cardの終点
?>

