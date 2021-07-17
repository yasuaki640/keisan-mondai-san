<?php

namespace Database\Factories;

use App\Models\QuestionSummary;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionSummaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuestionSummary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $answerStartAt = $this->faker->dateTimeBetween('-1year', '-1day');

        return [
            'user_id' => User::factory()->create()->id,
            'num_of_questions' => $this->faker->numberBetween(1, 100),
            'operator' => $this->getRandomOperator(),
            'answer_start_at' => $answerStartAt,
            'answer_end_at' => $answerStartAt->modify('+10minutes'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    private function getRandomOperator(): string
    {
        $key = array_rand(QuestionSummary::OPERATOR_LIST);
        return QuestionSummary::OPERATOR_LIST[$key];
    }
}
