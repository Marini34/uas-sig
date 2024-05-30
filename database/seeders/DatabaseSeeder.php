<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Filesystem\Filesystem;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            SuperAdminSeeder::class
        ]);

        $fs = new Filesystem;
        
        // Delete files
        $except_file_names = [
            'menu\food.png', // Add file names to exclude (menu\<file_name)
            'menu\ayam goreng.jpg', 
            'menu\bebek goreng.jpg', 
            'menu\kentang goreng.jpg', 
            'menu\pisang goreng.jpg', 
        ];

        $file_paths = $fs->files(public_path('upload/menu'));
        foreach ($file_paths as $file_path) {
            $file_name = last(explode('/', $file_path));
            if (!in_array($file_name, $except_file_names)) {
                $fs->delete($file_path);
            }
        }

        echo "Upload/menu/* successfully deleted!\n";
        // \App\Models\User::factory(10)->create();

        \App\Models\CenterPoint::create([
            'coordinates' => '-0.07594398265588857, 109.36148888980208'
        ]);

        \App\Models\Spot::create([
            'name' => 'Ayani Megamall',
            'slug' => 'ayani-megamall',
            'coordinates' => '-0.051521344763126184, 109.34559593083563',
            'description' => 'Pusat perbelanjaan bertingkat yang bernuansa santai ini memiliki berbagai toko retail & opsi bersantap kasual.'
        ]);

        \App\Models\Menu::create([
            'nama' => 'Food',
            'gambar' => 'food.png',
            'harga' => 10000
        ]);

        \App\Models\Menu::create([
            'nama' => 'Ayam Goreng',
            'gambar' => 'ayam goreng.jpg',
            'harga' => 20000
        ]);

        \App\Models\Menu::create([
            'nama' => 'Bebek Goreng',
            'gambar' => 'bebek goreng.jpg',
            'harga' => 15000
        ]);

        \App\Models\Menu::create([
            'nama' => 'Kentang Goreng',
            'gambar' => 'kentang goreng.jpg',
            'harga' => 12000
        ]);

        \App\Models\Menu::create([
            'nama' => 'Pisang Goreng',
            'gambar' => 'pisang goreng.jpg',
            'harga' => 5000
        ]);
    }
}
