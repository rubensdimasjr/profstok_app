<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AgendamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Agendamento::factory(20)->create();
    }
}
