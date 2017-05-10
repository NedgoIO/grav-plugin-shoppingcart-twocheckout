<?php

/**
 * Twocheckout Fetch Invoice Lines Request.
 */
namespace Omnipay\Twocheckout\Message;

/**
 * Twocheckout Fetch Invoice Lines Request.
 *
 * @link https://twocheckout.com/docs/api#invoice_lines
 */
class FetchInvoiceLinesRequest extends AbstractRequest
{
    /**
     * Get the invoice reference.
     *
     * @return string
     */
    public function getInvoiceReference()
    {
        return $this->getParameter('invoiceReference');
    }

    /**
     * Set the set invoice reference.
     *
     * @return FetchInvoiceLinesRequest provides a fluent interface.
     */
    public function setInvoiceReference($value)
    {
        return $this->setParameter('invoiceReference', $value);
    }

    public function getData()
    {
        $this->validate('invoiceReference');
        $data = array();

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/invoices/'.$this->getInvoiceReference().'/lines';
    }

    public function getHttpMethod()
    {
        return 'GET';
    }
}
