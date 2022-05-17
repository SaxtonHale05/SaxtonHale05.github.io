<?php require "partials/header.php"; ?>

<h2 class="centered">Edit your event</h2>
<pre>
<div class="inputarea">
<form  action="/update_event" method="post" >
    <label for="title">Name of the event:</label>
    <input id="title" type="text" name="eventname" maxlength=30 value="<?=$name?>">
    <label for="text">Description of the event:</label>
    <textarea id="text" name="desc" rows="5" cols="30"><?=$text?></textarea>     
    <label for="date">Type of the event</label>
    <input id="date" type="text"  name="eventtype" value=<?=$type?>> 
    <label for="rdate">The address off the event:</label>
    <input id="rdate" type="text" name="eventaddress" value=<?=$address?>>
    <label for="xdate">Postal address of the event:</label>
    <input id="xdate" type="text" name="postaddress" value=<?=$postaddress?>>
    <label for="ydate">The postal place of the event:</label>
    <input id="ydate" type="text" name="postplace" value=<?=$postplace?>>
    <label for="zdate">date:</label>
    <input id="zdate" type="date" name="date" value=<?=$date?>>


    <input type="hidden" id="id" name="tapahtumaID" value=<?=$tapahtumaid?>>
    <input class="buddon" id="sendbutton" type="submit" value="Lähetä">
</form>
</div>
</pre>
<h3> Lista Osallistujista! </h3>
<?php
    foreach($oll as $ol): ?>
<div class="lista">
        <h3><?=$ol["nimi"] ?></h3>

        <form method="POST" action="/delete_crew">
            <input type="hidden" name="ilmoittautuminenID" value="<?= $ol["ilmoittautuminenID"]?>">
            <button class="buddon">poista</button>
            </form>





    </div>
    <?php endforeach; ?>
<?php require "partials/footer.php"; ?>