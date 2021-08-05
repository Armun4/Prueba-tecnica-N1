<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Property;
use App\Models\User;

class PropertyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_CheckIfPropertiesAreListedInJsonFile()
    {

        Property::factory(2)->create();

        $response = $this->get(route('index'));

        $response->assertStatus(200)
            ->assertJsonCount(2);
    }
    public function test_CanGetProductByAgencyId()
    {
        Property::factory(4)->create();
        Property::factory(2)->create([
            'agencyID' => '27749y74'
        ]);
        $response = $this->get('api/properties?filter[agencyID]=27749y74');
        $response->assertStatus(200)
            ->assertJsonCount(2)
            ->assertJsonFragment(['agencyID' => '27749y74']);
    }

    public function test_CanCreateProperty()
    {

        $response = $this->post(route('create'), [
            'title' => 'nice House',
            'price' => '1000000',
            'location' => ' {
                "city": "Granollers",
                "zipcode": "08420",
                "address": "C/ Anselm Clave 61"
            }',
            'operationType' => 'sale',
            'type' => 'house',
            'rooms' => '2',
            'baths' => '3',
            'agencyID' => '27749y749'
        ]);

        $response = $this->get(route('index'));
        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment(['title' => 'nice House']);
    }

    public function test_CanUpdateProperty()
    {
        Property::factory(1)->create();

        $response = $this->patch('api/properties/1', [
            'title' => 'awesome House',
            'price' => '20000000000'
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['title' => 'awesome House', 'price' => '20000000000']);
    }

}
