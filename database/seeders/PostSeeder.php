<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'judul' => "Pelatihan CRUD",
            'deskripsi' => "Belajar bersama mengenai CRUD",
            'created_at' => "2023-09-30 15:56:57",
            'updated_at' => "2023-09-30 15:56:57",
        ];
        Post::insert($data);
    }
}
