<?php require "partials/header.php"; ?>

<h2 class="centered">Login</h2>

<div class="inputarea">
<form  action="/login" method="post">
    <label for="uname">Nimi:</label>
    <input id="uname" type="text" name="name" maxlength=30>
    <label for="pwprd">Salasana:</label>
    <input id="pword" type="password" name="password" maxlength=30>
    <input class="buddon" id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>