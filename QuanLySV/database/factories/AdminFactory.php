<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //protected $model = Admin::class;
                                    //php artisan make:factory AdminFactory --model=Admin
    public function definition(): array
    {
        return [
            'admin_name' => $this->faker->name(),
            'admin_email' => $this->faker->unique()->safeEmail(),
            'admin_password' => '$2y$12$7qR34r9WZ90hsSa5YTQaLuessYpbSphkO51j4Fie4uVu7HG8rdcoa',
            'admin_phone' => '0' . $this->faker->unique()->numberBetween(700000000, 999999999),
            'admin_avatar' => 'gv1.jpg',
        ];
    }
}
