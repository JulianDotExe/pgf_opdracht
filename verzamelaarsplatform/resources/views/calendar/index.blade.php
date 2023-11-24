<!-- resources/views/calendar/index.blade.php -->

<!-- Include Tailwind CSS CDN or reference your compiled CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<!-- Calendar Container -->
<div class="max-w-lg mx-auto p-4">

    <!-- Calendar Header -->
    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('calendar', ['year' => $year, 'month' => $month - 1]) }}" class="py-2 px-4 border rounded-md text-gray-700 hover:bg-gray-200">Previous Month</a>
        <span class="text-xl font-semibold">{{ $month }} - {{ $year }}</span>
        <a href="{{ route('calendar', ['year' => $year, 'month' => $month + 1]) }}" class="py-2 px-4 border rounded-md text-gray-700 hover:bg-gray-200">Next Month</a>
    </div>

    <!-- Calendar Table -->
    <table class="w-full border-collapse">
        <thead>
            <tr>
                <th class="py-2 px-4 w-20 bg-gray-200">Sun</th>
                <th class="py-2 px-4 w-20 bg-gray-200">Mon</th>
                <th class="py-2 px-4 w-20 bg-gray-200">Tue</th>
                <th class="py-2 px-4 w-20 bg-gray-200">Wed</th>
                <th class="py-2 px-4 w-20 bg-gray-200">Thu</th>
                <th class="py-2 px-4 w-20 bg-gray-200">Fri</th>
                <th class="py-2 px-4 w-20 bg-gray-200">Sat</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < ceil(($firstDayOfWeek + $daysInMonth) / 7); $i++)
                <tr>
                    @for ($j = 0; $j < 7; $j++)
                        @php
                            $day = $i * 7 + $j - $firstDayOfWeek + 1;
                        @endphp
                        <td class="py-2 px-4 border text-center">
                            @if ($day > 0 && $day <= $daysInMonth)
                                <span class="@if ($day == now()->day && $year == now()->year && $month == now()->month) bg-blue-500 text-white rounded-full py-1 px-2 @endif">
                                    {{ $day }}
                                </span>
                            @endif
                        </td>
                    @endfor
                </tr>
            @endfor
        </tbody>
    </table>
</div>
