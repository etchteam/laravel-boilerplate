<?php

namespace App\Http\Controllers;

use Parsedown;
use App\Http\Requests;
use Illuminate\Http\Request;

class StyleguideController extends Controller
{
    /**
     * Display the styleguide
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parsedown = new Parsedown();
        $path = base_path() . '/resources/components/';
        $folders = $this->folderContents($path);
        $components = [];
        $nav = [];

        foreach ($folders as $folder) {
            $docs = $parsedown->text(file_get_contents("$path$folder/$folder.md"));
            $data = file_get_contents("$path$folder/$folder.schema.json");

            $components[] = [
                'name'      => "$folder/$folder",
                'data'      => json_decode($data, false),
                'docs'      => $docs,
                'structure' => $data,
            ];

            $nav[] = ucfirst($folder);
        }

        return view('styleguide.index', [
            'nav'           => $nav,
            'components'    => $components
        ]);
    }

    private function folderContents($path)
    {
        return array_diff(scandir($path), ['.', '..', '.gitkeep']);
    }
}
