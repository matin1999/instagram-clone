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
            Schema::table('stories', function (Blueprint $table) {
                $table->timestamp('expire_time')->default(\Carbon\Carbon::now()->addDay());
            });
        });
    }


}
