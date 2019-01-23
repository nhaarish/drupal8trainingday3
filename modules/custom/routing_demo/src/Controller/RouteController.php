<?php

namespace Drupal\routing_demo\Controller;

class RouteController {
  public function helloWorld(){
    return[
      '#type' => 'markup',
      '#markup' => 'Hello World!'
    ];
  }
}