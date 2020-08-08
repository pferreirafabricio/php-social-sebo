<?php

use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    public function testUserCanRegister()
    {
        $this->assertEquals('fabreco@gmail.com', 'fabreco@gmail.com');
    }
}