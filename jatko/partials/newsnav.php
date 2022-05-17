<?php 
require_once $_SERVER['DOCUMENT_ROOT']."./utils/helpers.php";
?>
  <?php if(islogged()): ?>
        <li><a href="/newarticle">Uusi Uutinen!</a></li>
        <li><a href="/logout">Kirjaudu Ulos!</a></li>
        <?php else: ?>
        <li><a href="/register">Rekisteröityminen!</a></li>
        <li><a href="/login">Kirjautuminen!</a></li>
        <?php endif; ?>