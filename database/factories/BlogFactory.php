<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Título' => $this->faker->sentence(3),
            'Contenido'=>  $this->faker->sentence(10),
            'Fecha de publicación'=> $this->faker->dateTimeBetween('-1 years', 'now'),
            'Autor'=> $this->faker->name(),
            'Categoria'=> $this->faker->word(),
            'Número de vistas'=> $this->faker->numberBetween(0, 1000),
            'Imagen destacada'=> $this->faker->imageUrl(640, 480, 'profile', true),
            'Etiquetas'=> $this->faker->word()           
        ];
    }
}
