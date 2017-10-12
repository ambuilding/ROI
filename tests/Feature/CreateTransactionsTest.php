<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateTransactionsTest extends TestCase
{
	//use DatabaseMigrations;

	function test_an_authenticated_user_can_create_new_transaction_record()
    {
        $this->actingAs(factory('App\User')->create());
        //$this->signIn();
        $transaction = factory('App\Transaction')->make();
        //dd($transaction->toArray());

        $response = $this->post('/', $transaction->toArray());
        //dd($response);
        // $this->get($response->headers->get('Location'))
        //     ->assertSee($thread->title)
        //     ->assertSee($thread->body);
    }
}
