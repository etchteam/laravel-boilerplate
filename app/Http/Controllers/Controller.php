<?php

namespace App\Http\Controllers;

use \stdClass;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function toObject($array)
    {
        $object = new stdClass();

        foreach ($array as $key => $value) {
            $object->$key = $value;
        }

        return $object;
    }
}
