<?php

/**
 * Twocheckout Cancel Subscription Request.
 */
namespace Omnipay\Twocheckout\Message;

/**
 * Twocheckout Cancel Subscription Request.
 *
 * @see Omnipay\Twocheckout\Gateway
 * @link https://twocheckout.com/docs/api/#cancel_subscription
 */
class CancelSubscriptionRequest extends AbstractRequest
{
    /**
     * Get the subscription reference.
     *
     * @return string
     */
    public function getSubscriptionReference()
    {
        return $this->getParameter('subscriptionReference');
    }

    /**
     * Set the set subscription reference.
     *
     * @return CancelSubscriptionRequest provides a fluent interface.
     */
    public function setSubscriptionReference($value)
    {
        return $this->setParameter('subscriptionReference', $value);
    }

    public function getData()
    {
        $this->validate('customerReference', 'subscriptionReference');

        $data = array();

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint
            .'/customers/'.$this->getCustomerReference()
            .'/subscriptions/'.$this->getSubscriptionReference();
    }

    public function getHttpMethod()
    {
        return 'DELETE';
    }
}
