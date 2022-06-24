Skip to content
Product 
Team
Enterprise
Explore 
Marketplace
Pricing 
Search
Sign in
Sign up
samironbarai
/
laravel_chat
Public
Code
Issues
6
Pull requests
20
Actions
Projects
Wiki
Security
Insights
laravel_chat/database/migrations/2014_10_12_000000_create_users_table.php /
@samironbarai
samironbarai All files uploaded
Latest commit 3fede96 on 3 Sep 2019
 History
 1 contributor
37 lines (34 sloc)  851 Bytes
CLICK ME

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
}
