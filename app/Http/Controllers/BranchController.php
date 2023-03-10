<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
    $branches = Branch::all();

    return view('branch.index', compact('branches'), ["title" => "Branches"]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
    return view('branch.create', ["title" => "Create Branch"]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
    $request->validate([
      'name' => 'required',
    ]);

    Branch::create([
      'name' => $request->name,
    ]);

    return to_route('branch.index')->with('success', 'Branch created successfully');
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
    $branch = Branch::find($id);

    return view('branch.edit', compact('branch'), ["title" => "Edit Branch"]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
    $request->validate([
      'name' => 'required',
    ]);

    $branch = Branch::find($id);
    $branch->name = $request->name;
    $branch->save();

    return to_route('branch.index')->with('success', 'Branch updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
    $branch = Branch::find($id);

    $branch->delete();

    return to_route('branch.index')->with('success', 'Branch deleted successfully');
  }
}
