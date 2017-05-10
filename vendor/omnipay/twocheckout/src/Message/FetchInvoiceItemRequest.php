<?php

/**
 * Twocheckout Fetch Invoice Item Request.
 */
namespace Omnipay\Twocheckout\Message;

/**
 * Twocheckout Fetch Invoice Item Request.
 *
 * @link https://twocheckout.com/docs/api#retrieve_invoiceitem
 */
class FetchInvoiceItemRequest extends AbstractRequest
{
    /**
     * Get the invoice-item reference.
     *
     * @return string
     */
    public function getInvoiceItemReference()
    {
        return $this->getParameter('invoiceItemReference');
    }

    /**
     * Set the set invoice-item reference.
     *
     * @return FetchInvoiceItemLinesRequest provides a fluent interface.
     */
    public function setInvoiceItemReference($value)
    {
        return $this->setParameter('invoiceItemReference', $value);
    }

    public function getData()
    {
        $this->validate('invoiceItemReference');
        $data = array();

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/invoiceitems/'.$this->getInvoiceItemReference();
    }

    public function getHttpMethod()
    {
        return 'GET';
    }
}
