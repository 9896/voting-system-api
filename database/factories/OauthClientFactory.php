<?php

namespace Database\Factories;

use App\Models\OauthClient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OauthClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OauthClient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'created_at' => now(),
            'name' => 'Password Grant',
            'password_client' => 1,
            'personal_access_client' => 0,
            'provider' => 'users',
            'redirect' => 'http://localhost',
            'revoked' => 0,
            'secret' => Str::random(40),
            'updated_at' => now(),
            'user_id' => $this->faker->unique()->numberBetween($min = 1, $max = 120),


        ];
    }
}
