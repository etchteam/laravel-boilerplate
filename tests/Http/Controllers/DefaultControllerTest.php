<?php

namespace Tests\Http\Controllers;

use Tests\TestCase;

class DefaultControllerTest extends TestCase
{
    /**
     * @test
     */
    public function indexReturns200()
    {
        $this->call('GET', route('default.index'));
        $this->assertResponseOk();
    }

    /**
     * @test
     */
    public function indexReturns200WhenAuthenticated()
    {
        $this->setAuthenticatedSession();
        $this->call('GET', route('default.index'));
        $this->assertResponseOk();
    }
}
