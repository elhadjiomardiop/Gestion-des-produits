<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Électronique', 'description' => 'Appareils électroniques et gadgets'],
            ['name' => 'Vêtements', 'description' => 'Vêtements et accessoires'],
            ['name' => 'Maison & Jardin', 'description' => 'Articles pour la maison et le jardin'],
            ['name' => 'Sport & Loisirs', 'description' => 'Équipements sportifs et de loisirs'],
            ['name' => 'Livres', 'description' => 'Livres et magazines'],
            ['name' => 'Alimentation', 'description' => 'Produits alimentaires et boissons'],
            ['name' => 'Beauté & Santé', 'description' => 'Produits de beauté et de santé'],
            ['name' => 'Automobile', 'description' => 'Accessoires et pièces automobiles'],
            ['name' => 'Jouets & Jeux', 'description' => 'Jouets et jeux pour enfants'],
            ['name' => 'Bricolage', 'description' => 'Outils et matériaux de bricolage'],
            
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}