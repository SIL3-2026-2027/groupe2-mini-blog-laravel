<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Créer un utilisateur de test pour nous connecter
        User::factory()->create([
            'name' => 'Awa Diop',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), 
        ]);

        // Créer 10 articles
        Article::factory()->count(10)->create();
    }
}