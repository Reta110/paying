<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Work;
use App\Models\Location;
use Carbon\Carbon;

class GeneratorController extends Controller
{
    public function index()
    {

        $users = User::orderBy('name')->pluck('name', 'id');

        $months = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];

        $month = Carbon::now()->subMonth()->format('m');
        $month = intval($month);

        $year = Carbon::now()->format('Y');
        $lastYear = Carbon::now()->subYears(1)->format('Y');

        $years = [
            $year => $year,
            $lastYear => $lastYear,
        ];

        return view('generator.index', compact('users', 'months', 'month', 'year','years'));

    }

    public function invoice(Request $request)
    {

        $from = Carbon::now()->setMonth($request->month)->setYear($request->year)->startOfMonth()->toDateTimeString();
        $to = Carbon::now()->setMonth($request->month)->setYear($request->year)->endOfMonth()->toDateTimeString();

        $user = User::find($request->user_id);


        $works = Work::where('date', '>=', $from)
            ->where('date', '<=', $to)
            ->where('user_id', $request->user_id)
            ->with('location', 'activity')->orderBy('date')->get();

        $locations = $works->groupBy('location.name');

        $from = Carbon::parse($from)->format('d/m/Y');
        $to = Carbon::parse($to)->format('d/m/Y');

        return view('generator.invoice', compact('user', 'locations', 'from', 'to'));

    }
}
