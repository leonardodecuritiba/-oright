<?php

namespace App\Traits;

use App\Helpers\DataHelper;

trait CommonTrait {

	public function getCreatedAtTime() {
		return strtotime( $this->attributes['created_at'] );
	}

	public function getCreatedAtFormatted()
	{
		return DataHelper::getPrettyDateTime( $this->attributes['created_at'] );
	}
//
//
//	public function getEndAtTime() {
//		return strtotime( $this->attributes['end_at'] );
//	}
//
//	public function getEndAtFormatted()
//	{
//		return DataHelper::getPrettyDateTime( $this->attributes['end_at'] );
//	}

    public function setMoipDate($value)
    {
        return DataHelper::setMoipDate($value);
    }

    public function getMoipDate($value)
    {
        return DataHelper::getMoipDate($value);
    }

    public function getValue2Currency($value = NULL)
    {
        return DataHelper::getFloat2Currency(($value != NULL) ? $value : $this->attributes['value']);
    }

    public function getParam2Currency($value = NULL)
    {
        return DataHelper::getFloat2Currency($value);
	}

	public function getConfirmatedAtTime() {
		return strtotime( $this->attributes['confirmated_at'] );
	}

	public function getConfirmatedAtFormatted()
	{
		return DataHelper::getPrettyDateTime( $this->attributes['confirmated_at'] );
	}

	//activated_at
	public function getActivatedAtTime()
	{
		return strtotime( $this->attributes['activated_at'] );
	}
	public function getActivatedAtFormatted()
	{
		return DataHelper::getPrettyDateTime( $this->attributes['activated_at'] );
	}

	//disactivated_at
	public function getDisactivatedAtTime()
	{
		return strtotime( $this->attributes['disactivated_at'] );
	}
	public function getDisactivatedAtFormatted()
	{
		return DataHelper::getPrettyDateTime( $this->attributes['disactivated_at'] );
	}
}