<?php 
require_once $_SERVER['DOCUMENT_ROOT']."./utils/helpers.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/kaks.css">
    <title>Document</title>
</head>
<body>

<header>

<h1 class="juusto">alkeet demoja ja harjoituksia<h1>
  <nav>
    <ul>
    <li><img src="https://i.gifer.com/origin/50/50202d72e8055f3740f1a1029ec761b4_w200.gif"></li>
<h1>Tietonkantaharjoituksia</h1>
<nav>
    <ul>
        <li><a href="/">Pääsivu</a></li>
        <li><a href="/readnews">Uutiset</a></li>
        <li><a href="/game/index.php">Peli Tehtävät!</a></li>
        <?php if(islogged()): ?>
        <li><a href="/newarticle">Uusi Uutinen!</a></li>
        <li><a href="/logout">Kirjaudu Ulos!</a></li>
        <?php else: ?>
        <li><a href="/register">Rekisteröityminen!</a></li>
        <li><a href="/login">Kirjautuminen!</a></li>
        <?php endif; ?>
    </ul>
</nav>
</body>
</html>