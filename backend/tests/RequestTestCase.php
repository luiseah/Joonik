<?php

namespace Tests;

use Database\Seeders\IngredientSeeder;
use Database\Seeders\RecipeSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Managers\IngredientManager;
use Tests\Managers\OrderManager;
use Tests\Managers\PurchaseManager;
use Tests\Managers\RecipeManager;
use Tests\Managers\RequestManager;
use Tests\Managers\UserManager;

abstract class RequestTestCase extends BaseTestCase
{
    use DatabaseMigrations;

    # Managers
    use UserManager;
    use OrderManager;
    use RecipeManager;
    use RequestManager;
    use IngredientManager;
    use PurchaseManager;

    /**
     * Perform any work that should take place once the database has finished refreshing.
     *
     * @return void
     */
    protected function afterRefreshingDatabase()
    {
        $this->seed(IngredientSeeder::class);
        $this->seed(RecipeSeeder::class);

        $this->withHeaders([
            'Accept' => 'application/json'
        ]);
    }
}
