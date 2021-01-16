<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExpiretimeToStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('stories', function (Blueprint $table) {
                $table->dateTime('expire_time')->default(\Illuminate\Support\Carbon::now()->addDay());
            });
    }


}
