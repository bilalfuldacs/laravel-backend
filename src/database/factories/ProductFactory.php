use Illuminate\Support\Str;

public function definition(): array
{
    return [
        'name' => fake()->words(2, true),
        'description' => fake()->sentence(),
        'price' => fake()->randomFloat(2, 10, 1000),
        'stock' => fake()->numberBetween(1, 100),
    ];
}