<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 07/09/15
 * Time: 15:35
 */

namespace EditTransporter\Event;


use Thelia\Core\Event\ActionEvent;

class EditTransporterEvent extends ActionEvent
{
    protected $orderId;
    protected $transporterId;

    /**
     * @return mixed
     */
    public function getTransporterId()
    {
        return $this->transporterId;
    }

    /**
     * @param mixed $transporterId
     */
    public function setTransporterId($transporterId)
    {
        $this->transporterId = $transporterId;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param mixed $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }
}