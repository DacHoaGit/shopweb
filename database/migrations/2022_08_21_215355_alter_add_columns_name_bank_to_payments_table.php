<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('payments', 'name_bank')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->string('name_bank');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('payments', 'name_bank')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->dropColumn('name_bank');
            });
        }
    }
};
