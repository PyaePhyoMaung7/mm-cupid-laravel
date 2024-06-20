<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('username', 250);
            $table->string('password', 60);
            $table->string('email', 150);
            $table->string('phone', 100);
            $table->string('email_confirm_code', 32);
            $table->unsignedTinyInteger('gender');
            $table->date('date_of_birth');
            $table->mediumText('education');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('height_feet');
            $table->unsignedInteger('height_inches');
            $table->unsignedTinyInteger('status')
            ->comments("0 = unverified, 1 = email_confirmed, 2 = pending, 3 = denied, 4 = approved, 5 = banned, 6 = get_partner,");
            // $table->unsignedTinyInteger('love_status');
            $table->text('about')->nullable();
            $table->unsignedTinyInteger('partner_gender');
            $table->unsignedInteger('partner_min_age')->nullable();
            $table->unsignedInteger('partner_max_age')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->unsignedInteger('point');
            $table->mediumText('work')->nullable();
            $table->unsignedTinyInteger('religion')
            ->nullable()
            ->comments("1 = Christian, 2 = Muslim, 3 = Buddhist, 4 = Hindu, 5 = Jain, 6 = Shinto, 7 = Atheist, 8 = Other");
            $table->string('thumbnail', 200)->nullable();
            $table->longText('verify_photo')->nullable();
            $table->unsignedInteger('view_count')->default(0);
            $table->unsignedInteger('updated_by');
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};
