<?php
  // Load Config
  require_once 'config/config.php';

  //Load Helper
  require_once 'helpers/url_helper.php';
  require_once 'helpers/session_helper.php';


  //Load libraries
  //require_once 'libraries/core.php';
  //require_once 'libraries/controller.php';

  // Autoload Core Libraries
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });
  
