<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    const tags = ["React", 'Api', 'Laravel', 'PHP','Back-end','Front-end','Full-stack'];
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //I still have not figured out on how to handle in making an admin account,
        // So I just hardcoded an admin account
        $user = User::factory()->create([
            "name" => "John Doe",
            "email" => "john@gmail.com",
            "is_admin" => "1",
            "password" => bcrypt("admin1234"),
        ]);

        $listing = Listing::factory(6)->create([
            "user_id" => $user->id,
        ]);
        
        //For the time being, im making tag manually. But eventually I will make it with a factory

        // Tag::create([
        //     "tag_id" => $listing->id,
        //     "tag_name" => "React",
        // ]);
        // Tag::create([
        //     "tag_id" => $listing->id,
        //     "tag_name" => "Api",
        // ]);
        // Tag::create([
        //     "tag_id" => $listing->id,
        //     "tag_name" => "Laravel",
        // ]);
        // Tag::create([
        //     "tag_id" => $listing->id,
        //     "tag_name" => "PHP",
        // ]);
        // Tag::create([
        //     "tag_id" => $listing->id,
        //     "tag_name" => "Back-end",
        // ]);
        // Tag::create([
        //     "tag_id" => $listing->id,
        //     "tag_name" => "Front-end",
        // ]);
        // Tag::create([
        //     "tag_id" => $listing->id,
        //     "tag_name" => "Full-stack",
        // ]);
    }
}
