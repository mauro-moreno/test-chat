<?php

use App\Answer;
use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answer = new Answer();
        $answer->language_id = 'en';
        $answer->question = 'How much does it cost a bike';
        $answer->answer = '$200';
        $answer->save();

        $answer = new Answer();
        $answer->language_id = 'es';
        $answer->question = 'Cuanto cuesta una bicicleta?';
        $answer->answer = '$200';
        $answer->save();

        $answer = new Answer();
        $answer->language_id = 'de';
        $answer->question = 'Hallo';
        $answer->answer = 'Hallo';
        $answer->save();

        $answer = new Answer();
        $answer->language_id = 'en';
        $answer->question = 'Forgot password';
        $answer->answer = 'Redirecting to forgot...';
        $answer->action = 'redirect';
        $answer->parameter = 'https://www.bobshop.com/en/account/password';
        $answer->save();

        $answer = new Answer();
        $answer->language_id = 'en';
        $answer->question = 'Product size';
        $answer->answer = 'Available size: S, M, L, XL';
        $answer->save();

        $answer = new Answer();
        $answer->language_id = 'en';
        $answer->question = 'Shipping costs';
        $answer->answer = 'Shipping costs $100.';
        $answer->save();

        $answer = new Answer();
        $answer->language_id = 'en';
        $answer->question = 'Product availability';
        $answer->answer = 'This product is in stock right now.';
        $answer->save();

        $answer = new Answer();
        $answer->language_id = 'en';
        $answer->question = 'Derive to an operator';
        $answer->answer = 'Deriving to an operator.';
        $answer->action = 'derive';
        $answer->parameter = 'https://www.bobshop.com/en/contact-us';
        $answer->save();
    }
}
