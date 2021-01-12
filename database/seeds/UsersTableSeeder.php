<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name" => "Site Administrator",
                "email" => "admin@mail.com",
                "email_verified_at" => now(),
                "roles" => json_encode(["Admin"]),
                "phone" => "081939448487",
                "password" => \Hash::make("rahasia"),
            ],
            [
                "name" => "Site Staff",
                "email" => "staff@mail.com",
                "email_verified_at" => now(),
                "roles" => json_encode(["Staff"]),
                "phone" => "081939448487",
                "password" => \Hash::make("rahasia"),
            ],
            [
                "name" => "Site Member",
                "email" => "member@mail.com",
                "email_verified_at" => now(),
                "roles" => json_encode(["Member"]),
                "phone" => "081939448487",
                "password" => \Hash::make("rahasia"),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
