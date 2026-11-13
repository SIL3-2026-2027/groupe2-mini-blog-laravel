<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
       /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // Clé primaire (BIGINT)
            
            // Clé étrangère vers la table users
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();
                  
            $table->string('title'); // VARCHAR(255)
            $table->text('contenu'); // TEXT
            $table->boolean('publie')->default(false); // TINYINT(1) par défaut à 0
            
            $table->timestamps(); // created_at et updated_at
        });
    }
};
