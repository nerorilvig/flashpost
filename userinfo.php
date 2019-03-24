<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>flashPost#<?php echo $state?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/fpost.css">
  <link rel="stylesheet" href="./assets/css/userinfo.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- width=device-widthは、ページ幅をデバイスの画面幅に合わせるように設定-->
  <!-- initial-scale=1は、ページがブラウザによって最初に読み込まれたときのズームレベル-->
  <!-- モバイルファースト設定-->
</head>
<body>
  <div class="branks"><span></span></div>
  <div class="container-main">
    <div id="memo-list" style="height:1000px;">
    </div>
    <!--以下を引用させる-->
    <div id="user-info" class="disableInMobile disableInTablet" style="overflow:scroll;">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">@<?php echo "UserName"?></h5>
        </div>
        <div class="list-group" >
          <?php
            for($i=1;$i<=20;$i++){
              echo "<a class=\"list-group-item list-group-item-action\" href=\""."?search=デッキ$i"."\">デッキ$i</a>";
            }
          ?>
          <!--
          <a class="list-group-item list-group-item-action" href="#">デッキ2</a>
          <a class="list-group-item list-group-item-action" href="#">デッキ3</a>
          <a class="list-group-item list-group-item-action" href="#">デッキ4</a>
          <a class="list-group-item list-group-item-action" href="#">デッキ5</a>
          <a class="list-group-item list-group-item-action" href="#">デッキ6</a>
          <a class="list-group-item list-group-item-action" href="#">デッキ7</a>
          <a class="list-group-item list-group-item-action" href="#">デッキ8</a>
          <a class="list-group-item list-group-item-action" href="#">デッキ9</a>
          <a class="list-group-item list-group-item-action" href="#">デッキ10</a>
          <a class="list-group-item list-group-item-action" href="#">デッキ11</a>
          <a class="list-group-item list-group-item-action" href="#">デッキ12</a>
          <a class="list-group-item list-group-item-action" href="#">デッキ13</a>
          <a class="list-group-item list-group-item-action" href="#">デッキ14</a>
          <a class="list-group-item list-group-item-action" href="#">デッキ15</a>
          <a class="list-group-item list-group-item-action" href="#">デッキ16</a>
          <a class="list-group-item list-group-item-action" href="#">デッキ17</a>
          <a class="list-group-item list-group-item-action" href="#">デッキ18</a>
          <a class="list-group-item list-group-item-action" href="#">デッキ19</a>
          -->
        </div>
        <!--
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Flash list 1</li>
          <li class="list-group-item">Flash list 2</li>
          <li class="list-group-item">Flash list 3</li>
        </ul>
        -->
      </div>
    </div>
    <!--以上を引用させる-->
  </div>
</body>
</html>
