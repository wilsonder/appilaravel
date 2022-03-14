<?php

namespace Database\Factories;




use App\Models\Categorias;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'Categorias_id' => Categorias::inRandomOrder()->first()->id,
            'titulo' => $this->faker->word(),
            'contenido' => $this->faker->paragraph(),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),


        ];
    }
}
