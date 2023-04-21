<?php

use App\Models\Role;
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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
           // $table->unsignedBigInteger('role_id')->default(1);
            $table->string('password');
            $table->string('phone');
            $table->string('photo');
            $table->boolean('is_admin');
            $table->timestamps();
        });

        // $roles = ['User', 'Admin'];

        // foreach ($roles as $role) 
        // {
        //     Role::create(['name' => $role]);
        // }
    }

    
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
