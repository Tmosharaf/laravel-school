<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            [
                'id'     => 1,
                'name'  =>  'One',
            ],
            [
                'id'     => 2,
                'name'  =>  'Two',
            ],
            [
                'id'     => 3,
                'name'  =>  'Three',
            ],
            [
                'id'     => 4,
                'name'  =>  'Four',
            ],
            [
                'id'     => 5,
                'name'  =>  'Five',
            ],
            [
                'id'     => 6,
                'name'  =>  'Six',
            ],
            [
                'id'     => 7,
                'name'  =>  'Seven',
            ],
            [
                'id'     => 8,
                'name'  =>  'Eight',
            ],
            [
                'id'     => 9,
                'name'  =>  'Nine',
            ],
            [
                'id'     => 10,
                'name'  =>  'Ten',
            ],
            [
                'id'     => 11,
                'name'  =>  'Eleven',
            ],
            [
                'id'     => 12,
                'name'  =>  'Twelve',
            ],
        ];

        foreach ($classes as $class) {
            \App\Models\Classes::updateOrCreate($class);
        }
    }
}
