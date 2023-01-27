<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\ContactType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact = ContactType::create(['name' => 'email']);
        $contact = ContactType::create(['name' => 'whatsapp']);
        $contact = ContactType::create(['name' => 'telefone']);
        User::factory()->state(['email' => 'teste@teste.com','password' => bcrypt('teste')])
            ->has(Contact::factory()->state(['type_id' => $contact->id])->count(20), 'contacts')->create();
        User::factory()->count(10)
            ->has(Contact::factory()->state(['type_id' => $contact->id])->count(20), 'contacts')->create();
    }
}
