<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DefaultRaces::class);
        $this->call(DefaultKlasses::class);
        $this->call(DefaultQuestions::class);
    }
}
