<?php

namespace App\Formatter;

use araise\CoreBundle\Formatter\AbstractFormatter;

class FailureFormatter extends AbstractFormatter {
	public function getString(mixed $value): string {
		if($value) {
			return $value;
		}
		return '-';
	}
}
