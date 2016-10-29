<?php

namespace Tests\Http\Controllers\Auth;

use Tests\TestCase;

class ForgotPasswordControllerTest extends TestCase
{
    /**
     * @test
     */
    public function showLinkRequestFormReturns200()
    {
        $this->get('/password/reset');
        $this->assertResponseOk();
    }

    /**
     * @test
     */
    public function showLinkRequestFormRedirectsIfAlreadyLoggedIn()
    {
        $this->setAuthenticatedSession();
        $this->get('/password/reset');
        $this->assertResponseStatus(302);
        $this->assertRedirectedToRoute('default.index');
    }
}
