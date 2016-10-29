<?php

namespace Tests\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\User;

class ResetPasswordControllerTest extends TestCase
{
    /**
     * @test
     */
    public function showResetFormReturns200WithInvalidToken()
    {
        $this->get('/password/reset/token');
        $this->assertResponseOk();
    }

    /**
     * @test
     */
    public function showResetFormReturns200WithValidToken()
    {
        $user = factory(User::class)->create();

        $this->get('/password/reset/' . $user->remember_token);
        $this->assertResponseOk();
    }

    /**
     * @test
     */
    public function showResetFormRedirectsToIndexWhenAuthenticated()
    {
        $this->setAuthenticatedSession();
        $this->get('/password/reset/token');
        $this->assertResponseStatus(302);
        $this->assertRedirectedToRoute('default.index');
    }
}
