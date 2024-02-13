<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class SearchDTO
{
    public function __construct(
        // #[Assert\NotNull(message: 'minPrice')]
        public ?int $minPrice = 0,

        // #[Assert\NotNull(message: 'maxPrice')]
        public ?int $maxPrice = 100000,

        // #[Assert\NotNull(message: 'minMileage')]
        public ?int $minMileage = 0,

        // #[Assert\NotNull(message: 'maxMileage')]
        public ?int $maxMileage = 400000,

    ) {
    }
}
