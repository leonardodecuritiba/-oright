<?php

namespace App\Traits;

use Carbon\Carbon;

trait ClientsMoipTrait
{

    public function getPhoneAreaCodeAttribute()
    {
        return $this->contact->phone_area_code;
    }

    public function getPhoneNumberAttribute()
    {
        return $this->contact->only_phone;
    }

    public function getBithdayMoipAttribute()
    {
        $birthday = new Carbon($this->attributes['birthday']);
        return [
            'day' => (string)$birthday->day,
            'month' => (string)$birthday->month,
            'year' => (string)$birthday->year,
        ];
    }

}