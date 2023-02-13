<?php

namespace App\Rules;

use App\Models\Promocode;
use Illuminate\Contracts\Validation\Rule;

class CheckPromocode implements Rule
{
    public function passes($attribute, $value)
    {
        return Promocode::checkPromocodeIsValid($value);
    }

    public function message()
    {
        return __('Этот промокод уже использован или неверно указан');
    }
}
