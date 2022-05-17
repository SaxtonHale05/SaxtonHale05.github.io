<?php
session_start();
set_include_path(dirname(__FILE__) . '/../');

$route = explode("?", $_SERVER["REQUEST_URI"])[0];
$method = strtolower($_SERVER["REQUEST_METHOD"]);

require_once 'libraries/auth.php';
require_once 'controllers/eventmanagement.php';
require_once 'controllers/usermanagement.php';

switch($route) {
    case "/":
        vieweventcontroller();
    break;

    case "/register":
        registerController();
    break;

    case "/edit_user":
      editorController();
  break;

    case "/login":
        loginController();
    break;

    case "/event_type":
      eventtypeController();
  break;

  case "/event_sheet":
    eventsheetController();
break;

  case "/join_event":
    if($method == "get"){
      eventjoinController();  
    } else {
      eventjoinController2();
    } break;
  

  case "/event_search":
    eventsearchController();
break;

    case "/logout":
        logoutController();
    break;

    case "/delete_crew":
      crewdeleteController();
  break;

    case "/add_event":
      if(isLoggedIn()){
        eventaddcontroller();
      } else {
        loginController();
      }
    break;

    case "/add_type":
      typeaddController();
  break;

    case "/delete_event":
      if(isLoggedIn()){
        deleteeventcontroller();
      } else {
        loginController();
      }
    break;

    case "/update_event":
      if(isLoggedIn()){
        if($method == "get"){
          editeventcontroller();  
        } else {
          updateeventcontroller();
        }
      } else {
        loginController();
      }
    break;

    default:
      echo "404";
  }







































?>