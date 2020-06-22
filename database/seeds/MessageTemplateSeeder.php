<?php

use Illuminate\Database\Seeder;
use App\MessageTemplate;

class MessageTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        MessageTemplate::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        factory(MessageTemplate::class, 10)->create();
    }
}
