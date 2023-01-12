<?php

use Core\Router;

define("ROOT",dirname(__FILE__)."/");
define("CORE", ROOT."/core/");
define("BASE_APP", ROOT."application/");
define("BASE_URL", dirname($_SERVER['SCRIPT_NAME'])."/");
define("CSS", BASE_URL."assets/css/");

require CORE . "helpers/debug.php";
require CORE . "controller.php";
require CORE . "auth/identifiants.php";
require CORE . "api.php";
require CORE . "db.php";
require CORE . "model.php";
require CORE . "router.php";

session_start();

Router::run();