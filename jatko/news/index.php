<?php


require "./partials/newsheader.php";
require "./database/newsdb.php";
require_once "./utils/helpers.php";

$pdo = connectDB();


$news = OrderNews($pdo);
?> <br>



<?php
if(isset($_SESSION["user_message"])) : ?>
     <p class="fumo" ><?=$_SESSION["user_message"]?></p>
<?php
  unset($_SESSION["user_message"]);
endif;

if(isset($_SESSION["user_fname"])) : ?>
  <p class="fumo" >Moro! <?=$_SESSION["user_fname"]?></p>
<?php
endif;

foreach ($news as $newsitem): ?>
 <h3><?=$newsitem["title"]?></h3> 
 <p><?=$newsitem["writerid"]?></p>
 <p><?=$newsitem["contentid"]?></p>
 <p><?=$newsitem["dateid"]?></p>

 <?php if(islogged() && $_SESSION["userid"] == $newsitem["userid"]): ?>
 <form method="POST" action="/news/deleteController.php">
 <input type="hidden" name="id" value="<?= $newsitem["newsid"]?>">
 <button>poista</button>
 </form>

 
<button> <a href="/news/updatearticle.php?id=<?= $newsitem['newsid']?>">Muokkaa</a></button>   <?php
 endif;
  endforeach;
  //cleandump($news);
?>
<?php
$expirydate = new DateTime();
//insertNews($pdo, "moro", "Jammu", "Kuinka", $expirydate->format("Y-m-d H:i:s"));

?>
<?php
require "../partials/footer.php";
?>






















