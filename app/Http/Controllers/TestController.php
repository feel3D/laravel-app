<?php


namespace App\Http\Controllers;


use App\Models\Flight;
use Illuminate\Http\Request;


class TestController extends Controller
{
    public function foo(Request $request)
    {
        if ($request->route()->named('test')) {
            return view('test');
        }
        return 23;
    }

    public function param($id)
    {
        return $id;
    }

    public function form(Request $request)
    {
        if ($request->has('text')) {
            var_dump($request->input('text'));
        }
        return view('form');
    }

    public function set(Request $request)
    {
        $request->session()->put('f', 23);
    }

    public function get(Request $request)
    {
        return $request->session()->get('f');
    }

    public function model()
    {
        return Flight::all();
    }

    public function test()
    {
        return view('my');
    }
}
