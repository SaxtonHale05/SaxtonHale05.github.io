<?php

require "../partials/headerP.php";
require "../database/gamedb.php";
require "../utils/helpers.php";

?> <h2><?php $wat = connectDB(); ?> </h2>


<form method="POST" class="formi" action="/game/inserterc.php">
    <input id="eka" type="text" name="luokka">
<label class="isot" for="eka">Ilmoita Hahmosi luokka. esim. Jousiampuja</label><br>
    <button class="button button1" type="submit">TULTA!</button>
</form>

<form method="POST" class="formi" action="/game/insertR.php">
    <input id="eka" type="text" name="rotu">
<label class="isot" for="eka">Ilmoita Hahmosi Rotu. esim. hiisi</label><br>
    <button class="button button1" type="submit">TULTA!</button>
</form>


<?php 
$class = getClass($wat);
?>

<ul id="toka" class="lista">
<h2 class="listanI">Lista Luokista</h2>
<?php foreach ($class as $cl): ?>
    <li><h3><?=$cl["name"]?></h3></li>

    <form method="POST" action="/game/deleterc.php">
        <button class="button1">poista</button>
        <input type="hidden" name="id" value="<?=$cl['classid']?>"/>
    </form>
<?php endforeach; ?>
</ul>


<?php 
$race = getRace($wat);
?>
<ul id="toka" class="lista">
<h2 class="listanI">Lista Roduista</h2>
<?php foreach ($race as $rl): ?>
    <li><h3><?=$rl["name"]?></h3></li>

    <form method="POST" action="/game/deleteR.php">
        <button class="button1">poista</button>
        <input type="hidden" name="id" value="<?=$rl['raceid']?>"/>
    </form>
<?php endforeach; ?>
</ul>  
<br>
<br>
<br>

<h1>Hahmosi luonti</h1>
<form method="POST" action="/game/charinsert.php">
<label for="kol" class="lab">Luokkasi</label>
<select id="kol" name="luokka" class="formit">
    <?php foreach ($class as $lol) { ?>
      <option value="<?=$lol["classid"]?>"><?=$lol["name"]?></option>
    <?php } ?>
  </select><br>

  <label for="nel" class="lab">Rotusi</label>
  <select id="nel" name="rotu" class="formit">
    <?php foreach ($race as $tr) { ?>
      <option value="<?=$tr["raceid"]?>"><?=$tr["name"]?></option>
    <?php } ?>
  </select>

  <br>
  <label for="vis" class="lab">Nimesi</label>
  <input type="text" name="nimi" id="vis">
  <br>
  <label for="kus" class="lab">Hahmosi kuva (url)</label>
  <input type="text" name="kuva" id="kus">

  <input type="submit" class="button1">
</form>
 


<?php $mychar = getchar($wat); ?>
<?php foreach ($mychar as $ed): ?>

<div class="grid-container">
  <div class="grid-item">
    <h3>Name: <?=$ed["ch_name"]?></h3> 
      <h3><?=$ed["cl_name"]?></h3> 
         <h3><?=$ed["rc_name"]?></h3> 
        <h3>Dexterity: <?=$ed["dexterity"]?></h3> 
      <h3>Strenght: <?=$ed["strenght"]?></h3> 
    <h3>Wisdom: <?=$ed["wisdom"]?></h3> 
    <div class="box">
                      <?php
                if (empty($ed["chimage"])) {
                  echo "<h3>" . "Ei kuvaa vielä" . "</h3>";
                } else {
                $image = $ed["chimage"];
                $imageData = base64_encode(file_get_contents($image));
                echo '<img src="data:image/jpeg;base64,'.$imageData.'">'; }
                ?>
      </div>
    <button> <a href="/game/change.php?characterid=<?= $ed['characterid']?>">Muokkaa</a></button>
  </div>
</div>
<?php endforeach; ?>