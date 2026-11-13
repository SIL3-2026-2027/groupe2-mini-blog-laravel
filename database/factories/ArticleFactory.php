<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(6), // Un titre de 6 mots
            'image' => 'https://picsum.photos/seed/' . fake()->word() . '/800/400', // Image aléatoire
            'contenu' => fake()->paragraphs(3, true), // 3 paragraphes
            'publie' => fake()->boolean(80), // 80% de chance d'être publié
            'user_id' => \App\Models\User::factory(), // Crée un auteur
        ];
    }
}