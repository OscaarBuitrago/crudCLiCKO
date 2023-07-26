<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Creating 4 differents domain names in an array to be assigned randomly to the mail address.

        $domains = ['gmail.com', 'clicko.es', 'outlook.es', 'hotmail.com']; 

        //Generating the 20 new users to be added to the database

        for ($i = 0; $i < 20; $i++) {
            $name = $this->generateRandomName();
            $email = $this->generateRandomEmail($domains);

            User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt('123456'),
            ]);
        }
    }

    // Method that creates an array with different common names and mixtwo of them randomly to generate different user names.

    private function generateRandomName()
    {
        $names = ['Thiago', 'Oscar', 'Martin', 'Maria', 'Martina', 'Jose', 'David', 'Olivia'];
        return $names[array_rand($names)] . ' ' . $names[array_rand($names)];
    }

    // Method that creates an array with different common names and mixtwo of them randomly to generate different user names.

    private function generateRandomEmail($domains)
    {
        $username = strtolower(Str::random(8)); // Random string of 8 characters to add them to the mail address.
        $domain = $domains[array_rand($domains)]; // Pick 1 of the 4 given domains to create the email address.
        return $username . '@' . $domain;
    }
}
