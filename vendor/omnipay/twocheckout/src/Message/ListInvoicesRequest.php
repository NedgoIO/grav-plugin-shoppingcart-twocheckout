<?php

/**
 * Twocheckout List Invoices Request.
 */
namespace Omnipay\Twocheckout\Message;

/**
 * Twocheckout List Invoices Request.
 *
 * @see Omnipay\Twocheckout\Gateway
 * @link https://twocheckout.com/docs/api#list_invoices
 */
class ListInvoicesRequest extends AbstractRequest
{
    public function getData()
    {
        $data = array();

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/invoices';
    }

    public function getHttpMethod()
    {
        return 'GET';
    }
}
