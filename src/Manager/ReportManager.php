<?php

namespace App\Manager;

use App\Dto\ReportDto;
use Doctrine\ORM\EntityManagerInterface;

class ReportManager {
	public function __construct(
		protected EntityManagerInterface $entityManager,
	) {}

	public function save(ReportDto $reportDto): void {

	}

}
