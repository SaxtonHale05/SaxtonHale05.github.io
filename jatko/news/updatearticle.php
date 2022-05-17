<?php

require "./partials/newsheader.php";
require "./database/newsdb.php";
require_once "./utils/helpers.php";

if(isset($_GET['id'])){
   $id = sanit($_GET['id']);
   $pdo = connectDB();
  $article = getArticle($pdo, $id);
?>






<form method="post" action="/news/updatepostController.php">
Otsikko: <input type="text" name="eka" value="<?=$article['title']?>"/>
<br>
Kirjoittaja: <input type="text" name="toka" value="<?=$article['contentid']?>"/>
<br>
Poisto-PVM:<input type="date" name="kolmas" value="<?=$article['expirydateid']?>"/>
<br>
<input type="hidden"  name="id" value="<?=$article['newsid']?>"/>
<input type="submit">
</form>

<?php
}
?>















<?php
require "../partials/footer.php";
?>