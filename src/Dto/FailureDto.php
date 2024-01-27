<?php

namespace App\Dto;

class FailureDto extends AbstractDto {
	public string $type;
	public string $content;

	/**
	 * @param string $type
	 * @return FailureDto
	 */
	public function setType(string $type): FailureDto {
		$this->type = $type;
		return $this;
	}

	/**
	 * @param string $content
	 * @return FailureDto
	 */
	public function setContent(string $content): FailureDto {
		$this->content = $content;
		return $this;
	}
}
