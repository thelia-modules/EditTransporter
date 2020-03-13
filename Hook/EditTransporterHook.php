<?php

/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 07/09/15
 * Time: 12:28.
 */

namespace EditTransporter\Hook;

use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;
use Thelia\Model\OrderQuery;

class EditTransporterHook extends BaseHook
{
    public function onOrderEditBillBottom(HookRenderEvent $event)
    {
        $orderId = $event->getArgument('order_id');
        $order = OrderQuery::create()
            ->findOneById($orderId);

        $event->add($this->render('edit_transporter.html', array(
            'order_id' => $orderId,
            'transporter_id' => $order->getDeliveryModuleId()
        )));
    }
}
