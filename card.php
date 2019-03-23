<?php
  $memoID_A="memoTogglerA-".$num;
  $memoID_B="memoTogglerB-".$num;
  $memoTextA="this is A-".$num;
  $memoTextB="this is B-".$num;
  $userName="UserName";
?>
<div class="card" id="cardId:xxx"> <!--ここのidにはデータベース上でのカードIDを入れること-->
  <ul style="list-style:none;">
    <li class="float-right">
      <a class="btn btn-danger memo-btn" href="#"><i class="fas fa-times"></i><span class="disableInMobile">メモを削除</span></a>
    </li>
    <li class="float-right">
      <a class="btn btn-info memo-btn" href="#"><i class="fa fa-edit"></i><span class="disableInMobile">メモを編集</span></a>
    </li>
    <li class="float-right">
      <a class="btn btn-primary memo-btn" href="#"><i class="fas fa-plus"></i><span class="disableInMobile">デッキへ追加</span></a>
    </li>
  </ul>
  <div class="card-body">
  <h5 class="card-title">@<?php echo $userName;?></h5>
  <button class="btn btn-primary w-100 disableInTablet disableInPC" data-toggle="collapse" href="#<?php echo $memoID_A;?>">A</button>
    <div class="memo memo-a">
      <!--初期状態でのpタグのクラスがshowかcollapseかは、ユーザにドロップダウンメニューで選ばせること-->
      <!--カードの表示内容や表示形式はphp側で制御する-->
      <button class="btn btn-primary rounded-circle p-0 disableInMobile" data-toggle="collapse" href="#<?php echo $memoID_A;?>">A</button>
      <p class="<?php echo "show"?>" id="<?php echo $memoID_A?>">
        <?php
          echo $memoTextA;
        ?>
      </p>
    </div>
    <button class="btn btn-success w-100 disableInTablet disableInPC" data-toggle="collapse" href="#<?php echo $memoID_B;?>">B</button>
    <div class="memo memo-b">
    <button class="btn btn-success rounded-circle p-0 disableInMobile" data-toggle="collapse" href="#<?php echo $memoID_B;?>">B</button>
      <p class="<?php echo "collapse";?>" id="<?php echo $memoID_B;?>" >
        <?php
          echo $memoTextB;
        ?>
      </p>
    </div>
    <div class="tags">
      <h6 class="card-subtitle">Tags</h6>
      <ul style="list-style:none;">
        <li style="float:left;"><a href="#">#tag1</a>&nbsp</li>
        <li style="float:left;"><a href="#">#tag2</a>&nbsp</li>
        <li style="float:left;"><a href="#">#tag3</a>&nbsp</li>
      </ul>
    </div>
  </div>
</div>
