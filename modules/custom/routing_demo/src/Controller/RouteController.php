<?php

namespace Drupal\routing_demo\Controller;

use Drupal\user\UserInterface;
use Drupal\node\NodeInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
use GuzzleHttp\Client;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;

class RouteController implements ContainerInjectionInterface {

  protected $client;

  public function __construct(Client $client) {
    $this->client = $client;
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('http_client')
    );
  }

  public function helloWorld(){
    $request = $this->client->request('GET', 'http://jsonplaceholder.typicode.com/posts/1');
    $response = $request->getBody();
    return[
      '#type' => '#markup',
      '#markup' => $response,
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