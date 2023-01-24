<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class ArticleGeneratorController extends Controller
{
 
    public function index(Request $input)
    {
        if ($input->data == null) {
            return;
        }
    
        $title = $input->data;
    
        $client = OpenAI::client('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');
        
        $result = $client->completions()->create([
            "model" => "text-davinci-002",
            "temperature" => 0.7,
            "top_p" => 1,
            "frequency_penalty" => 0,
            "presence_penalty" => 0,
            'max_tokens' => 600,
            'prompt' => sprintf('Write article about: %s', $title),
        ]);
    
        $content = trim($result['choices'][0]['text']);

        //print_r($result);

    
        echo $content;die;
    }
}
