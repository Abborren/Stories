<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contexts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('text');
            $table->timestamps();
        });
        $text = [
            'skolan',
            'arbetsplatsen',
            'källaren',
            'zoo',
            'hörnrummet',
            'kontoret',
            'simhallen',
            'quake',
            'julafton',
            'stranden'
        ];

        foreach($text as $val) {
            DB::table('contexts')->insert( [
                'text' => $val,
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contexts');
    }
}
