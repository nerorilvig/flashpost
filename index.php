<?php 
  //テスト用データをここに記述。DB設計は後回し
  ini_set('display_errors','OFF');//for debug (本番では削除)
  $state = $_GET['state'];
  if(($state!="Home" && $state!="PublicList" && $state!="Deck" && $state!= "UserInfo")||$state==""){
    $state="Home";
  }
  function isSelected($state,$str){
    if($state==$str){
      return "btn-primary";
    }else{
      return "btn-outline-primary";
    }
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>flashPost#<?php echo $state?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/fpost.css">
  <link rel="stylesheet" href="./assets/css/card.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
  <script src="./assets/js/addMemoCtrl.js"></script>
  <!-- width=device-widthは、ページ幅をデバイスの画面幅に合わせるように設定-->
  <!-- initial-scale=1は、ページがブラウザによって最初に読み込まれたときのズームレベル-->
  <!-- モバイルファースト設定-->
</head>
<body>
  <nav class="navbar fixed-top navbar-expand-lg" id="navtop" >
    <div class="nav-contents disableInMobile disableInTablet">
      <ul class="nav-btns">
        <li class="nav-btn-pc">
          <a href='?state=Home' class="btn <?php echo isSelected($state,"Home");?>">Home</a>
        </li>
        <li class="nav-btn-pc">
          <a href='?state=PublicList' class="btn <?php echo isSelected($state,"PublicList");?>">PublicList</a>
        </li>
        <li class="nav-search-pc">
          <div class="input-group" style="margin-top:5px; margin-left:10px;">
            <input type="text" class="form-control" placeholder="メモ・デッキ・タグ検索">
            <span class="input-group-btn">
              <button type="button" class="btn btn-primary" onclick="location.href='?state=Search'">
                <i class="fas fa-search text-light;"></i>検索
              </button>
            </span>
          </div>
        </li>
        <li class="logout-menu-pc" style="margin-left:20px;">
          <a href="#" class="btn btn-outline-secondary" style=" height:50px; width:100%;">logout</a></div>
        </li>
      </ul>
    </div>
    <div class="nav-contents disableInPC">
      <!--list-group-horizontalで水平リストグループにした方が良さそう-->
      <div class="input-group disableInPC" style="float:left;margin-top:5px;margin-left:10px;width:80%;">
        <input type="text" class="form-control" placeholder="メモ・デッキ・タグ検索">
        <span class="input-group-btn">
          <button type="button" class="btn btn-primary" onclick="location.href='?state=Search'">
            <i class="fas fa-search text-light;"></i><span class="disableInMobile">検索</span>
          </button>
        </span>
      </div>
      <a href="#" style="float:right;" class="logout-menu btn btn-outline-secondary disableInPC">logout</a>
      <ul class="nav-btns disableInPC" id="nav-mobile">
        <li class="nav-btn" id="navbtn1">
          <a href='?state=Home' class="btn <?php echo isSelected($state,"Home");?>">Home</a>
        </li>
        <li class="nav-btn" id="navbtn2">
          <a href='?state=PublicList' class="btn <?php echo isSelected($state,"PublicList");?>">PublicList</a>
        </li>
        <li class="nav-btn" id="navbtn3">
        <!--
          <a href="?state=Search" class="btn <?php// echo isSelected($state,"Search");?>">Search</a>
        -->
          <a href="?state=Deck" class="btn <?php echo isSelected($state,"Deck");?>">Deck</a>
        </li>
        <li class="nav-btn" id="navbtn4">
          <a href="?state=UserInfo" class="btn <?php echo isSelected($state,"UserInfo");?>">UserInfo</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="branks"><span></span></div>
  <div class="container-main">
    <div id="memo-list">
      <?php
        if($state=="Deck" && !isset($_GET['decklist'])){
          require "./decklist.php";
        }else{ 
          if($state=="Deck" && isset($_GET['decklist'])){
            echo '<h3>'.$_GET['decklist'].'を表示中</h3>';
          }
          for($num=1;$num<=100;$num++){
            require "./card.php";
          }
        }
      ?>
    </div>
    <div id="user-info" class="disableInMobile disableInTablet" style="overflow:scroll;">
      <?php
        require "./decklist.php";
      ?>
    </div>
    <button class="btn btn-info badge-pill post-btn" style="border:solid 3px white;"><i class="fas fa-pen"></i><span class="disableInMobile">投稿</span></button> 
  </div>
</body>
</html>
