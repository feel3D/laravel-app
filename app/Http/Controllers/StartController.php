<?php


namespace App\Http\Controllers;


use App\Events\NewEvent;
use Illuminate\Http\Request;
use Redis;

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
                            'data' => [rand(0, 40000), rand(0, 40000), rand(0, 40000), rand(0, 40000)]
                        ],
                        [
                            'label' => 'Покупки',
                            'backgroundColor' => '#16AB39',
                            'data' => [rand(0, 40000), rand(0, 40000), rand(0, 40000), rand(0, 40000)]
                        ]
                    ]
            ];
    }

    public function newEvent(Request $request)
    {
        $result =
            [
                'labels' => ['March', 'April', 'May', 'June'],
                'datasets' =>
                    [
                        [
                            'label' => 'Продажи',
                            'backgroundColor' => '#F26202',
                            'data' => [15000, 5000, 10000, 30000]
                        ],
                    ]
            ];

        if ($request->has('label')) {
            $result['labels'][] = $request->input('label');
            $result['datasets'][0]['data'][] = $request->input('sale');

            if (filter_var($request->input('realtime'), FILTER_VALIDATE_BOOLEAN)) {
                $newEvent = new NewEvent($result);
                event($newEvent);
            }
        }

        return $result;
    }


    public function redis()
    {
        echo 343;
        $redis = new Redis();
        $redis->connect('127.0.0.1');
        $redis->setOption(Redis::OPT_SERIALIZER, Redis::SERIALIZER_JSON);
        $redis->set('key', ['asd' => 'as', 'dd' => 123, 'b' => true]);
        var_dump($redis->get('key')['asd']);
    }
}
