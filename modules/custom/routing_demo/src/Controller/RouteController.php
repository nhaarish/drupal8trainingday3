<?php

namespace Drupal\routing_demo\Controller;

use Drupal\user\UserInterface;

class RouteController {
  public function helloWorld(){
    return[
      '#type' => '#markup',
      '#markup' => 'Hello World!'
    ];
  }

  public function helloDynamic($name) {
    return [
      '#type' => '#markup',
      '#markup' => 'Hello ' . $name . '!',
    ];
  }

  public function helloDynamicTitleCallback($name) {
    return 'Hello ' . $name ;
  }

  public function helloDynamicEntity(UserInterface $user) {
    return [
      '#type'  =>  '#markup',
      '#markup'  =>  'Hello'." ".$user->getUsername(),
    ];
  }

}