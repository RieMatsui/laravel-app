<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{

    public function up()
    {
        if (Schema::hasTable('folder')) {
            Schema::rename('folder', 'folders');
        }
    }
}
