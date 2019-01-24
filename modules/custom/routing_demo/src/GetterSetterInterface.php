<?php 

namespace Drupal\routing_demo;

Interface GetterSetterInterface {
  /**
   * Getter method to pull first data from database
   */
  public function getter();
  /**
   * Setter method to write data into database 
   */
  public function setter($firstName, $lastName);
}