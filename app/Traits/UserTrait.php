<?php

namespace App\Traits;


trait UserTrait {

	public function getFormattedCpf() {
		return $this->user->getFormattedCpf();
	}

	public function getShortName() {
		return $this->user->getShortName();
	}

	public function getShortEmail() {
		return $this->user->getShortEmail();
	}

	public function getShortNickname() {
		return $this->user->getShortNickname();
	}
}