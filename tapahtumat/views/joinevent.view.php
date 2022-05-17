<?php require "partials/header.php"; ?>

<h2 class="centered">Join the event you picked!</h2>

<?php
$tapah = getevent($id);?>

 <div class="lista">
        <h3><?=$tapah["tapanimi"] ?></h3>
        <p>tapahtuman ID: <?=$tapah["tapahtumaID"]?></p>
        <p><?=$tapah["kuvaus"]?></p>
        <p><?=$tapah["lähiosoite"]?></p>
        <p><?=$tapah["postiosoite"]?></p>
        <p><?=$tapah["postitoimipaikka"]?></p>
        <p><?=$tapah["päiväys"]?> by user: <?=$tapah["nimi"]?></p>
        <br>
        <p>Tapahtuman pitäjän tiedot:</p>
        <p><?=$tapah["yritys"]?></p>
        <p><?=$tapah["sähköposti"]?></p>
</div>
<br>


<h2 class="centered">Join the Event, please fill this sheet.</h2>

<div class="inputarea">
<form  action="/event_sheet" method="post">
    <label for="fname">Nimesi:</label> 
    <input id="fname" type="text" name="name" maxlength=30>
    <label for="puh">Puhelinnumerosi</label>         
    <input id="puh" type="text" name="phone" maxlength=30>
    <label for="em">Sähköpostisi:</label>
    <input id="em" type="text" name="email" maxlength=30>
    <label for="tee">Lisätietoja (pistä - jos ei ole lisätietoja annettavana)</label>
    <textarea id="tee" name="addon" rows="5" cols="30"></textarea>
    <label for="eveid">Tapahtuman ID:</label> 
    <input id="eveid" type="text" name="ID" maxlength=30>
    <label for="datt">ilmoittautumisen päiväys</label> 
    <input id="datt" type="date" name="date" maxlength=30>
    <input class="buddon" id="sendbutton" type="submit" value="Lähetä">
    
</form>
</div>

<?php require "partials/footer.php"; ?>







































<?php require "partials/footer.php"; ?>