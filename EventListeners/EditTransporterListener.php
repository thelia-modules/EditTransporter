<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 07/09/15
 * Time: 15:39
 */

namespace EditTransporter\EventListeners;


use EditTransporter\Event\EditTransporterEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Thelia\Model\OrderQuery;

class EditTransporterListener implements EventSubscriberInterface
{
    const EDIT_TRANSPORTER = 'thelia.edittransporter.edit';

    public function editTransporter(EditTransporterEvent $event)
    {
        $order = OrderQuery::create()
            ->findOneById($event->getOrderId());

        $order->setDeliveryModuleId($event->getTransporterId());
        $order->save();
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2'))
     *
     * @return array The event names to listen to
     *
     * @api
     */
    public static function getSubscribedEvents()
    {
        return array(
            self::EDIT_TRANSPORTER => array('editTransporter')
        );
    }

}