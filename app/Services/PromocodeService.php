<?php

namespace App\Services;

use App\Models\Promocode;
use Illuminate\Support\Str;

class PromocodeService
{
    public function generate()
    {
        $code = Str::upper(Str::random(10));

        if (Promocode::where('code', $code)->exists()) {
            $this->generate();
        }

        return $code;
    }
}
