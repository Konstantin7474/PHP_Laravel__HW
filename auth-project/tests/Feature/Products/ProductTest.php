<?php

namespace Tests\Feature\Products;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class ProductTest extends TestCase
{

    use RefreshDatabase;

    public function test_products_can_be_indexed()
    {
        Product::factory(3)->create();
        $response = $this->getJson('/api/products');
        $response->assertOk();
        $response->assertJsonCount(3);
    }

    public function test_product_can_be_shown()
    {
        $product = Product::factory()->create();

        $response = $this->getJson("/api/products/{$product->id}");

        $response->assertOk();
        $response->assertJsonFragment([
            'name' => $product->name,
            'sku' => $product->sku,
        ]);
    }


    public function test_product_can_be_stored()
    {
        $data = [
            'sku' => 'TEST666',
            'name' => 'New Product 666',
            'price' => 99.99,
        ];

        $response = $this->postJson('/api/products', $data);

        $response->assertCreated();
        $this->assertDatabaseHas('products', $data);
    }


    public function test_product_can_be_updated()
    {
        $product = Product::factory()->create();

        $data = [
            'name' => 'Updated name',
            'price' => 199.99,
        ];

        $response = $this->putJson("/api/products/{$product->id}", $data);

        $response->assertOk();
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Updated Name',
        ]);
    }

    public function test_product_can_be_destroyed()
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson("/api/products{$product->id}");

        $response->assertNoContent();
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
