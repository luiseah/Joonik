<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class LocationControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_see_locations()
    {
        Carbon::setTestNow('2025-01-01 00:00:00');

        $apiKey = 'test-key';

        $user = $this->createUser([
            'api_key' => $apiKey
        ]);

        $token = $user->tokens()->create([
            'name' => 'default',
            'token' => 'test-key',
            'abilities' => ['*'],
        ]);

        $this->createLocation([
            'name' => 'Location 1',
            'user_id' => $user->getKey()
        ]);

        $this->createManyLocations(9);

        $rows = 10;

        $this->assertDatabaseCount(Location::class, $rows);

        $route = route('locations.index');

        $response = $this->get($route, [
            'Accept' => 'application/json',
            'X-API-KEY' => $apiKey
        ]);

        $response->assertOk();

        $response->assertJson(fn(AssertableJson $json) => $json
            ->hasAll('status', 'message', 'data')
            ->whereAll([
                'status' => 'success',
            ])
            ->has('data', $rows, fn(AssertableJson $json) => $json
                ->hasAll(
                    'id',
                    'name',
                    'image',
                    'created_at',
                    'updated_at',
                )
                ->whereAll([
                    'name' => 'Location 1',
                    'created_at' => '2025-01-01T00:00:00.000000Z',
                ])
            )
        );
    }

    public function test_user_cannot_see_locations_without_api_key_spanish()
    {
        $route = route('locations.index');

        $response = $this->get($route, [
            'Accept-Language' => 'es',
            'Accept' => 'application/json'
        ]);

        $response->assertUnauthorized();

        $response->assertJson(fn(AssertableJson $json) => $json
            ->hasAll('status', 'message', 'error')
            ->whereAll([
                'status' => 'error',
                'error' => 'No autenticado',
                'message' => 'Debe estar autenticado para acceder a este recurso.',
            ])
        );
    }

    public function test_user_cannot_see_locations_without_api_key()
    {
        $route = route('locations.index');

        $response = $this->get($route, [
            'Accept-Language' => 'en',
            'Accept' => 'application/json'
        ]);

        $response->assertUnauthorized();

        $response->assertJson(fn(AssertableJson $json) => $json
            ->hasAll('status', 'message', 'error')
            ->whereAll([
                'status' => 'error',
                'error' => 'Unauthenticated',
                'message' => 'They must be authenticated to access this resource.',
            ])
        );
    }
}
