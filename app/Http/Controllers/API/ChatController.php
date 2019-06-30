<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function ask($lang)
    {
        return response()->json([
            'data' => [
                [
                    'id' => 1,
                    'question' => 'Test 1',
                    'answer' => 'Answer',
                ],
                [
                    'id' => 2,
                    'question' => 'Test 2',
                    'answer' => 'Answer',
                ]
            ],
            'action' => 'more',
            'description' => __('chat.description_more')
        ]);
    }
}
