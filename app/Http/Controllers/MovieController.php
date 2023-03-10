<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
    $movies = Movie::all();

    foreach ($movies as $movie) {
      $movie->duration = CarbonInterval::minutes($movie->minute_length)->cascade();
    }

    return view('movie.index', compact('movies'), ["title" => "Movies"]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
    return view('movie.create', ["title" => "Create Movie"]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
    $request->validate([
      'name' => 'required',
      'minute_length' => 'required',
      'picture' => 'required|image',
    ]);

    $path = $request->file('picture')->move('movies_banner', $request->file('picture')->getClientOriginalName())->getPathname();

    // dd($path->getPathname());

    // $path = $request->file('picture')->store('public/movies_banner');
    // $path = str_replace('public', 'storage', $path);

    Movie::create([
      'name' => $request->name,
      'minute_length' => $request->minute_length,
      'picture_url' => $path,
    ]);

    return to_route('movie.index')->with('success', 'Movie created successfully');
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
    $movie = Movie::find($id);

    return view('movie.edit', compact('movie'), ["title" => "Edit Movie"]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Movie $movie)
  {
    //
    $path = null;

    if ($request->hasFile('picture')) {
      $request->validate([
        'name' => 'required',
        'minute_length' => 'required',
        'picture' => 'required|image',
      ]);
      Storage::delete(str_replace('storage', 'public', $movie->picture_url));
      $path = $request->file('picture')->store('public/movies_banner');
      $path = str_replace('public', 'storage', $path);
    } else {
      $request->validate([
        'name' => 'required',
        'minute_length' => 'required',
      ]);
      $path = $movie->picture_url;
    }

    $movie->update([
      'name' => $request->name,
      'minute_length' => $request->minute_length,
      'picture_url' => $path,
    ]);

    return to_route('movie.index')->with('success', 'Movie updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
    $movie = Movie::find($id);
    // Storage::delete(str_replace('storage', 'public', $movie->picture_url));
    File::delete($movie->picture_url);
    $movie->delete();

    return to_route('movie.index')->with('success', 'Movie deleted successfully');
  }
}
