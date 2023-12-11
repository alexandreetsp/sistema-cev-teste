<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vagas;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(VagaSeeder::class);
        $this->call(UserSeeder::class);
    }
}

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = \Database\Factories\UserFactory::new()->count(50)->create();

        $adminUser = User::factory()->admin()->create();

        $userTypeUser = User::factory()->user()->create();

        $existingVagas = \App\Models\Vagas::all();

        foreach ($users as $user) {
            $numberOfVagasToAssociate = rand(1, $existingVagas->count());

            $randomVagas = $existingVagas->random($numberOfVagasToAssociate);

            $user->vagas()->attach($randomVagas);
        }

    }
}

class VagaSeeder extends Seeder
{
    public function run()
    {
        \Database\Factories\VagasFactory::new()->count(20)->create();
    }
}
