<?php


require "./partials/newsheader.php";
require "./database/newsdb.php";
require_once "./utils/helpers.php";

$pdo = connectDB();
?> 

<?php if(isset($_SESSION["user_error"])) : ?>
     <p><?=$_SESSION["user_error"]?></p>
<?php
  unset($_SESSION["user_error"]);
endif; ?>

<form method="POST" action="/login">
<br>
<input type="text" id="koo" name="Ktunnus" required>
<label for="koo">Käyttäjä tunnuksesi: </label>
<br>
<input type="password" id="nee" name="salasana" required>
<label for="nee">Salasanasi: </label>
<br>
<button type="submit">Lähetä </button>
</form>
