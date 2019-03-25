<div class="card">
  <div class="card-body">
    <h5 class="card-title">@<?php echo "UserName"?></h5>
    <p>投稿したメモの数:<?php echo "100"?></p>
  </div>
  <p>デッキ一覧</p>
  <div class="list-group" >
    <?php for($i=1;$i<=20;$i++): ?>
        <a class="list-group-item list-group-item-action\" href="?state=Search&search=<?php echo "デッキ$i";?>"><?php echo "デッキ$i"; ?></a> 
     <?php endfor?>
  </div>
</div>
