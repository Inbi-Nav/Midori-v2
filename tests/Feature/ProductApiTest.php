<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_client_can_view_products()
    {
        $client = User::factory()->create(['role' => 'client']);
        Passport::actingAs($client);

        Product::factory()->count(3)->create();

        $response = $this->getJson('/api/products');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    public function test_client_cannot_create_product()
    {
        $client = User::factory()->create(['role' => 'client']);
        Passport::actingAs($client);

        $response = $this->postJson('/api/products', [
            'name' => 'Test',
            'price' => 10,
            'stock' => 5
        ]);

        $response->assertStatus(403);
    }

    public function test_provider_can_create_product() {
    $provider = User::factory()->create([
        'role' => 'provider'
    ]);

    Passport::actingAs($provider);

    $category = Category::factory()->create();

    $response = $this->postJson('/api/products', [
        'name' => 'Test Product',
        'price' => 10,
        'stock' => 5,
        'category_id' => $category->id
    ]);

        $response->assertStatus(201);
    }
}
