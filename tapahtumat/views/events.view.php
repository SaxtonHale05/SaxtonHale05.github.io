<?php require "partials/header.php"; 

?>

<p>What type of events would you like to see?</p>
<p>The number correlates to the name of the event!</p>
<?php
    foreach($alltypes as $typeitem): ?>
<h3 class="typpi"><?=$typeitem["nimi"]?> <?=$typeitem["ID"]?></h3>

<?php endforeach; ?>

<form method="POST" action="/event_search" class="selektio">
  <select name="tyyppi">
    <?php $tyyppi = geteventtype(); 
    foreach ($tyyppi as $t) { ?>
      <option value="<?=$t["ID"]?>"><?=$t["nimi"]?></option>
    <?php } ?>
  </select>
  <input class="buddon" type="submit">
    </form>
<div class="kloro">
<?php
    foreach($allevents as $eventitem): ?>
        <div class="lista">
        <h3><?=$eventitem["nimi"] ?></h3>
        <p><?=$eventitem["kuvaus"]?></p>
        <p><?=$eventitem["typeid"]?></p>
        <p>lähiosoite. <?=$eventitem["lähiosoite"]?></p>
        <p>postiosoite. <?=$eventitem["postiosoite"]?></p>
        <p>postitoimipaikka. <?=$eventitem["postitoimipaikka"]?></p>
        <p>Osallistujen max määrä. <?=$eventitem["amount"]?></p>
        <br>
        <p><?=$eventitem["päiväys"]?> by user: <?=$eventitem["yhteyshenkilöID"]?></p>
    



        <?php if(isLoggedIn() && ($eventitem["yhteyshenkilöID"] == $_SESSION["userid"])): ?>
            <form method="POST" action="/delete_event">
            <input type="hidden" name="id" value="<?= $eventitem["tapahtumaID"]?>">
            <button class="buddon">poista &#10006</button>
            </form>

            <button class="buddon"> <a href="/update_event?id=<?=$eventitem['tapahtumaID']?>">Muokkaa &#9999</a></button>
     
        <?php endif; ?>
        <?php $e = getinvited($eventitem["tapahtumaID"]); 
        if ($eventitem["amount"] > $e["Max"]): ?>
        <form method="POST" action="/join_event">
            <input type="hidden" name="eventID" value="<?= $eventitem["tapahtumaID"]?>">
            <button class="buddon">Join the event &#10145</button>
            </form>
        <?php endif; ?>
        </div>
    <?php endforeach; ?>
        </div>
</div>

<?php require "partials/footer.php"; ?>
