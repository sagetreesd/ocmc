<?php

namespace Drupal\ocmc_mobile\Form;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class OCMCMobileAppLinkForm.
 *
 * @package Drupal\ocmc_mobile\Form
 */
class OCMCMobileAppLinkForm extends EntityForm {
  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    /** @var \Drupal\ocmc_mobile\Entity\OCMCMobileAppLink $style */
    $style = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $style->label(),
      '#description' => $this->t("Label for the OCMC mobile app link."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $style->id(),
      '#machine_name' => [
        'exists' => '\Drupal\ocmc_mobile\Entity\OCMCMobileAppLink::load',
      ],
      '#disabled' => !$style->isNew(),
    ];

    $form['url'] = [
      '#title' => $this->t('URL'),
      '#type' => 'textfield',
      '#default_value' => $style->getUrl(),
      '#description' => $this->t('Enter the URL for the link.'),
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $style = $this->entity;
    $status = $style->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label mobile app link.', [
          '%label' => $style->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label mobile app link.', [
          '%label' => $style->label(),
        ]));
    }
    $form_state->setRedirectUrl($style->toUrl('collection'));
  }

}
