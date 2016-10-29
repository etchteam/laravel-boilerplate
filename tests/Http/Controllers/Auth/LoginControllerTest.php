<?php

namespace Tests\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginControllerTest extends \Tests\TestCase
{
    /**
     * @test
     */
    public function loginWithInvalidCredentialsRedirectsToPreviousUrl()
    {
        $user = factory(User::class)->create();
        $attrs = ['email' => $user->email, 'password' => str_random(10)];

        $this->call('post', '/login', [], $attrs);
        $this->assertRedirectedTo('/');
        $this->get('/login');
        $this->call('post', '/login', [], $attrs);
        $this->assertRedirectedTo('/login');
    }

    /**
     * @test
     */
    public function loginWithValidCredentialsAuthenticatesTheUser()
    {
        $user = factory(User::class)->create(['password' => 'Foobar123']);
        $attrs = ['email' => $user->email, 'password' => 'Foobar123'];

        $this->post('/login', $attrs);
        $this->assertEquals(Auth::user()->id, $user->id);
    }

    /**
     * @test
     */
    public function loginWithUserRedirectsToindex()
    {
        $user = factory(User::class)->create(['password' => 'Foobar123']);
        $attrs = ['email' => $user->email, 'password' => 'Foobar123'];

        $this->post('/login', $attrs);
        $this->assertRedirectedTo('/');
    }

    /**
     * @test
     * @group middleware
     */
    public function showLoginFormWithAuthenticatedUserRedirectsToIndex()
    {
        $this->setAuthenticatedSession();

        $this->get('/login');
        $this->assertRedirectedTo('/');
    }

    /**
     * @test
     * @group middleware
     */
    public function logoutWithAuthenticatedUserRedirectsToIndex()
    {
        $this->setAuthenticatedSession();

        $this->post('/logout');
        $this->assertRedirectedTo('/');
    }

    /**
     * @test
     * @group middleware
     */
    public function logoutWithUnauthenticatedUserRedirectsToIndex()
    {
        $this->post('/logout');
        $this->assertRedirectedTo('/');
    }
}
