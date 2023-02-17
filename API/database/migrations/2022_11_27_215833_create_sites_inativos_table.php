<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * IMPORTANTE:
     * Creating date is informed on created_at timestamps.
     * The Time to Expiration can be calculated with an method that reduces today from final_date,
     * so that's no necessary to create a column at the table's database.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('sites_inativos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->integer('status');
            $table->timestamps();
            $table->date('final_date');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites_inativos');
    }
};
