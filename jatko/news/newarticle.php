<?php
require "./partials/newsheader.php";
require "./database/newsdb.php";
require_once "./utils/helpers.php";

$pdo = connectDB();


$typpi = getTypes($pdo);
?>


<form method="post" action="/news/insertController.php">
  <select name="tyypit">
    <?php foreach ($typpi as $t) { ?>
      <option value="<?=$t["id"]?>"><?=$t["name"]?></option>
    <?php } ?>
  </select>

<br>
kirjuri: <input type="text" name="kirjuri">
<br>
<br>
Titteli: <input type="text" name="titteli">
<br>
Tiedot: <input type="text" name="tiedot">
<br>
PVM: <input type="date" name="pvm">
<br>
P-PVM:<input type="date" name="ppvm">
<br>
<input type="submit">

</form>

<?php
require "../partials/footer.php";
?>