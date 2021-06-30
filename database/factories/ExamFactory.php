<?php

namespace Database\Factories;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $i;
        $i++;
        return [
            'name'=>json_encode([
            'en'=>$this->faker->word(),
            'ar'=>$this->faker->word(),
            ]),
            'desc'=>json_encode([
                'en'=>$this->faker->text(5000),
                'ar'=>$this->faker->text(5000),
                ]),
                'img'=>"exam/$i.jpg",
                'difficulty'=>$this->faker->numberBetween(1,3),
                'duration_mins'=>$this->faker->numberBetween(1,3)*300,
                'question_no'=>15,
            //
        ];
    }
}
