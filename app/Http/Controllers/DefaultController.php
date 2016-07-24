<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DefaultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('default.index', [
            'components' => [
                [
                    'name'  => 'example/example',
                    'data'  => $this->toObject([
                        'title'     => 'Example Component',
                        'image_url' => 'images/example/images/example.png',
                        'content'   => ''
                    ])
                ]
            ]
        ]);
    }
}
