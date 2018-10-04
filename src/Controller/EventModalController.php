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

    public function launchModal($entityid) {
        $content['#theme'] = 'service_club_event_modal';
        $content['#attached']['library'][] = 'service_club_event_modal/event_modal';
       // $content['entityId'] = $entityid;

        $options = [
            'dialogClass' => 'popup-dialog-class',
            'width' => '80%',
        ];
        $response = new AjaxResponse();
        $response->addCommand(new OpenModalDialogCommand(t('Event Mapping Tool'), $content, $options, '<app-root>'));

        return $response;
    }
}