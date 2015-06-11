<?php

class ModelsTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate:refresh', ['--env' => 'testing']);
        $this->seed();
    }

    public function testTrue()
    {
        $this->assertTrue(true);
    }
}
