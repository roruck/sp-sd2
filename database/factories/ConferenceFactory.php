<?php
namespace Database\Factories;

use App\Models\Conference;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ConferenceFactory extends Factory
{
    protected $model = Conference::class;

    public function definition(): array
    {
        $date = Carbon::now()->addDays($this->faker->numberBetween(-10, 40))->toDateString();

        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(3),
            'speakers' => $this->faker->name(),
            'date' => $date,
            'time' => $this->faker->randomElement(['09:00', '10:00', '11:30', '13:00', '15:00']),
            'address' => $this->faker->city(),
        ];
    }
}
