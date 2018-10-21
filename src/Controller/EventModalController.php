<?php

/**
 * Class EventModalController.
 *
 *  Launches the Angular front end app within the modal popup.
 */

namespace Drupal\service_club_event_modal\Controller;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Controller\ControllerBase;

class EventModalController extends ControllerBase {

  /**
   * @param $entityid
   *
   * @return AjaxResponse
   *
   * This function is called via the routing when the user clicks the "Open
   *   TMP" Button. It launches the modal window.
   */
  public function launchModal($entityid) {
    // The #theme needs to be the name of the module.
    $content['#theme'] = 'service_club_event_modal';
    // The #attached library needs to be the name of the module/ the name defined in the libraries.yml.
    $content['#attached']['library'][] = 'service_club_event_modal/event_modal';

    // Set up the options for the modal popup.
    $options = [
      'dialogClass' => 'traffic-modal',
      'overflow-y'=> 'scroll',
    ];
    $response = new AjaxResponse();
    // The first parameter is the title of the modal window.
    $response->addCommand(new OpenModalDialogCommand(t('Event Mapping Tool'), $content, $options, '<app-root>'));

    return $response;
  }
}