<?php
session_start();

$route = explode("?", $_SERVER["REQUEST_URI"])[0];
$method = strtolower($_SERVER["REQUEST_METHOD"]);


require_once "./utils/helpers.php";

switch($route) {
    case "/":
        require_once "./views/index_view.php";
    break;
    case "/newarticle":
        if(islogged()) {
        if ($method == "post") {
            require_once "./news/insertController.php";
        } else { require_once "./news/newarticle.php";} }
        else {header("location: /login");}

    break;
    case "/readnews";
     require_once "./news/index.php";

     break;
     case "/register";
      if($method == "post") {require_once "./news/regcontrol.php"; } else { require_once "./news/register.php";}

      break;
      case "/login";
      if($method == "post") {require_once "./news/logcontrol.php"; } else { require_once "./news/login.php";}

    default:
    echo "olololololo";
}


?>
