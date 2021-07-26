<?php

namespace Database\Factories;

use App\Models\Cite;
use Illuminate\Database\Eloquent\Factories\Factory;

class CiteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cite::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cite_id' => $this->faker->word,
        'total' => $this->faker->randomDigitNotNull,
        'total_only_author' => $this->faker->randomDigitNotNull,
        'total_not_by_author' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
