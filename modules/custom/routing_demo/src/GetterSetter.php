<?php 

namespace Drupal\routing_demo;

use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\routing_demo\GetterSetterInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Database\Connection;

class GetterSetter implements GetterSetterInterface, ContainerInjectionInterface {
  
  protected $connection;

  public function __construct(Connection $database){
    $this->connection = $database;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database')
    );
  }

  public function setter($firstName, $lastName) {
    return $this->connection->insert('d8_demo')->fields(
      [
        'first_name' => $firstName,
        'last_name' => $lastName,
      ]
    )->execute();
  }
}