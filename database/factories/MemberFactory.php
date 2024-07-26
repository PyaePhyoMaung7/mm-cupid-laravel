<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Member::class;

    public function definition()
    {
        $gender             = $this->faker->randomElement([0, 1]);
        $partner_gender     = $gender === 0 ? 1 : 0;
        $min_age            = 18;
        $max_age            = 55;
        $partner_min_age    = $this->faker->numberBetween($min_age, $max_age);
        $partner_max_age    = $this->faker->numberBetween($partner_min_age, $max_age);

        return [
            'username'              => $this->faker->userName,
            'password'              => bcrypt('password'),
            'email'                 => $this->faker->unique()->safeEmail,
            'phone'                 => '09' . $this->faker->randomNumber(9, true),
            'email_confirm_code'    => Str::random(32),
            'gender'                => $gender,
            'date_of_birth'         => $this->faker->dateTimeBetween('-55 years', '-18 years')->format('Y-m-d'),
            'education'             => $this->faker->randomElement([
                'High School', 'Associate Degree', 'Bachelor\'s Degree', 'Master\'s Degree', 'PhD'
            ]),
            'city_id'               => $this->faker->numberBetween(1, 14),
            'height_feet'           => $this->faker->numberBetween(1, 6),
            'height_inches'         => $this->faker->numberBetween(1, 11),
            'status'                => $this->faker->numberBetween(1, 6),
            // 'love_status' => $this->faker->randomElement([0, 1]),
            'about'                 => $this->faker->sentence,
            'partner_gender'        => $partner_gender,
            'partner_min_age'       => $partner_min_age,
            'partner_max_age'       => $partner_max_age,
            'point'                 => 1000,
            'work'                  => $this->faker->sentence,
            'religion'              => $this->faker->numberBetween(1, 7),
            'thumbnail'             => $this->faker->lexify('??????????') . '.' . $this->faker->randomElement(['jpg', 'jpeg', 'png', 'webp', 'gif']),
        ];
    }
}
