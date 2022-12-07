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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('user');

            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('address');
            $table->date('birthday');
            $table->string('gender');
            $table->string('religion');
            $table->string('civil_status');
            $table->string('educational_attainment');
            $table->string('contact_no');
            $table->string('enrolled');
            $table->string('employment_status');
            $table->string('solo_parent')->nullable();
            $table->string('pwd');
            $table->string('disability')->nullable();
            $table->string('lgbtq');
            $table->string('youth_member');
            $table->string('youth_org')->nullable();
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_address');
            $table->string('emergency_contact_no');
            $table->string('emergency_contact_relationship');


            $table->rememberToken();
            $table->timestamps();
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
};
