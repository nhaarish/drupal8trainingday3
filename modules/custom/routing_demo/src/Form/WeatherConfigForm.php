<?php 

namespace Drupal\routing_demo\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class WeatherConfigForm extends ConfigFormBase {
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'routing_demo.weather',
    ];
  }

  public function getFormId() {
    return 'routing_demo_weather_config';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $default_value = $this->config('routing_demo.weather')->get('api_url');
    $form['api_url'] = [
      '#type' => 'textfield',
      '#title' => 'Api Url',
      '#default_value' => ($default_value) ? $default_value : NULL,
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('routing_demo.weather')
      ->set('api_url', $form_state->getValue('api_url'))
      ->save();
    return parent::submitForm($form, $form_state);
  }
}