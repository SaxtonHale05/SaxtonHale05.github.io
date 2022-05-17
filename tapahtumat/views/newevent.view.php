<?php require "partials/header.php"; ?>

<h2 class="centered">Insert an event</h2>


<div>
<form action="/add_type" method="post">
<label for="new">Add new event type</label>
<input id="new" type="text" name="eventt">
<input class="buddon" type="submit">
</form>
</div>


<pre>
<div class="inputarea">
<form  action="/add_event" method="post">
    <label for="title">The name of the event:</label>
    <input id="title" type="text" name="eventname" maxlength=30 value="">
    <label for="text">Description of the event:</label>
    <textarea id="text" name="desc" rows="5" cols="30"></textarea>
    <label for="date">The type of the event</label>
<select id="date" type="option" name="eventtype" value=""> 
<?php $tyyppi = get_type(); 
    foreach ($tyyppi as $t) { ?>
      <option value="<?=$t["ID"]?>"><?=$t["nimi"]?></option>
    <?php } ?>
</select>
    <label for="rdate">Postal Address:</label>
    <input id="rdate" type="text" name="postaddress" value="">
    <label for="udate">Postal Place:</label>
    <input id="udate" type="text" name="postplace" value="">
    <label for="sdate">Address:</label>
    <input id="sdate" type="text" name="address" value="">
    <label for="tdate">Date:</label>
    <input id="tdate" type="date" name="date" value="">
    <label for="tdate">Max amount of members:</label>
    <input id="tdate" type="text" name="amt" value="">


    <input class="buddon" id="sendbutton" type="submit" value="Lähetä">
</form>
</div>
    </pre>

<?php require "partials/footer.php"; ?>