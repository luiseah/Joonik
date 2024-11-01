<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Managers\IngredientManager;
use Tests\Managers\OrderManager;
use Tests\Managers\PurchaseManager;
use Tests\Managers\RecipeManager;
use Tests\Managers\RequestManager;
use Tests\Managers\UserManager;

abstract class TestCase extends BaseTestCase
{
    use DatabaseMigrations;

    # Managers
    use UserManager;

    /**
     * Perform any work that should take place once the database has finished refreshing.
     *
     * @return void
     */
    protected function afterRefreshingDatabase()
    {
        $this->withHeaders([
            'Accept' => 'application/json'
        ]);
    }
}
