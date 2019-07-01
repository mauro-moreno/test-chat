<?php

namespace App\Http\Controllers\API;

use App\Answer;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function ask($lang)
    {
        $answers = Answer::where('language_id', '=', $lang)
            ->where('question', 'like', '%' . request()->get('question') . '%')
            ->get();

        switch ($answers->count()) {
            case 0:
                $action = 'none';
                $data = new Answer([
                    'question' => '--',
                    'answer' => __('chat.did_not_understand'),
                ]);
                $parameter = null;
                break;
            case 1:
                $answer = $answers->first();
                $action = $answer->action;
                $data = $answer;
                $parameter = $answer->parameter;
                break;
            default:
                $action = 'more';
                $data = $answers;
                $parameter = __('chat.description_more');
                break;
        }
        $answers->first();

        return response()->json([
            'data' => $data,
            'action' => $action,
            'parameter' => $parameter
        ]);
    }
}
