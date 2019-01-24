<?php 

namespace Drupal\routing_demo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\routing_demo\GetterSetterInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DIForm extends FormBase {
  
  protected $getterSetter;

  public function __construct(GetterSetterInterface $getterSetter){
    $this->getterSetter = $getterSetter;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('routing_demo.getter_setter')
    );
  }

  public function getFormId() {
    return 'reouting_demo_DIForm';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['firstName'] = [
      '#type' => 'textfield',
      '#title' => 'First Name',
    ];

    $form['lastName'] = [
      '#type' => 'textfield',
      '#title' => 'Last Name',
    ];
        
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];
    return $form;
  }
  
  public function submitForm(array &$form, FormStateInterface $form_state) {
     
    $this->getterSetter->setter($form_state->getValue('firstName'), $form_state->getValue('lastName'));
  }
}