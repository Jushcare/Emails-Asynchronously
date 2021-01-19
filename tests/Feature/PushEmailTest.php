<?php

namespace Tests\Feature;

use App\Models\PushEmails;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PushEmailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function checkAllEmailData()
    {
        // $this->json('POST', 'api/send', ['Accept' => 'application/json'])
        //     ->assertStatus(422)
        //     ->assertJson([
        //         "message" => "The given data was invalid.",
        //         "errors" => [
        //             "email" => ["The email field is required."],
        //             "subject" => ["The subject field is required."],
        //             "msgbody" => ["The message body field is required."],
        //         ]
        //     ]);
        $response = $this->get('/');

        $response->assertStatus(200);
    }



    public function EmailListing(){

    }
}
