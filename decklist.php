<div class="card">
  <div class="card-body">
    <h5 class="card-title">@<?php echo "UserName"?></h5>
    <p>投稿したメモの数:<?php echo "100"?></p>
  </div>
  <p>デッキ一覧</p>
  <div class="list-group" >
    <?php for($i=1;$i<=20;$i++): ?>
        <li class="list-group-item">
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-outline-primary">
            <input class="setAdd-btn" id="<?php echo "deckid:".$i;?>" type="checkbox" name="<?php echo "デッキ$i"?>" checked autocomplete="off"> メモを追加
            </label>
          </div>
          <a class="" href="?state=Deck&decklist=<?php echo "デッキ$i";?>"><?php echo "デッキ$i"; ?></a>
          <p class="card-text">メモの数:<?php echo "xxx"; ?></p>
        </li>
     <?php endfor?>
  </div>
</div>
