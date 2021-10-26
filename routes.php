<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . 'Controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'posts':
        // we need the model to query the database later in the controller
        require_once('models/post.php');
        $controller = new PostsController();
      break;
      case 'example':
        $controller= new ExampleController();
        break;
      case 'user':
        require_once('models/user.php');
        $controller= new UserController();
        break;
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' => ['home', 'error','otherPage','login', 'register'],
                       'posts' => ['index', 'show'],
                       'example' => ['home'],
                       'user'=>['login','logout','register']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>