<?php

/*
 * This file is part of the Laravel Paystack package.
 *
 * (c) Prosper Otemuyiwa <prosperotemuyiwa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /**
     * Public Key From Paystack Dashboard
     *
     */
    'publicKey' => 'pk_test_65fc75f8882d9dfec6d4f788c875d7d61a08cb02',

    /**
     * Secret Key From Paystack Dashboard
     *
     */
    'secretKey' => 'sk_test_3c2ee8396bb120313e26dc2c84382e59f5e01181',

    /**
     * Paystack Payment URL
     *
     */
    'paymentUrl' => 'https://api.paystack.co',

    /**
     * Optional email address of the merchant
     *
     */
    'merchantEmail' => getenv('MERCHANT_EMAIL'),

];
