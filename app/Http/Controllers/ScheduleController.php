<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Studio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    //
    $branches = Branch::all();

    if ($request->has('branch') && $request->query('branch') != '' && $request->has('date') && $request->query('date') != '') {
      $groups = Schedule::whereHas('studio', function ($query) use ($request) {
        $query->where('branch_id', $request->branch);
      })->whereDate('start', '=', new Carbon($request->query('date')))->orWhereDate('end', '=', new Carbon($request->query('date')))->get()->sortBy('start')->groupBy(['studio_id', 'movie_id']);
    } else {
      $groups = Schedule::all()->sortBy('start')->groupBy(['studio_id', 'movie_id']);
    }

    return view('schedule.index', compact('groups', 'branches'), ["title" => "Schedules"]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
    $studios = Studio::all();
    $movies = Movie::all();
    return view('schedule.create', compact('studios', 'movies'), ["title" => "Create Schedule"]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
    $request->validate([
      'start' => 'required',
      'end' => 'required',
      'studio_id' => 'required',
      'movie_id' => 'required',
    ]);

    $studio = Studio::find($request->studio_id);

    $day = Carbon::parse($request->start)->dayOfWeek;

    Schedule::create([
      'start' => $request->start,
      'end' => $request->end,
      'studio_id' => $request->studio_id,
      'movie_id' => $request->movie_id,
      'price' => $studio->basic_price + $studio->{'additional_' . strtolower(Carbon::getDays()[$day]) . '_price'},
    ]);

    return to_route('schedule.index')->with('success', 'Schedule created successfully');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
    $studios = Studio::all();
    $movies = Movie::all();
    $schedule = Schedule::find($id);

    return view('schedule.edit', compact('schedule', 'studios', 'movies'), ["title" => "Edit Schedule"]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
    $request->validate([
      'start' => 'required',
      'end' => 'required',
      'studio_id' => 'required',
      'movie_id' => 'required',
    ]);

    $studio = Studio::find($request->studio_id);

    $schedule = Schedule::find($id);

    $schedule->start = $request->start;
    $schedule->end = $request->end;
    $schedule->studio_id = $request->studio_id;
    $schedule->movie_id = $request->movie_id;
    $schedule->price = $studio->basic_price + $studio->{'additional_' . strtolower(Carbon::getDays()[Carbon::parse($request->start)->dayOfWeek]) . '_price'};

    $schedule->update();

    return to_route('schedule.index')->with('success', 'Schedule updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
    $schedule = Schedule::find($id);

    $schedule->delete();

    return to_route('schedule.index')->with('success', 'Schedule deleted successfully');
  }
}
