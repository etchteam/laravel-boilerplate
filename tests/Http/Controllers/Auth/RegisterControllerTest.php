<?php

namespace Tests\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\User;

class RegisterControllerTest extends TestCase
{
    /**
     * @test
     */
    public function showRegistrationFormReturns200()
    {
        $this->get('/register');
        $this->assertResponseOk();
    }

    /**
     * @test
     */
    public function showRegistrationFormRedirectsToIndexWhenAuthenticated()
    {
        $this->setAuthenticatedSession();
        $this->get('/register');
        $this->assertResponseStatus(302);
        $this->assertRedirectedToRoute('default.index');
    }

    /**
     * @test
     */
    public function createRedirectsToIndexWhenAuthenticated()
    {
        $this->setAuthenticatedSession();
        $this->post('/register', []);
        $this->assertResponseStatus(302);
        $this->assertRedirectedToRoute('default.index');
    }

    /**
     * @test
     */
    public function createRedirectsToShowRegistrationFormWhenInvalid()
    {
        $this->post('/register', [], ['HTTP_REFERER' => '/register']);
        $this->assertResponseStatus(302);
        $this->assertRedirectedTo('/register');
    }

    /**
     * @test
     */
    public function createDoesNotStoreAUserWhenInvalid()
    {
        $this->post('/register');
        $this->assertEquals(0, User::count());
    }

    /**
     * @test
     */
    public function createStoresAUserAndRedirectsToIndexWhenValid()
    {
        $attributes = attributes(User::class, ['password' => 'Foobar123!', 'password_confirmation' => 'Foobar123!']);

        $this->post('/register', $attributes);
        $user = User::first();
        $this->assertEquals($attributes['name'], $user->name);
        $this->assertEquals($attributes['email'], $user->email);
        $this->assertResponseStatus(302);
        $this->assertRedirectedToRoute('default.index');
    }
}
