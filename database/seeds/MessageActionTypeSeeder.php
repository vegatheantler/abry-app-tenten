<?php

use Illuminate\Database\Seeder;
use App\MessageActionType;

class MessageActionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        MessageActionType::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        MessageActionType::insert(
            [
                [
                    'name'          => 'Link',
                ],
            ]
        );
    }
}
