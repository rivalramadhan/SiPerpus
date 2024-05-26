<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MemberTest extends TestCase
{
    public function testCreateSuccess() 
    {
        $this->post('api/member', [
            'fullname' => 'Sir Freyr',
            'address' => 'Jl. Jendral Sudirman No. 1',
            'gender' => 'Male',
            'email' => 'test@mail.com',
            'phone' => '081234567890'
        ])->assertStatus(201)
            ->assertJson([
                    'data' => [
                        'fullname' => 'Sir Freyr',
                        'address' => 'Jl. Jendral Sudirman No. 1',
                        'gender' => 'Male',
                        'email' => 'test@mail.com',
                        'phone' => '081234567890'
                    ]
            ]);    

    }

    public function testCreateFailed() 
    {
    
    }

}
