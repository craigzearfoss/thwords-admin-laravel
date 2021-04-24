<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitializeDictionaryTables extends Migration
{
    var $langs = ['en', 'de', 'es', 'fr', 'it', 'pt'];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create the parts_of_speech table
        Schema::create('parts_of_speech', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbrev');
            $table->integer('seq');
        });

        DB::table('parts_of_speech')->insert(
            [
                ['name' => 'adverb', 'abbrev' => 'adv.', 'seq' => 4],
                ['name' => 'adjective', 'abbrev' => 'adj.', 'seq' => 3],
                ['name' => 'conjunction', 'abbrev' => 'conj.', 'seq' => 7],
                ['name' => 'determiner', 'abbrev' => 'det.', 'seq' => 9],
                ['name' => 'interjection', 'abbrev' => 'inter.', 'seq' => 8],
                ['name' => 'noun', 'abbrev' => 'n.', 'seq' => 1],
                ['name' => 'phrase', 'abbrev' => 'phr.', 'seq' => 10],
                ['name' => 'preposition', 'abbrev' => 'prep.', 'seq' => 6],
                ['name' => 'pronoun', 'abbrev' => 'pron.', 'seq' => 5],
                ['name' => 'verb', 'abbrev' => 'v.', 'seq' => 2],
            ]
        );

        // create the genders table
        Schema::create('genders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbrev');
        });

        DB::table('genders')->insert(
            [
                ['name' => 'none', 'abbrev' => ''],
                ['name' => 'masculine', 'abbrev' => 'm'],
                ['name' => 'feminine', 'abbrev' => 'f'],
                ['name' => 'neutral', 'abbrev' => 'n']
            ]
        );

        // create the groups table
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('groups')->insert(
            [
                ['name' => 'amphibian'],
                ['name' => 'anatomy'],
                ['name' => 'animal'],
                ['name' => 'appliance'],
                ['name' => 'architecture'],
                ['name' => 'astronomy'],
                ['name' => 'baseball'],
                ['name' => 'basketball'],
                ['name' => 'bathroom'],
                ['name' => 'bedroom'],
                ['name' => 'biology'],
                ['name' => 'bird'],
                ['name' => 'botany'],
                ['name' => 'building'],
                ['name' => 'business'],
                ['name' => 'city'],
                ['name' => 'clothing'],
                ['name' => 'color'],
                ['name' => 'computers'],
                ['name' => 'continent'],
                ['name' => 'country'],
                ['name' => 'currency'],
                ['name' => 'dairy'],
                ['name' => 'dance'],
                ['name' => 'dining'],
                ['name' => 'direction'],
                ['name' => 'disease'],
                ['name' => 'electronics'],
                ['name' => 'event'],
                ['name' => 'exercise'],
                ['name' => 'family'],
                ['name' => 'farm'],
                ['name' => 'farm animal'],
                ['name' => 'fish'],
                ['name' => 'food'],
                ['name' => 'football'],
                ['name' => 'fruit'],
                ['name' => 'furniture'],
                ['name' => 'geography'],
                ['name' => 'geometry'],
                ['name' => 'grain'],
                ['name' => 'grammar'],
                ['name' => 'groceries'],
                ['name' => 'health'],
                ['name' => 'holiday'],
                ['name' => 'home'],
                ['name' => 'internet'],
                ['name' => 'kitchen'],
                ['name' => 'language'],
                ['name' => 'legal'],
                ['name' => 'leisure'],
                ['name' => 'lizard'],
                ['name' => 'mammal'],
                ['name' => 'math'],
                ['name' => 'meat'],
                ['name' => 'military'],
                ['name' => 'music'],
                ['name' => 'musical instrument'],
                ['name' => 'nationality'],
                ['name' => 'number'],
                ['name' => 'ocean'],
                ['name' => 'occupation'],
                ['name' => 'office'],
                ['name' => 'ordinal number'],
                ['name' => 'people'],
                ['name' => 'pet'],
                ['name' => 'philosophy'],
                ['name' => 'place'],
                ['name' => 'plant'],
                ['name' => 'politics'],
                ['name' => 'religion'],
                ['name' => 'reptile'],
                ['name' => 'school'],
                ['name' => 'science'],
                ['name' => 'season'],
                ['name' => 'shopping'],
                ['name' => 'soccer'],
                ['name' => 'sports'],
                ['name' => 'tennis'],
                ['name' => 'time'],
                ['name' => 'tool'],
                ['name' => 'transportation'],
                ['name' => 'travel'],
                ['name' => 'tree'],
                ['name' => 'vegetable'],
                ['name' => 'weather']
            ]
        );

        foreach ($this->langs as $lang) {

            // create dictionary_xx tables
            Schema::create('dictionary_' . $lang, function (Blueprint $table) use ($lang) {
                $table->id();
                $table->string('word');
                $table->unsignedBigInteger('part_of_speech_id');
                $table->foreign('part_of_speech_id')->references('id')->on('parts_of_speech');
                $table->unsignedBigInteger('gender_id');
                $table->foreign('gender_id')->references('id')->on('genders');
                $table->string('plural');
                $table->unsignedBigInteger('plural_gender_id');
                $table->foreign('plural_gender_id')->references('id')->on('genders');
                $table->string('pronunciation');
                $table->string('definition');
                $table->index('word');
                $table->index('plural');
                $table->timestamps();
            });

            // create the word_group_xx tables
            Schema::create('word_group_' . $lang, function (Blueprint $table) use ($lang) {
                $table->id();
                $table->unsignedBigInteger('word_id');
                $table->unsignedBigInteger('group_id');
                $table->foreign('word_id')->references('id')->on('dictionary_' . $lang);
                $table->foreign('group_id')->references('id')->on('groups');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->langs as $lang) {
            Schema::dropIfExists('word_group_' . $lang);
            Schema::dropIfExists('dictionary_' . $lang);
        }
        Schema::dropIfExists('groups');
        Schema::dropIfExists('genders');
        Schema::dropIfExists('parts_of_speech');
    }
}
