<?php 

namespace Drupal\routing_demo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class SimpleForm extends FormBase {
  public function getFormId() {
    return 'SimpleForm';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => 'Name',
    ];
        
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];
    return $form;
  }
  
  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message($this->t('Your Name is @name', ['@name' => $form_state->getValue('name')]));
  }
}