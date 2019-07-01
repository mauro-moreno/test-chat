<?php

use App\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language = new Language();
        $language->id = 'en';
        $language->name = 'English';
        $language->save();

        $language = new Language();
        $language->id = 'es';
        $language->name = 'Spanish';
        $language->save();

        $language = new Language();
        $language->id = 'de';
        $language->name = 'Deutsch';
        $language->save();
    }
}
