<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $adminUser = User::where('role', 'admin')->first();
        $authorUser = User::where('role', 'author')->first();
        $types = Type::all();

        if ($adminUser && $authorUser && $types->count() > 0) {
            for ($i = 1; $i <= 10; $i++) {
                $user = ($i % 2 == 0) ? $adminUser : $authorUser;
                $singleType = $types->random();

                $randomPrice = rand(10000, 100000);
                $randomDiscount = rand(10, 100);
                $title = "Sample Product {$i} - {$singleType->name}";

                Product::create([
                    'user_id' => $user->id,
                    'type_id' => $singleType->id,
                    'title' => $title,
                    'meta_desc' => "A short description for {$title}",
                    'slug' => Str::slug($title),
                    'description' => "This is the detailed description for {$title}. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                    'image' => null,
                    'status' => true,
                    'price' => $randomPrice,
                    'discount' => 0,
                    'stock' => rand(1, 100),
                    'sku' => "SKU-{$i}",
                ]);
            }
        }
    }
}
