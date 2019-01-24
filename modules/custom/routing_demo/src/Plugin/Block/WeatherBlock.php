<?php

namespace Drupal\routing_demo\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactory;
use Drupal\routing_demo\GetterSetterInterface;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "weather_block",
 *   admin_label = @Translation("Weather Block"),
 *   category = @Translation("Custom"),
 * )
 */

class WeatherBlock extends BlockBase implements ContainerFactoryPluginInterface{

  protected $weatherConfig;
  protected $getterSetter;
  
  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ConfigFactory $configFactory, GetterSetterInterface $getterSetter) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->weatherConfig = $configFactory->get('routing_demo.weather');
    $this->getterSetter = $getterSetter;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('config.factory'),
      $container->get('routing_demo.getter_setter')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $data =  $this->getterSetter->getter();
    $firstName = $data['first_name'];
    $lastName = $data['last_name'];
    $build['data'] = [
      '#theme' => 'routing_demo_getter_setter',
      '#firstName' => $firstName,
      '#lastName' => $lastName,
      '#attached' => [
        'library' => [
          'routing_demo/weather-block',
        ],
      ],
    ];
    return $build;
  }

}