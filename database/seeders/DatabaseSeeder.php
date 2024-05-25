<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Follow;

use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userCount = 100;
        User::factory($userCount)->create();
        
        User::create([
          'name' => 'rafi adrian',
          'username' => 'aleensky',
          'email' => 'aleensky39@gmail.com',
          'password' => bcrypt('skyline39@'),
          'two_factor_secret' => null,
          'two_factor_recovery_codes' => null,
          'remember_token' => Str::random(10),
          'bio' => 'saya pemilik web skyline',          'profile_photo_path' => null,
          'current_team_id' => null,
          'is_admin' => true
        ]) ;
         
        Post::factory(50)->create();
        
        Category::create([
          "slug" => "programming",
          "name" => "Programming"
        ]);
        
        Category::create([
          "slug" => "sports",
          "name" => "Sports"
        ]);
        
        Category::create([
          "slug" => "culinary",
          "name" => "Culinary"
        ]);
        
        Category::create([
          "slug" => "meme",
          "name" => "Meme"
        ]);
        
        Category::create([
          "slug" => "creativity",
          "name" => "Creativity"
        ]);
        
        for($i = 1; $i <= $userCount; $i++){
          Follow::create([
            "from_user_id" => $i,
            "to_user_id" => 101
          ]);
        }
    }
}
