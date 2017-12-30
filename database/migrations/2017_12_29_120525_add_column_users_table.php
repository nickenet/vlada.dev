<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('surname',60)->nullable()->after('password');
            $table->string('firstname',60)->nullable()->after('surname');
            $table->string('lastname',60)->nullable()->after('firstname');
            $table->string('phone',15)->nullable()->after('lastname');
            $table->string('secondary_phone',15)->nullable()->after('phone');
            $table->integer('gender_id')->unsigned()->index()->after('secondary_phone');
            $table->foreign('gender_id')->references('id')->on('gender')->onDelete('cascade');
            $table->string('facebook',120)->nullable()->after('gender_id');
            $table->string('twitter',120)->nullable()->after('facebook');
            $table->string('google',120)->nullable()->after('twitter');
            $table->string('ok',120)->nullable()->after('google');
            $table->string('vk',120)->nullable()->after('ok');
            $table->string('youtube',120)->nullable()->after('vk');
            $table->string('about',400)->nullable()->after('youtube');
            $table->string('profile_image',255)->default('users/default.png')->after('about');
            $table->integer('role_id')->nullable()->default(0)->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign('users_gender_id_foreign');
            $table->dropColumn(['surname','firstname','lastname','phone','secondary_phone','gender_id','facebook','twitter','google','ok','vk','youtube','about','profile_image','rele_id']);
        });
    }
}
