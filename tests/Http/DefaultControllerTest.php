<?php

namespace Tests\Http;

class DefaultControllerTest extends \Tests\TestCase
{
    /**
     * @test
     */
    public function indexReturns200()
    {
        $this->call('GET', route('default.index'));
        $this->assertResponseOk();
    }
}
