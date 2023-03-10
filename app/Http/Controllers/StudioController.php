<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Studio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudioController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
    $studios = Studio::all();
    $day = Carbon::now()->dayOfWeek;

    foreach ($studios as $studio) {
      $studio->price = $studio->basic_price + $studio->{'additional_' . strtolower(Carbon::getDays()[$day]) . '_price'};
    }

    return view('studio.index', compact('studios'), ["title" => "Studios"]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
    $branches = Branch::all();
    return view('studio.create', compact('branches'), ["title" => "Create Studio"]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
    $request->validate([
      'name' => 'required',
      'branch_id' => 'required',
      'basic_price' => 'required',
      'additional_friday_price' => 'required',
      'additional_saturday_price' => 'required',
      'additional_sunday_price' => 'required',
    ]);

    Studio::create([
      'name' => $request->name,
      'branch_id' => $request->branch_id,
      'basic_price' => $request->basic_price,
      'additional_friday_price' => $request->additional_friday_price,
      'additional_saturday_price' => $request->additional_saturday_price,
      'additional_sunday_price' => $request->additional_sunday_price,
    ]);

    return to_route('studio.index')->with('success', 'Studio created successfully');
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
    $studio = Studio::find($id);

    $branches = Branch::all();

    return view('studio.edit', compact('studio', 'branches'), ["title" => "Edit Studio"]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
    $request->validate([
      'name' => 'required',
      'branch_id' => 'required',
      'basic_price' => 'required',
      'additional_friday_price' => 'required',
      'additional_saturday_price' => 'required',
      'additional_sunday_price' => 'required',
    ]);

    Studio::find($id)->update([
      'name' => $request->name,
      'branch_id' => $request->branch_id,
      'basic_price' => $request->basic_price,
      'additional_friday_price' => $request->additional_friday_price,
      'additional_saturday_price' => $request->additional_saturday_price,
      'additional_sunday_price' => $request->additional_sunday_price,
    ]);

    $studio =  Studio::find($id);

    $studio->schedules()->get()->each(function ($schedule) use ($studio) {
      $schedule->update([
        'price' => $studio->basic_price + $studio->{'additional_' . strtolower(Carbon::getDays()[Carbon::parse($schedule->start)->dayOfWeek]) . '_price'}
      ]);
    });

    return to_route('studio.index')->with('success', 'Studio updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
    Studio::find($id)->delete();

    return to_route('studio.index')->with('success', 'Studio deleted successfully');
  }
}
