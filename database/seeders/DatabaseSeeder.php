<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        Author::factory()->create([
            'name' => "Robert Greene",
        ]);

        Book::factory()->create([
            'title' => "Mastery",
            'description' => 'In this book, Robert Greene demonstrates 
            that the ultimate form of power is mastery itself. 
            By analyzing the lives of such past masters as 
            Charles Darwin, Benjamin Franklin, Albert Einstein, 
            and Leonard da Vinci, as well as by interviewing nine contemporary masters, 
            including tech guru Paul Graham and animal rights advocate Temple Grandin, 
            Greene debunks our culture’s many myths about genius and distills the wisdom of the ages to 
            reveal the secret to greatness. With this seminal text as a guide, 
            readers will learn how to unlock the passion within and become masters.',
            'published_at' => '2012-08-13'
        ]);

        \App\Models\User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);
    }
}
