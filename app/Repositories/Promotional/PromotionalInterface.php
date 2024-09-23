<?php

namespace App\Repositories\Promotional;

interface PromotionalInterface
{
    public function getPaymentMethodId($paymentMethod);

    public function getAvailablePromotions($employerId);

    public function validatePromo($promoCode, $employerId);
}

