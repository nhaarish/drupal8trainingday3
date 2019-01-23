<?php

namespace Drupal\routing_demo\Controller;

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

}

