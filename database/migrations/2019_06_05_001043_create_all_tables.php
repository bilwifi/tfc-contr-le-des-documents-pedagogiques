<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        Schema::create('professeurs', function (Blueprint $table) {
            $table->increments('idprofesseurs');
            $table->string('idsecope')->unique();
            $table->string('nom');
            $table->string('postnom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('qualification')->nullable();
            $table->string('attribution')->nullable();
            $table->integer('anciennete')->nullable();
            // Pour le système
            $table->string('pseudo')->unique();
            $table->string('password');
            $table->enum('user_role',['admin','professeur']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('types_documents', function (Blueprint $table) {
            $table->increments('idtypes_documents');
            $table->string('lib');
            // $table->timestamps();
        });

        Schema::create('ponderations_documents', function (Blueprint $table) {
            $table->increments('idponderations_documents');
            $table->string('lib');
            $table->string('commentaire')->nullable();
            $table->integer('max');
            $table->unsignedInteger('idtypes_documents');
            $table->string('slug')->unique();


            $table->foreign('idtypes_documents')
                  ->references('idtypes_documents')->on('types_documents')->onDelete('cascade');


            // $table->timestamps();
        });

        Schema::create('controles_documents', function (Blueprint $table) {
            $table->increments('idcontroles_documents');
            $table->unsignedInteger('idprofesseurs');
            $table->unsignedInteger('idconseillers');
            $table->string('remarques');
            $table->timestamps();

            $table->foreign('idprofesseurs')
                  ->references('idprofesseurs')->on('professeurs')->raw('ON DELETE SET NULL');
            $table->foreign('idconseillers')
                  ->references('idprofesseurs')->on('professeurs')->raw('ON DELETE SET NULL');

        });

        Schema::create('cotations_documents', function (Blueprint $table) {
            $table->increments('idcotations_documents');
            $table->unsignedInteger('idcontroles_documents');
            $table->unsignedInteger('idponderations_documents');
            $table->integer('cote');
            // $table->timestamps();

            $table->foreign('idcontroles_documents')
                  ->references('idcontroles_documents')->on('controles_documents')->onDelete('cascade');
            $table->foreign('idponderations_documents')
                  ->references('idponderations_documents')->on('ponderations_documents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotations_documents');
        Schema::dropIfExists('controles_documents');
        Schema::dropIfExists('ponderations_documents');
        Schema::dropIfExists('types_documents');
        Schema::dropIfExists('professeurs');

    }
}
