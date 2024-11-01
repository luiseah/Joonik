<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Managers\LocationManager;
use Tests\Managers\UserManager;

abstract class TestCase extends BaseTestCase
{
    use DatabaseMigrations;

    // Managers
    use UserManager;
    use LocationManager;

    /**
     * Perform any work that should take place once the database has finished refreshing.
     *
     * @return void
     */
    protected function afterRefreshingDatabase()
    {
        $this->withHeaders([
            'Accept' => 'application/json',
        ]);
    }
}
