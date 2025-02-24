<?php

namespace Tests\Feature;

use App\Models\Spy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SpyControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * SpyController without filters
     *
     * @return void
     */
    public function test_spy_index_no_filters()
    {
        Spy::factory()->count(15)->create();

        $response = $this->getJson('/api/spies');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [],
            'links' => [],
            'meta' => [],
        ]);

        $response->assertJsonCount(10, 'data');

        $response->assertJsonFragment([
            'current_page' => 1,
            'per_page' => 10,
            'total' => 15,
        ]);
    }

    /**
     * Test the index method of the SpyController with filters
     *
     * @return void
     */
    public function test_spy_index_filters()
    {
        $spy1 = Spy::factory()->create(['name' => 'James', 'surname' => 'Bond', 'country_of_operation' => 'UK']);
        $spy2 = Spy::factory()->create(['name' => 'Jason', 'surname' => 'Bourne', 'country_of_operation' => 'USA']);

        $response = $this->getJson('/api/spies?name=James');

        $response->assertStatus(200);

        $response->assertJsonFragment(['name' => 'James']);
        $response->assertJsonMissing(['name' => 'Jason']);
    }

    /**
     * Test the random method
     *
     * @return void
     */
    public function test_spy_random()
    {
        Spy::factory()->count(10)->create();

        $response = $this->getJson('/api/spies/random');

        $response->assertStatus(200);

        $response->assertJsonCount(5, 'data');
    }
}
