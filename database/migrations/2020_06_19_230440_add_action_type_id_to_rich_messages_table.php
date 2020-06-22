<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActionTypeIdToRichMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rich_messages', function (Blueprint $table) {
            $table->foreignId('message_action_type_id')
                ->constrained()
                ->after('rich_message_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rich_messages', function (Blueprint $table) {
            $table->dropForeign('rich_messages_message_action_type_id_foreign');
        });
    }
}
