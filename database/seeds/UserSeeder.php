<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'username' => 'demo',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('polls')->insert([
            'user_id' => 1,
            'title' => 'What are some of your favorite things?',
            'details' => 'In this poll, you will answer a few questions about some of your favorite things in life.  What makes you happy to be alive?',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        DB::table('questions')->insert([
            ['id' => 1, 'poll_id' => 1, 'question' => 'What style of music makes you want to get up and move?', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 2, 'poll_id' => 1, 'question' => 'Which genre of movie keeps you on the edge of your seat?', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 3, 'poll_id' => 1, 'question' => 'What kind of food makes your mouth water?', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 4, 'poll_id' => 1, 'question' => 'Which type of physical activity gets you pumped?', 'created_at' => NOW(), 'updated_at' => NOW()],
        ]);

        DB::table('responses')->insert([
            ['question_id' => 1, 'response' => 'Rock', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['question_id' => 1, 'response' => 'Country', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['question_id' => 1, 'response' => 'Hip-Hop', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['question_id' => 1, 'response' => 'Pop', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['question_id' => 1, 'response' => 'Electronic', 'created_at' => NOW(), 'updated_at' => NOW()],

            ['question_id' => 2, 'response' => 'Action/Adventure', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['question_id' => 2, 'response' => 'Horror', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['question_id' => 2, 'response' => 'Comedy', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['question_id' => 2, 'response' => 'Romance', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['question_id' => 2, 'response' => 'Drama', 'created_at' => NOW(), 'updated_at' => NOW()],

            ['question_id' => 3, 'response' => 'American', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['question_id' => 3, 'response' => 'Mexican', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['question_id' => 3, 'response' => 'Asian', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['question_id' => 3, 'response' => 'Italian', 'created_at' => NOW(), 'updated_at' => NOW()],

            ['question_id' => 4, 'response' => 'Running', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['question_id' => 4, 'response' => 'Weight Lifting', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['question_id' => 4, 'response' => 'Sports', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['question_id' => 4, 'response' => 'Martial Arts', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['question_id' => 4, 'response' => 'Swimming', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['question_id' => 4, 'response' => 'None', 'created_at' => NOW(), 'updated_at' => NOW()],
        ]);

        factory(App\UserResponse::class, 50)->create();
    }
}
