<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    class CreateAnimalsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('animals', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('desc');
                $table->string('sex');
                $table->smallInteger('age');
                $table->smallInteger('weight');
                $table->smallInteger('size');
                $table->timestamps();
            });
            Schema::table('animals', function (Blueprint $table) {
                $table->unsignedBigInteger('race_id');
                $table->foreign('race_id')->references('id')->on('races');
                $table->unique('name');
            });
        }
        
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('animals');
        }
    }


