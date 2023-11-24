<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        // Get current month and year
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        // Get the requested month and year from the URL parameters
        $year = $request->input('year', $currentYear);
        $month = $request->input('month', $currentMonth);

        // Adjust the year and month to loop back if needed
        if ($month > 12) {
            $year += floor(($month - 1) / 12);
            $month = ($month - 1) % 12 + 1;
        } elseif ($month < 1) {
            $year += ceil($month / 12) - 1;
            $month = ($month + 11) % 12 + 1;
        }

        // Create Carbon instance for the selected month
        $date = Carbon::createFromDate($year, $month, 1);

        // Calculate days in the month and the first day's weekday
        $daysInMonth = $date->daysInMonth;
        $firstDayOfWeek = $date->startOfMonth()->dayOfWeek;

        return view('calendar.index', [
            'year' => $year,
            'month' => $month,
            'daysInMonth' => $daysInMonth,
            'firstDayOfWeek' => $firstDayOfWeek,
        ]);
    }
}
