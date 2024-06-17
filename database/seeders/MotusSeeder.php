<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $words = ['apple', 'grape', 'peach', 'plum', 'berry'];

        foreach ($words as $word) {
            DB::table('motus')->insert([
                'word' => $word,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
