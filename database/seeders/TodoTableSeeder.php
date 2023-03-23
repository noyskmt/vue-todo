<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Controllers\TodoController;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;


class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            'name' => "",
            'created_at' => new Datetime(),
            'updated_at' => new Datetime()
        ]);
    }
}

