<?php

use App\Instructor;
use Illuminate\Database\Seeder;

class InstructorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $instructors = [
            [
                "name" => "Muhammad Kuswari",
                "job" => "Mahasiswa",
                "expertise" => "Fullstack Developer",
                "email" => "muhammadkuswari@mail.com",
                "about" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eleifend nunc eu turpis pharetra, ut tristique sapien."
            ],
            [
                "name" => "Ricky Anwar",
                "job" => "Frontend Developer",
                "expertise" => "Frontend Developer Expert",
                "email" => "rickyanwar@mail.com",
                "about" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eleifend nunc eu turpis pharetra, ut tristique sapien.",
            ]
        ];

        foreach ($instructors as $instructor) {
            Instructor::create($instructor);
        }
    }
}
