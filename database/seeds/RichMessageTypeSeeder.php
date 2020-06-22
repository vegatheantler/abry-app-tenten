<?php

use Illuminate\Database\Seeder;
use App\RichMessageType;

class RichMessageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        RichMessageType::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        RichMessageType::insert(
            [
                [
                    'name'          => 'Single',
                    'image_count'   => 1,
                ],
                [
                    'name'          => 'Split Vertical',
                    'image_count'   => 2,
                ],
                [
                    'name'          => 'Split Horizontal',
                    'image_count'   => 2,
                ],
                [
                    'name'          => 'Three Horizontal',
                    'image_count'   => 3,
                ],
                [
                    'name'          => 'Four Squares',
                    'image_count'   => 4,
                ],
                [
                    'name'          => 'Single double',
                    'image_count'   => 3,
                ],
                [
                    'name'          => 'Headline',
                    'image_count'   => 3,
                ],
                [
                    'name'          => 'Six Squares',
                    'image_count'   => 6,
                ],
            ]
        );
    }
}
