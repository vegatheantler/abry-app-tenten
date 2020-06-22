<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->truncate();
        DB::table('messages')->truncate();
        DB::table('message_action_type')->truncate();
        DB::table('message_templates')->truncate();
        DB::table('rich_messages')->truncate();
        DB::table('rich_message_types')->truncate();
        DB::table('text_messages')->truncate();
        DB::table('videos')->truncate();
        DB::table('video_messages')->truncate();

        $this->call([
            RichMessageTypeSeeder::class,
            MessageActionTypeSeeder::class,
            MessageTemplateSeeder::class,
        ]);
    }
}
