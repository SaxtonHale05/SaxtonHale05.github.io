<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/tyyli.css">
    <title>Tapahtumat</title>
    <nav>
    <ul class="navbar">
        <li class="navbutton"><a href="/">See Events &#128065</a></li>
        <?php if(!isLoggedIn()): ?>
           <li class="navbutton"><a href="/login">Login</a></li> 
           <li class="navbutton"><a href="/register">Register</a></li>
        <?php else: ?>
           <li class="navbutton"><a href="/add_event">New event &#10024</a></li>
           <li class="navbutton"><a href="/logout">Logout  &#9194</a></li>
           <li class="navbutton"><a href="/edit_user">Edit user details &#10002</a></li>

        <?php endif ?>

    </ul>
</nav>
</head>
<body>
    
</body>
</html>
