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
                ['id' => 1, 'name' => 'adverb', 'abbrev' => 'adv.', 'seq' => 4],
                ['id' => 2, 'name' => 'adjective', 'abbrev' => 'adj.', 'seq' => 3],
                ['id' => 3, 'name' => 'conjunction', 'abbrev' => 'conj.', 'seq' => 7],
                ['id' => 4, 'name' => 'determiner', 'abbrev' => 'det.', 'seq' => 9],
                ['id' => 5, 'name' => 'interjection', 'abbrev' => 'inter.', 'seq' => 8],
                ['id' => 6, 'name' => 'noun', 'abbrev' => 'n.', 'seq' => 1],
                ['id' => 7, 'name' => 'phrase', 'abbrev' => 'phr.', 'seq' => 10],
                ['id' => 8, 'name' => 'preposition', 'abbrev' => 'prep.', 'seq' => 6],
                ['id' => 9, 'name' => 'pronoun', 'abbrev' => 'pron.', 'seq' => 5],
                ['id' => 10, 'name' => 'verb', 'abbrev' => 'v.', 'seq' => 2],
            ]
        );

        // create the word_genders table
        Schema::create('word_genders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbrev');
        });
        DB::table('word_genders')->insert(
            [
                ['id' => 1, 'name' => 'n/a', 'abbrev' => ''],
                ['id' => 2, 'name' => 'masculine', 'abbrev' => 'm'],
                ['id' => 3, 'name' => 'feminine', 'abbrev' => 'f'],
                ['id' => 4, 'name' => 'neutral', 'abbrev' => 'n']
            ]
        );

        // create the word_groups table
        Schema::create('word_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        DB::table('word_groups')->insert(
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

        // create the verb_types table
        Schema::create('verb_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbrev');
            $table->string('definition');
        });
        DB::table('verb_types')->insert(
            [
                ['id' => 1, 'name' => 'n/a', 'abbrev' => '', 'definition' => 'Not applicable.'],
                ['id' => 2, 'name' => 'auxiliary', 'abbrev' => 'aux', 'definition' => 'A verb that adds functional or grammatical meaning to the clause in which it occurs, so as to express tense, aspect, modality, voice, emphasis, etc.'],
                ['id' => 3, 'name' => 'impersonal', 'abbrev' => 'imp', 'definition' => 'A verb that has no determinate subject.'],
                ['id' => 4, 'name' => 'intransitive', 'abbrev' => 'int', 'definition' => 'A verb that does not allow a direct object.'],
                ['id' => 5, 'name' => 'pronominal', 'abbrev' => 'pron', 'definition' => 'A verb that is accompanied by a reflexive pronoun.'],
                ['id' => 6, 'name' => 'reflexive', 'abbrev' => 'ref', 'definition' => 'Loosely, a verb whose direct object is the same as its subject.'],
                ['id' => 7, 'name' => 'transitive', 'abbrev' => 'tran', 'definition' => 'A verb that accepts one or more objects.']
            ]
        );

        // create the verb_categories table
        Schema::create('verb_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        DB::table('verb_categories')->insert(
            [
                ['id' => 1, 'name' => 'indicative'],
                ['id' => 2, 'name' => 'perfect'],
                ['id' => 3, 'name' => 'subjunctive'],
                ['id' => 4, 'name' => 'subjunctive perfect'],
                ['id' => 5, 'name' => 'imperative'],
                ['id' => 6, 'name' => 'progressive']
            ]
        );

        // create the verb_moods table
        Schema::create('verb_moods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbrev');
            $table->string('definition');
        });
        DB::table('verb_moods')->insert(
            [
                ['id' => 1, 'name' => '', 'abbrev' => 'n/a', 'definition' => 'Not applicable.'],
                ['id' => 2, 'name' => 'imperative', 'abbrev' => 'imp', 'definition' => 'A verb used in requests and commands.'],
                ['id' => 3, 'name' => 'indicative', 'abbrev' => 'ind', 'definition' => 'A verb that expresses a factual statement, at least from the perspective of the speaker.'],
                ['id' => 4, 'name' => 'subjunctive', 'abbrev' => 'subj', 'definition' => 'A verb that expresses a condition that is doubtful, hypothetical, wishful, or not factual.']
            ]
        );

        // create the verb_aspects table
        Schema::create('verb_aspects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbrev');
            $table->string('definition');
        });
        DB::table('verb_aspects')->insert(
            [
                ['id' => 1, 'name' => '', 'abbrev' => 'n/a', 'definition' => 'Not applicable.'],
                ['id' => 2, 'name' => 'simple', 'abbrev' => 'sim', 'definition' => 'Also known as simple.'],
                ['id' => 3, 'name' => 'perfect', 'abbrev' => 'perf', 'definition' => 'Also known as complete.'],
                ['id' => 4, 'name' => 'imperfect', 'abbrev' => 'imperf', 'definition' => 'Also known as progressive or continuing.']
            ]
        );

        // create the verb_times table
        Schema::create('verb_times', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbrev');
            $table->string('definition');
        });
        DB::table('verb_times')->insert(
            [
                ['id' => 1, 'name' => '', 'abbrev' => 'n/a', 'definition' => 'Not applicable.'],
                ['id' => 2, 'name' => 'past', 'abbrev' => 'past', 'definition' => 'A verb that refers to something that took place in the past.'],
                ['id' => 3, 'name' => 'present', 'abbrev' => 'pres', 'definition' => 'A verb that refers to something that took place in the present.'],
                ['id' => 4, 'name' => 'future', 'abbrev' => 'fut', 'definition' => 'A verb that refers to something that will take place in the future.']
            ]
        );

        // create the verb_forms table
        Schema::create('verb_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alt_name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('mood_id');
            $table->unsignedBigInteger('aspect_id');
            $table->unsignedBigInteger('time_id');
            $table->string('abbrev');
            $table->string('definition');
            $table->string('example');
            $table->foreign('category_id')->references('id')->on('verb_categories');
            $table->foreign('mood_id')->references('id')->on('verb_moods');
            $table->foreign('aspect_id')->references('id')->on('verb_aspects');
            $table->foreign('time_id')->references('id')->on('verb_times');
        });
        DB::table('verb_forms')->insert(
            [
                ['id' => 1, 'name' => '', 'alt_name' => '', 'category_id' => 1, 'mood_id' => 1, 'aspect_id' => 1, 'time_id' => 1, 'abbrev' => 'n/a', 'definition' => 'Not applicable.', 'example' => ''],
                ['id' => 2, 'category_id' => 1, 'name' => 'present', 'alt_name' => 'simple present', 'mood_id' => 3, 'aspect_id' => 2, 'time_id' => 3, 'abbrev' => '', 'definition' => '', 'example' => 'I speak'],
                ['id' => 3, 'category_id' => 1, 'name' => 'preterite', 'alt_name' => 'simple past', 'mood_id' => 3, 'aspect_id' => 2, 'time_id' => 1, 'abbrev' => '', 'definition' => '', 'example' => 'I spoke'],
                ['id' => 4, 'category_id' => 1, 'name' => 'imperfect', 'alt_name' => 'past progressive', 'mood_id' => 3, 'aspect_id' => 4, 'time_id' => 1, 'abbrev' => '', 'definition' => '', 'example' => 'I was speaking'],
                ['id' => 5, 'category_id' => 1, 'name' => 'conditional', 'alt_name' => '', 'mood_id' => 3, 'aspect_id' => 2, 'time_id' => 1, 'abbrev' => '', 'definition' => '', 'example' => 'I would speak'],
                ['id' => 6, 'category_id' => 1, 'name' => 'future', 'alt_name' => '', 'mood_id' => 3, 'aspect_id' => 4, 'time_id' => 4, 'abbrev' => '', 'definition' => '', 'example' => 'I will speak'],
                ['id' => 7, 'category_id' => 2, 'name' => 'present perfect', 'alt_name' => '', 'mood_id' => 1, 'aspect_id' => 3, 'time_id' => 3, 'abbrev' => '', 'definition' => '', 'example' => 'I have spoken'],
                ['id' => 8, 'category_id' => 2, 'name' => 'past anterior', 'alt_name' => 'preterite', 'mood_id' => 1, 'aspect_id' => 3, 'time_id' => 2, 'abbrev' => '', 'definition' => '', 'example' => 'I had spoken'],
                ['id' => 9, 'category_id' => 2, 'name' => 'pluperfect', 'alt_name' => 'past perfect', 'mood_id' => 1, 'aspect_id' => 3, 'time_id' => 2, 'abbrev' => '', 'definition' => '', 'example' => 'I had spoken'],
                ['id' => 10, 'category_id' => 2, 'name' => 'conditional perfect', 'alt_name' => '', 'mood_id' => 1, 'aspect_id' => 3, 'time_id' => 1, 'abbrev' => '', 'definition' => '', 'example' => 'I would have spoken'],
                ['id' => 11, 'category_id' => 2, 'name' => 'future perfect', 'alt_name' => '', 'mood_id' => 1, 'aspect_id' => 3, 'time_id' => 4, 'abbrev' => '', 'definition' => '', 'example' => 'I will have spoken'],
                ['id' => 12, 'category_id' => 3, 'name' => 'present', 'alt_name' => '', 'mood_id' => 4, 'aspect_id' => 2, 'time_id' => 3, 'abbrev' => '', 'definition' => '', 'example' => 'I speak'],
                ['id' => 13, 'category_id' => 3, 'name' => 'imperfect', 'alt_name' => '', 'mood_id' => 4, 'aspect_id' => 4, 'time_id' => 2, 'abbrev' => '', 'definition' => '', 'example' => 'I spoke'],
                ['id' => 14, 'category_id' => 3, 'name' => 'imperfect 2', 'alt_name' => '', 'mood_id' => 4, 'aspect_id' => 4, 'time_id' => 2, 'abbrev' => '', 'definition' => '', 'example' => 'I spoke'],
                ['id' => 15, 'category_id' => 3, 'name' => 'future', 'alt_name' => '', 'mood_id' => 4, 'aspect_id' => 2, 'time_id' => 4, 'abbrev' => '', 'definition' => '', 'example' => 'I will speak'],
                ['id' => 16, 'category_id' => 4, 'name' => 'present perfect', 'alt_name' => '', 'mood_id' => 4, 'aspect_id' => 3, 'time_id' => 3, 'abbrev' => '', 'definition' => '', 'example' => 'I have spoken'],
                ['id' => 17, 'category_id' => 4, 'name' => 'pluperfect', 'alt_name' => 'past perfect', 'mood_id' => 4, 'aspect_id' => 3, 'time_id' => 2, 'abbrev' => '', 'definition' => '', 'example' => 'I had spoken'],
                ['id' => 18, 'category_id' => 4, 'name' => 'pluperfect 2', 'alt_name' => '', 'mood_id' => 4, 'aspect_id' => 3, 'time_id' => 2, 'abbrev' => '', 'definition' => '', 'example' => 'I had spoken'],
                ['id' => 19, 'category_id' => 4, 'name' => 'future', 'alt_name' => '', 'mood_id' => 4, 'aspect_id' => 3, 'time_id' => 4, 'abbrev' => '', 'definition' => '', 'example' => 'I will have spoken'],
                ['id' => 20, 'category_id' => 5, 'name' => 'affirmative', 'alt_name' => '', 'mood_id' => 2, 'aspect_id' => 1, 'time_id' => 3, 'abbrev' => '', 'definition' => '', 'example' => 'speak'],
                ['id' => 21, 'category_id' => 5, 'name' => 'negative', 'alt_name' => '', 'mood_id' => 2, 'aspect_id' => 1, 'time_id' => 3, 'abbrev' => '', 'definition' => '', 'example' => 'don\'t speak'],
                ['id' => 22, 'category_id' => 6, 'name' => 'present', 'alt_name' => '', 'mood_id' => 4, 'aspect_id' => 1, 'time_id' => 3, 'abbrev' => '', 'definition' => '', 'example' => 'I am speaking'],
                ['id' => 23, 'category_id' => 6, 'name' => 'preterite', 'alt_name' => '', 'mood_id' => 4, 'aspect_id' => 1, 'time_id' => 2, 'abbrev' => '', 'definition' => '', 'example' => 'I was speaking'],
                ['id' => 24, 'category_id' => 6, 'name' => 'imperfect', 'alt_name' => '', 'mood_id' => 4, 'aspect_id' => 4, 'time_id' => 2, 'abbrev' => '', 'definition' => '', 'example' => 'I was speaking'],
                ['id' => 25, 'category_id' => 6, 'name' => 'conditional', 'alt_name' => '', 'mood_id' => 4, 'aspect_id' => 1, 'time_id' => 1, 'abbrev' => '', 'definition' => '', 'example' => 'I would be speaking'],
                ['id' => 26, 'category_id' => 6, 'name' => 'future', 'alt_name' => '', 'mood_id' => 4, 'aspect_id' => 1, 'time_id' => 4, 'abbrev' => '', 'definition' => '', 'example' => 'I will be speaking'],
            ]
        );

        // create dictionary tables
        foreach ($this->langs as $lang) {

            // create xx_words tables
            Schema::create($lang . '_words', function (Blueprint $table) use ($lang) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });

            // create xx_verbs tables
            Schema::create($lang . '_verbs', function (Blueprint $table) use ($lang) {
                $table->id();
                $table->string('name');
                $table->string('infinitive');
                $table->string('past_participle');
                $table->string('gerund');
                $table->timestamps();
            });

            // create xx_dictionary_xx tables
            Schema::create($lang . '_dictionary', function (Blueprint $table) use ($lang) {
                $table->id();
                $table->unsignedBigInteger('word_id');
                $table->integer('seq')->default(0);
                $table->integer('seq2')->default(0);
                $table->unsignedBigInteger('part_of_speech_id');
                $table->string('word');
                $table->unsignedBigInteger('gender_id');
                $table->string('plural');
                $table->unsignedBigInteger('plural_gender_id');
                $table->boolean('colloquial')->default(0);
                $table->boolean('slang')->default(0);
                $table->boolean('figurative')->default(0);
                $table->boolean('proper_name')->default(0);
                $table->boolean('vulgar')->default(0);
                $table->boolean('offensive')->default(0);
                $table->string('pronunciation');
                $table->string('definition');
                $table->string('definition2');
                $table->string('regions');
                $table->index('word');
                $table->index('plural');
                $table->unsignedBigInteger('verb_id');
                $table->unsignedBigInteger('verb_form_id');
                $table->timestamps();
                $table->foreign('word_id')->references('id')->on($lang . '_words');
                $table->foreign('part_of_speech_id')->references('id')->on('parts_of_speech');
                $table->foreign('gender_id')->references('id')->on('word_genders');
                $table->foreign('plural_gender_id')->references('id')->on('word_genders');
                $table->foreign('verb_id')->references('id')->on($lang . '_verbs');
                $table->foreign('verb_form_id')->references('id')->on('verb_forms');
            });

            // create the xx_word_group tables
            Schema::create($lang . '_word_group', function (Blueprint $table) use ($lang) {
                $table->id();
                $table->unsignedBigInteger('word_id');
                $table->unsignedBigInteger('group_id');
                $table->foreign('word_id')->references('id')->on($lang . '_dictionary');
                $table->foreign('group_id')->references('id')->on('word_groups');
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
            Schema::dropIfExists('dictionary_' . $lang);
            Schema::dropIfExists('word_group_' . $lang);
            Schema::dropIfExists('words_' . $lang);
            Schema::dropIfExists('verbs_' . $lang);
        }
        Schema::dropIfExists('verb_forms');
        Schema::dropIfExists('verbs');
        Schema::dropIfExists('verb_types');
        Schema::dropIfExists('verb_categories');
        Schema::dropIfExists('verb_moods');
        Schema::dropIfExists('verb_aspects');
        Schema::dropIfExists('verb_times');
        Schema::dropIfExists('word_groups');
        Schema::dropIfExists('word_genders');
        Schema::dropIfExists('parts_of_speech');
    }
}
