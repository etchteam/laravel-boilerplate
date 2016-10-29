<?php

namespace Tests;

use App\Models\User;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase as BaseClass;

abstract class TestCase extends BaseClass
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Sets an authenticated session for testing
     * @param App\Models\User $user
     */
    public function setAuthenticatedSession($user = null)
    {
        if (is_null($user)) {
            $user = factory(User::class)->create();
        }

        $this->be($user);
    }

    public function setUp()
    {
        parent::setUp();

        \Session::start();

        \DB::beginTransaction();
    }

    public function tearDown()
    {
        \DB::rollback();

        parent::tearDown();
    }
}
