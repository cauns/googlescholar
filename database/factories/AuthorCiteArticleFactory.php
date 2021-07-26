<?php

namespace Database\Factories;

use App\Models\AuthorCiteArticle;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorCiteArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AuthorCiteArticle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id' => $this->faker->word,
        'cite_id' => $this->faker->word,
        'article_id' => $this->faker->word,
        'by_author' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
