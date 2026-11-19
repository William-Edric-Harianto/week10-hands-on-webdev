<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_index_displays_empty_state_when_no_customers_exist(): void
    {
        $response = $this->get(route('customer-list'));

        $response->assertOk();
        $response->assertViewIs('customers.view-customer');
        $response->assertSee('No customers found.');
    }

    public function test_customer_index_displays_customers_with_update_and_delete_actions(): void
    {
        $customer = Customer::factory()->create([
            'name' => 'Budi Santoso',
            'phone_number' => '081234567890',
        ]);

        $response = $this->get(route('customer-list'));

        $response->assertOk();
        $response->assertSee('Budi Santoso');
        $response->assertSee('081234567890');
        $response->assertSee(route('edit-customer', $customer), false);
        $response->assertSee(route('delete-customer', $customer), false);
        $response->assertSee('Update');
        $response->assertSee('Delete');
    }

    public function test_customer_create_page_renders(): void
    {
        $response = $this->get(route('create-customer'));

        $response->assertOk();
        $response->assertViewIs('customers.create-customer');
        $response->assertSee('Create Customer');
    }

    public function test_customer_can_be_stored(): void
    {
        $response = $this->post(route('store-customer'), [
            'name' => 'Siti Aminah',
            'phone_number' => '081987654321',
        ]);

        $response->assertRedirect(route('customer-list'));
        $this->assertDatabaseHas('customers', [
            'name' => 'Siti Aminah',
            'phone_number' => '081987654321',
        ]);
    }

    public function test_customer_edit_page_renders_with_bound_customer(): void
    {
        $customer = Customer::factory()->create([
            'name' => 'Andi Wijaya',
            'phone_number' => '085555666777',
        ]);

        $response = $this->get(route('edit-customer', $customer));

        $response->assertOk();
        $response->assertViewIs('customers.edit-customer');
        $response->assertSee('Andi Wijaya');
        $response->assertSee('085555666777');
    }

    public function test_customer_can_be_updated(): void
    {
        $customer = Customer::factory()->create([
            'name' => 'Old Name',
            'phone_number' => '081111111111',
        ]);

        $response = $this->post(route('update-customer', $customer), [
            'name' => 'New Name',
            'phone_number' => '082222222222',
        ]);

        $response->assertRedirect(route('customer-list'));
        $this->assertDatabaseHas('customers', [
            'id' => $customer->id,
            'name' => 'New Name',
            'phone_number' => '082222222222',
        ]);
    }

    public function test_customer_can_be_deleted(): void
    {
        $customer = Customer::factory()->create();

        $response = $this->delete(route('delete-customer', $customer));

        $response->assertRedirect(route('customer-list'));
        $this->assertDatabaseMissing('customers', [
            'id' => $customer->id,
        ]);
    }
}
