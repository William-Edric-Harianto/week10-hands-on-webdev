<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_service_index_displays_empty_state_when_no_services_exist(): void
    {
        $response = $this->get(route('service-list'));

        $response->assertOk();
        $response->assertViewIs('services.view-service');
        $response->assertSee('No services found.');
    }

    public function test_service_index_displays_services_with_update_and_delete_actions(): void
    {
        $service = Service::factory()->create([
            'name' => 'Deep Cleaning',
            'description' => 'Full interior and exterior cleaning.',
        ]);

        $response = $this->get(route('service-list'));

        $response->assertOk();
        $response->assertSee('Deep Cleaning');
        $response->assertSee('Full interior and exterior cleaning.');
        $response->assertSee(route('edit-service', $service), false);
        $response->assertSee(route('delete-service', $service), false);
        $response->assertSee('Update');
        $response->assertSee('Delete');
    }

    public function test_service_create_page_renders(): void
    {
        $response = $this->get(route('create-service'));

        $response->assertOk();
        $response->assertViewIs('services.create-service');
        $response->assertSee('Create Service');
    }

    public function test_service_can_be_stored(): void
    {
        $response = $this->post(route('store-service'), [
            'name' => 'Laptop Repair',
            'description' => 'Hardware diagnostics and replacement.',
        ]);

        $response->assertRedirect(route('service-list'));
        $this->assertDatabaseHas('services', [
            'name' => 'Laptop Repair',
            'description' => 'Hardware diagnostics and replacement.',
        ]);
    }

    public function test_service_edit_page_renders_with_bound_service(): void
    {
        $service = Service::factory()->create([
            'name' => 'Screen Replacement',
            'description' => 'Replace cracked LCD display.',
        ]);

        $response = $this->get(route('edit-service', $service));

        $response->assertOk();
        $response->assertViewIs('services.edit-service');
        $response->assertSee('Screen Replacement');
        $response->assertSee('Replace cracked LCD display.');
    }

    public function test_service_can_be_updated(): void
    {
        $service = Service::factory()->create([
            'name' => 'Old Service',
            'description' => 'Old description.',
        ]);

        $response = $this->post(route('update-service', $service), [
            'name' => 'Updated Service',
            'description' => 'Updated description.',
        ]);

        $response->assertRedirect(route('service-list'));
        $this->assertDatabaseHas('services', [
            'id' => $service->id,
            'name' => 'Updated Service',
            'description' => 'Updated description.',
        ]);
    }

    public function test_service_can_be_deleted(): void
    {
        $service = Service::factory()->create();

        $response = $this->delete(route('delete-service', $service));

        $response->assertRedirect(route('service-list'));
        $this->assertDatabaseMissing('services', [
            'id' => $service->id,
        ]);
    }
}
