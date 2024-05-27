<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    public function testRegisterSuccess() 
    {
        $this->post('api/admin', [
            'username' => 'testing',
            'password' => 'halodek',
            'admin_name' => 'Rivalino Dian Ramadhan',
        ])->assertStatus(201)
            ->assertJson([
                "data" => [
                    'username' => 'testing',
                    'admin_name' => 'Rivalino Dian Ramadhan',
                ]
            ]);
    }

    public function testRegisterFailure() {
        $this->post('api/admin', [
            'username' => '',
            'password' => '',
            'admin_name' => '',
        ])->assertStatus(400)
            ->assertJson([
              "errors" => [
                  'username' => ['The username field is required.'],
                  'password' => ['The password field is required.'],
                  'admin_name' => ['The admin name field is required.']
              ]
          ]);
    }
    
}
