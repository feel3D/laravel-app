<?php


namespace App\Http\Controllers;


class StartController extends Controller
{
    public function index()
    {
        $url_data =
            [
                [
                    'title' => '$url_data1',
                    'url' => 'https://$url_data1.com',
                ],
                [
                    'title' => '$url_data2',
                    'url' => 'https://$url_data2.com',
                ],
            ];

        return view('start', [
            'url' => $url_data
        ]);
    }

    public function getJson(): array
    {
        return
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
    }

    public function chartData(): array
    {
        return
            [
                'labels' => ['March', 'April', 'May', 'June'],
                'datasets' =>
                    [
                        [
                            'label' => 'Продажи',
                            'backgroundColor' => '#F26202',
                            'data' => [15000,50000,10000,30000]
                        ]
                    ]
            ];
    }

}
