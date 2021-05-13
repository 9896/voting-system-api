<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //Dep.    B.Compsci, B.Law, B. Medicine, B.Fashion and design
        //faculty Science, Law, Medicine, Arts
        //Reg.No  S13    , L12, M11      ,A10
        $hp = Hash::make(12345678);
        $academic_status = array('poor', 'good');
        $disciplinary_status = array('poor', 'good');
        $year = array(1,2,3,4);
        $semester = array(1,2);

        return [
            'registration_no' => 'A10/'.$this->faker->unique()->numberBetween($min = 1, $max = 30),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => $hp, // password
            'remember_token' => Str::random(10),
            'faculty' => 'Arts',
            'department' => 'BSC Fashion and Design',
            'academic_status' => $academic_status[array_rand($academic_status)],
            'disciplinary_status' => 'good',
            'state' => 'student',
            'year' =>  $year[array_rand($year)],
            'semester' => $semester[array_rand($semester)]
        ];
    }
}
