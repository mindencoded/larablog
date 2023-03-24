<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::truncate();
        for ($i = 1; $i <= 20; $i++) {
            $user = User::inRandomOrder()->first();
            Contact::create([
                'name' => 'Contact ' . $i,
                'surname' => 'Contact ' . $i,
                'content' => 'Contact ' . $i,
                'email' => 'contact_' . $i . '@email.com',
                'user_id' => $user ? $user->id : null
            ]);
        }
    }
}
