<?php

namespace Drupal\routing_demo\Controller;

use Drupal\user\UserInterface;
use Drupal\node\NodeInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

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

  public function getNodeDetails(NodeInterface $node) {
    return [
      '#type'  =>  '#markup',
      '#markup'  =>  $node->getTitle(). ' is authored by ' . $node->getOwner()->getAccountName(),
    ];
  }

}