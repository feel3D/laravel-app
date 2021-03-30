<?php


namespace App\Http\Controllers;


class StartController extends Controller
{
    public function index()
    {
        $url_data =
            [
                [
                    'title' => 'title1',
                    'url' => 'https://title1.com',
                ],
                [
                    'title' => 'title2',
                    'url' => 'https://title2.com',
                ],
            ];

        return view('start', [
            'url' => $url_data
        ]);
    }

}
