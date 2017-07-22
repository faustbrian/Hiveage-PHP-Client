<?php

/*
 * This file is part of Hiveage PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Hiveage\API;

use BrianFaust\Http\HttpResponse;

class InvoicePayments extends AbstractAPI
{
    /**
     * @param array $payment
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function create(array $payment): HttpResponse
    {
        return $this->client->post("invs/{$invoiceHashKey}/payments", compact('payment'));
    }

    /**
     * @param $invoiceHashKey
     * @param $paymentId
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function retrieve(string $invoiceHashKey, int $paymentId): HttpResponse
    {
        return $this->client->get("invs/{$invoiceHashKey}/payments/{$paymentId}");
    }

    /**
     * @param $invoiceHashKey
     * @param $paymentId
     * @param array $payment
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function update(string $invoiceHashKey, int $paymentId, array $payment): HttpResponse
    {
        return $this->client->put("invs/{$invoiceHashKey}/payments/{$paymentId}", compact('payment'));
    }

    /**
     * @param $invoiceHashKey
     * @param $paymentId
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function destroy(string $invoiceHashKey, int $paymentId): HttpResponse
    {
        return $this->client->delete("invs/{$invoiceHashKey}/payments/{$paymentId}");
    }

    /**
     * @param $invoiceHashKey
     * @param int    $page
     * @param int    $per_page
     * @param string $order
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function all(string $invoiceHashKey, int $page = 1, int $per_page = 20, string $order = 'asc'): HttpResponse
    {
        return $this->client->get("invs/{$invoiceHashKey}/payments", compact('page', 'per_page', 'order'));
    }

    /**
     * @param $invoiceHashKey
     * @param $paymentId
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function markAsRealized(string $invoiceHashKey, int $paymentId): HttpResponse
    {
        return $this->client->post("invs/{$invoiceHashKey}/payments/{$paymentId}".'/mark_as_realized');
    }
}