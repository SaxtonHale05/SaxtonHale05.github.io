<?php
require "../partials/headerP.php";
require "../database/gamedb.php";
require "../utils/helpers.php";

?>
 <h2><?php $wat = connectDB(); ?> </h2>


<?php if(isset($_GET['characterid'])){
   $charid = sanit($_GET['characterid']);
   $wat = connectDB();
  $char = getonecha($wat, $charid);
  $class = getclass($wat);
  $race = getrace($wat);
?>

<form method="POST" action="/game/charControl.php">
<label for="kol" class="lab">Luokkasi</label>
<select id="kol" name="luokka" class="formit">
    <?php foreach ($class as $lool) { ?>
      <option value="<?=$lool['classid']?>"> <?=$lool["name"]?> </option>
    <?php } ?>
  </select><br>
  <label for="nel" class="lab">Rotusi</label>
  <select id="nel" name="rotu" class="formit">
    <?php foreach ($race as $tr) { ?>
      <option value="<?=$tr["raceid"]?>"> <?=$tr["name"]?> </option>
    <?php } ?>
    
  </select>
  <br>
  <label for="vis" class="lab">Nimesi</label>
  <input type="text" name="nimi" id="vis">
  <input type="hidden"  name="id" value="<?=$char['characterid']?>"/>
  <br>
  <label for="kus" class="lab">Hahmosi kuva (url)</label>
  <input type="text" name="kuva" id="kus">
  <input type="submit" class="button1" name="Submit1">
</form>
    






















<?php
} else echo "peskjfn";

?>