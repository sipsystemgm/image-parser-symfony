<?php

namespace App\Tests\Service\Test;

use App\Service\MemcachedStorage;
use PHPUnit\Framework\TestCase;
use Sip\ReaderManager\Interfaces\ReaderStorageInterface;
use Sip\ReaderManager\Test\AbstractStorageTest;

class MemcachedStorageTest extends AbstractStorageTest
{
    protected function getStorage(): ReaderStorageInterface
    {
        return new MemcachedStorage('test_mc');
    }
}

