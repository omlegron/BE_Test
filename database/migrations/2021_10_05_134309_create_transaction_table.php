<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name')->nullable();
            
            $table->tinyInteger('active')->default(1)->nullable()->comment('0:Non-Active, 1: Active');
            
            $table->timestamps();
            // $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
        });

        Schema::create('education', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name')->nullable();
            
            $table->boolean('active')->default(1)->nullable()->comment('0:Non-Active, 1: Active');
            
            $table->timestamps();
            // $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
        });

        Schema::create('religion', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name')->nullable();
            
            $table->boolean('active')->default(1)->nullable()->comment('0:Non-Active, 1: Active');
            
            $table->timestamps();
            // $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
        });

        Schema::create('university', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name')->nullable();
            
            $table->string('score')->nullable();
            
            $table->unsignedBigInteger('recommendation_university_id')->nullable();
            
            $table->boolean('active')->default(1)->nullable()->comment('0:Non-Active, 1: Active');
            
            $table->timestamps();
            // $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
        });

        Schema::create('source_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name')->nullable();
            
            $table->boolean('active')->default(1)->nullable()->comment('0:Non-Active, 1: Active');
            
            $table->timestamps();
            // $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
        });

        Schema::create('candidate_status', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('status')->nullable();
            
            $table->string('code')->nullable();
            
            $table->boolean('active')->default(1)->nullable()->comment('0:Non-Active, 1: Active');
            
            $table->timestamps();
            // $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
        });

        Schema::create('candidates', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name');
            
            $table->enum('gender',['P', 'L'])->comment('P:Perempuan, L:Laki-laki');

            $table->string('city_of_birth');
            $table->string('date_of_birth');

            $table->unsignedBigInteger('religion_id');

            $table->string('email');

            $table->string('phone');
            
            $table->string('identity_number');

            $table->string('identity_file');

            $table->unsignedBigInteger('bank_id');

            $table->string('bank_account');

            $table->string('bank_name');

            $table->text('address');

            $table->unsignedBigInteger('education_id');

            $table->unsignedBigInteger('university_id')->nullable();

            $table->string('university_other')->nullable();

            $table->text('major');

            $table->string('graduation_year')->nullable();

            $table->tinyInteger('in_college')->nullable();
            
            $table->string('semester')->nullable();

            $table->text('skill');
            
            $table->string('file_cv');

            $table->string('file_photo');

            $table->string('file_portofolio');

            $table->unsignedBigInteger('source_information_id')->nullable();

            $table->string('source_information_other')->nullable();

            $table->string('ranking')->nullable();

            $table->string('assessment_score')->nullable();

            $table->tinyInteger('mail_sent')->default(0)->nullable()->comment('0: Not Yet, 1: Done');

            $table->string('instagram')->nullable();

            $table->string('twitter')->nullable();

            $table->string('linkedin')->nullable();

            $table->string('facebook')->nullable();

            $table->unsignedBigInteger('candidate_status_id')->nullable();
            
            $table->boolean('aggrement')->nullable()->comment('0:Not-Accept, 1: Accept');

            $table->timestamps();
            // $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

            $table->string('work_unit')->nullable();
            $table->string('apprentice_vacancy')->nullable();
            $table->string('apprentice_type')->nullable();
            $table->string('apprentice_location')->nullable();
            $table->string('apprentice_periode')->nullable();


            $table->foreign('religion_id')->references('id')->on('religion')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('bank')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('education_id')->references('id')->on('education')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('university_id')->references('id')->on('university')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('source_information_id')->references('id')->on('source_information')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('candidate_status_id')->references('id')->on('candidate_status')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('candidate_organization', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('candidate_id');

            $table->string('org_name')->nullable();
            $table->string('year')->nullable();
            $table->string('position')->nullable();

            $table->text('description');

            $table->string('file')->nullable();

            $table->timestamps();
            // $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_organization');
        Schema::dropIfExists('candidates');
        Schema::dropIfExists('bank');
        Schema::dropIfExists('education');
        Schema::dropIfExists('religion');
        Schema::dropIfExists('university');
        Schema::dropIfExists('source_information');
        Schema::dropIfExists('candidate_status');
        
    }
}
