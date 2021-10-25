<?php

namespace App\Service\Interfaces;

interface SaveDataInterface
{
    public function save(string $url, string $urlHash, float $executionTime, int $deep, int $imagesLength): bool;
}
