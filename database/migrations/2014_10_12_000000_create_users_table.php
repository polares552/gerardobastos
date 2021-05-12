<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->nullable(true);
            $table->string('name')->nullable(false);;
            $table->tinyInteger('gender', 1)->default(1)->nullable(false);
            $table->string('cpf_cnpj', 20)->nullable(false);
            $table->string('rg', 20)->nullable(true);
            $table->string('phone', 20)->nullable(false);
            $table->string('mobile', 20)->nullable(true);
            $table->date('birth_date')->nullable(true);
            $table->string('zipcode', 15)->nullable(false);
            $table->char('state', 3)->nullable(false);
            $table->string('county')->nullable(false);
            $table->string('district')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('number', 5)->nullable(false);
            $table->string('complement')->nullable(true);
            $table->char('fidelity',1)->nullable(false)->default('N');
            $table->date('fidelity_date',1)->nullable(true);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
