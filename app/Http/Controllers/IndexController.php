<?php

namespace App\Http\Controllers;

use App\Traits\HttpClientTrait;
use App\Traits\ParserStringTrait;

class IndexController extends Controller
{
    use HttpClientTrait, ParserStringTrait;

    public $errors = null;
    public $resultString = null;
    public $object = null;

    public function __invoke()
    {
        $token = $this->loginToApi();
        if ($token['status'] == 200) {
            $result = $this->getRandomStringToApi($token['content']);
            if ($result['status'] == 200) {
                $this->resultString = $result['content'];
            } else {
                $this->errors = $token;
            }
        } else {
            $this->errors = $token;
        }

        if ($this->resultString) {
            $this->object = $this->parseReceivedString($this->resultString);
        }

        return view('home', [
            'errors' => $this->errors,
            'object' => $this->object['object']->toArray(),
            'type' => $this->object['type'],
            'string' => $this->resultString
        ]);
    }
}
