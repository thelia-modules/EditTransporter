<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 07/09/15
 * Time: 15:32
 */

namespace EditTransporter\Controller;


use EditTransporter\Event\EditTransporterEvent;
use EditTransporter\EventListeners\EditTransporterListener;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\Security\AccessManager;
use Thelia\Core\Security\Resource\AdminResources;
use Thelia\Tools\URL;

class EditTransporterController extends BaseAdminController
{
    public function postAction($order_id = null)
    {
        if (null !== $response = $this->checkAuth(AdminResources::ORDER, array(), AccessManager::UPDATE)) {
            return $response;
        }

        $form = $this->createForm('thelia.admin.edit.transporter');
        $editEvent = new EditTransporterEvent();
        $message = null;

        try {
            $validForm = $this->validateForm($form);

            $editEvent->setOrderId($order_id);
            $editEvent->setTransporterId($validForm->get('transporter')->getData());

            $this->dispatch(EditTransporterListener::EDIT_TRANSPORTER, $editEvent);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            var_dump($message);
            $form->setErrorMessage($message);
            $this->getParserContext()->addForm($form)->setGeneralError($message);
        }

        return RedirectResponse::create(URL::getInstance()->absoluteUrl('/admin/order/update/' . $order_id . "?current_tab=bill"));
    }
}