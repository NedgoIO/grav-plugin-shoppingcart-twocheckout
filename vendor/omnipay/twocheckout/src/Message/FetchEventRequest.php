<?php

/**
 * Twocheckout Fetch Event Request.
 */
namespace Omnipay\Twocheckout\Message;

/**
 * Twocheckout Fetch Event Request.
 *
 * @link https://twocheckout.com/docs/api/curl#retrieve_event
 */
class FetchEventRequest extends AbstractRequest
{
    /**
     * Get the event reference.
     *
     * @return string
     */
    public function getEventReference()
    {
        return $this->getParameter('eventReference');
    }

    /**
     * Set the event reference.
     *
     * @return FetchEventRequest provides a fluent interface.
     */
    public function setEventReference($value)
    {
        return $this->setParameter('eventReference', $value);
    }

    public function getData()
    {
        $this->validate('eventReference');
        $data = array();

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/events/'.$this->getEventReference();
    }

    public function getHttpMethod()
    {
        return 'GET';
    }
}
