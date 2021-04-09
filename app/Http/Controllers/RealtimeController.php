<?php


namespace App\Http\Controllers;


use App\Events\NewEvent;
use Illuminate\Http\Request;

class RealtimeController extends Controller
{
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
}
