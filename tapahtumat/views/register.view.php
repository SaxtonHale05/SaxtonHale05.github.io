<?php require "partials/header.php"; ?>

<h2 class="centered">Rekisteröidy</h2>

<div class="inputarea">
<form  action="/register" method="post">
    <label for="fname">Nimesi:</label> 
    <input id="fname" type="text" name="name" maxlength=30>
    <label for="lname">Yrityksen nimi</label>         
    <input id="lname" type="text" name="business" maxlength=30>
    <label for="uname">Sähköpostisi:</label>
    <input id="uname" type="text" name="email" maxlength=30>
    <label for="pword">Salasana:</label>
    <input id="pword" type="password" name="password" maxlength=30>
    <input class="buddon" id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>