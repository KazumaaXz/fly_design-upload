<?php

namespace Database\Seeders;

// Make sure to import the Product model
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use function PHPSTORM_META\type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // This array contains the names for your products
        $data = ['Canva', 'Alight Motion', 'Figma', 'Kinemaster', 'Corel Draw'];

        // Loop through each product name and create a new Product record
        foreach ($data as $nama) {
            Type::create([
                'name' => $nama,
                'slug' => Str::slug($nama),
            ]);                      
        }
    }
}
