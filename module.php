
<?php //カード(メモ)のデータ格納と表示用メソッドを提供するクラス
class Card{
  private $cardID;
  private $textA;
  private $textB;
  private $userName;
  private $tags;

  public function __construct(int $cardID,string $textA, string $textB, string $userName, array $tags){
    //tagがなければtagsは空配列で渡すこと
    $this->cardID = $cardID;
    $this->textA = $textA;
    $this->textB = $textB;
    $this->userName = $userName;
    $this->tags = $tags;
  }
  public static function displayCardList(string $state, array $cardArr){
  ?>
  <?php
    //以下はデッキからのカード削除ボタン。jQueryで制御
    if($state=="Deck" && isset($_GET['decklist'])){
    ?>
      <div class="rmvCard-btn" style="display:none;">
        <button class="btn btn-warning">
          <span class="disableInMobile">表示中の</span>デッキから<span class="disableInMobile">選択中のカードを</span>削除
        </button>
        <span style="float:right;"><b class="selectedCardNumRmv"></b>枚<span class="disableInMobile">のカードを</span>選択中</span>
      </div>
    
    <?php
      echo '<h3>'.$_GET['decklist'].'を表示中</h3>';
    }else{
    //以下デッキへのカード追加ボタン。ブラウザ上での動作はjQueryで制御。
  ?>
      <div class="addCard-btn" style="display:none;">
        <button class="btn btn-primary"><span class="disableInMobile">選択したカードを</span>デッキに追加</button>
        <span style="float:right;"><b class="selectedCardNumAdd"></b>枚<span class="disableInMobile">のカードを</span>選択中</span>
      </div>
  <?php 
    }
    foreach($cardArr as $card){
      $card->displayCard($state);
    }
  }
  public function displayCard($state){
  //$stateだけクラス外から受け取る
    $cardID = $this->cardID;
    $textA = $this->textA;
    $textB = $this->textB;
    $userName = $this->userName;
    $tags = $this->tags;
    $memoID_A="memoTogglerA-".($cardID);
    $memoID_B="memoTogglerB-".($cardID);
?>
  <div class="card" id="cardId:<?php echo $cardID ?>"> 
    <ul style="list-style:none;padding:0px;">
      <li class="float-left">
      <?php
        //セレクトボックスの編集可否はphp側でuseridと照合して決定されるようにする
        //html&javascript側でenable/disableを制御するだけでは不十分。開発者ツールで書き換えられてしまう
        //これはメモの編集機能なども同様。useridが一致しなかった場合、不正な処理である旨を表示して戻すこと。
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
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-outline-warning rmv-check-label memo-btn">
            <input class="rmv-check-box" type="checkbox" autocomplete="off" name="rmvFromDeck" value="cardid-<?php echo $cardID;?>">
            <i class="fas fa-minus"></i><span class="disableInMobile">表示中のデッキから削除</span>
          <label>
        </div>
        <?php else:?>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-outline-primary add-check-label memo-btn">
            <input class="add-check-box" type="checkbox" autocomplete="off" name="addToDeck" value="cardid-<?php echo $cardID;?>">
            <i class="fas fa-plus"></i><span class="disableInMobile">デッキへ追加</span>
          <label>
        </div>
        <?php endif?>
      </li>
    </ul>
    <div class="card-body">
    <h5 class="card-title">@<?php echo $userName;?></h5>
    <button class="btn btn-primary w-100 disableInTablet disableInPC mobile-toggler" data-toggle="collapse" href="#<?php echo $memoID_A;?>">Aを表示/隠す</button>
      <div class="memo memo-a">
        <!--初期状態Aを表示するか、Ｂを表示するかは、ユーザにドロップダウンメニューで選ばせること-->
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
          <li style="float:left;"><a href="<?php echo "#"; //検索用のURLクエリを仕込む予定?>"><?php echo "#".$tag?></a>&nbsp</li>
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

<?php 
class Deck{
  private $deckName;
  private $deckID;
  private $numOfCards;

  public function __construct(string $deckName,int $deckID, int $numOfCards){
    $this->deckName=$deckName;
    $this->deckID=$deckID;
    $this->numOfCards=$numOfCards;
  }

  public static function displayDeckList(string $userName,array $deckArr){
    //最終的にはこのメソッド内でデータベースのアクセスをさせるべきか
?>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">DeckList</h5>
        <button id="#addDeck" class="btn btn-primary">デッキを新規作成</button>
      </div>
      <p>デッキ一覧</p>
      <div class="list-group" >
      <?php foreach($deckArr as $deck){
        $deck->displayDeck();
      } ?>
      </div>
    </div>
<?php
  }//function:displayDeckListの終点

  public function displayDeck(){
    $deckName=$this->deckName;
    $deckID=$this->deckID;
    $numOfCards=$this->numOfCards;
?>
    <li class="list-group-item">
      <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-outline-primary deck-check-label">
          <input class="deck-check-box" type="checkbox" autocomplete="off" name="deck-check-box" value="deckid-<?php echo $deckID;?>">メモを追加
        <label>
      </div>
      <a class="" href="?state=Deck&decklist=<?php echo $deckName;?>"><?php echo $deckName; ?></a>
      <p class="card-text">メモの数:<?php echo $numOfCards; ?></p>
    </li>
<?php
  }// function:displayDeckの終点
}// class:Deckの終点

class User{
  //pdoでデッキやカードのリストを検索できるようにしたい・・・
  private $userName;
  private $userID;
  private $numOfDecks;
  private $numOfCards;
  private $signUpDate;
  private $configSetting;

  public function __construct($userName,$userID,$numOfDecks,$numOfCards,$signUpDate){
    $this->userName=$userName;
    $this->userID=$userID;
    $this->numOfDecks=$numOfDecks;
    $this->numOfCards=$numOfCards;
    $this->sugnUpDate=$signUpDate;
  }

  public  function displayUserInfo(){
    $userName=$this->userName;
    $numOfDecks=$this->numOfDecks;
    $numOfCards=$this->numOfCards;
    $signUpDate=date('Y年m月d日 H:i',strtotime($this->signUpDate));
?>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">@<?php echo $userName;?></h5>
        <h6 class="card-subtitle"><?php echo $signUpDate;?>に利用を開始</h6>
        <br>
        <p class="card-text">これまで投稿したメモ<br />
        <?php echo $numOfCards;?>枚</p>
        <p class="card-text">デッキの数<br />
        <?php echo $numOfDecks;?></p>
      </div>
    </div>
<?php
  }//displayUserInfoの終点
}//UserInfoの終点

class Config{ //まだ暫定版。Configの項目は決まってない。
  private $config_1;
  private $config_2;
  private $config_3;

  public function __construct($userID){
    //PDOでmysqlから$userIDで検索かけてコンフィグのデータを呼び出して代入する     
    //とりあえず、ここではテスト用のデータを入れる
    $this->config_1=true;
    $this->config_2=false;
    $this->config_3=true;
  }

  public function displayConfig(){
    //Configの表示用メソッド。以下は暫定の処理
    $config_1=$this->config_1;
    $config_2=$this->config_2;
    $config_3=$this->config_3;
?>
  <div class="card-body">
    <h5 class="card-title">ユーザ設定</h5>
    <button class="btn btn-info">設定変更を反映する</button><br><br>
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
      <label class="btn btn-outline-primary <?php if($config_1){echo "active";} ?>">
         <input <?php if($config_1){echo "checked";}?> type="checkbox" autocomplete="off" name="config_1" value="<?php echo $config_1?>">Config_1
      </label>
    </div>
    <br>
    <br>
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
      <label class="btn btn-outline-primary <?php if($config_2){echo "active";} ?>">
         <input <?php if($config_2){echo "checked";}?> type="checkbox" autocomplete="off" name="config_2" value="<?php echo $config_2?>">Config_2
      </label>
    </div>
    <br>
    <br>
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
      <label class="btn btn-outline-primary <?php if($config_3){echo "active";} ?>">
         <input <?php if($config_3){echo "checked";}?> type="checkbox" autocomplete="off" name="config_3" value="<?php echo $config_3?>">Config_3
      </label>
    </div>
    <br>
    <br>
  </div>
<?php
  }//displayConfigの終点
}//Configの終点
?>

