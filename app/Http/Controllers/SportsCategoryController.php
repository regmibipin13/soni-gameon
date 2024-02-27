<?php

namespace App\Http\Controllers;

use App\Models\SportCategory;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class SportsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = QueryBuilder::for(SportCategory::class)
            ->allowedFilters(['name'])
            ->paginate(20)
            ->appends($request->query());
        return view('sports-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sports-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sanitized = $request->validate([
            'name' => ['required'],
            'is_enabled' => ['nullable'],
        ]);
        if (isset($sanitized['is_enabled']) && $sanitized['is_enabled'] == "on") {
            $sanitized['is_enabled'] = 1;
        } else {
            $sanitized['is_enabled'] = 0;
        }
        SportCategory::create($sanitized);
        return redirect()->route('sports-categories.index')->with('success', 'Sports Category Created Successfully');
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
    public function edit($sportCategory)
    {
        $sportCategory = SportCategory::find($sportCategory);
        return view('sports-categories.edit', compact('sportCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $sportCategory)
    {
        $sanitized = $request->validate([
            'name' => ['required'],
            'is_enabled' => ['nullable'],
        ]);
        if (isset($sanitized['is_enabled']) && $sanitized['is_enabled'] == "on") {
            $sanitized['is_enabled'] = 1;
        } else {
            $sanitized['is_enabled'] = 0;
        }
        $sportCategory = SportCategory::find($sportCategory);
        $sportCategory->update($sanitized);
        return redirect()->route('sports-categories.index')->with('success', 'Sports Categories Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($sportCategory)
    {
        $sportCategory = SportCategory::find($sportCategory);
        $sportCategory->delete();
        return redirect()->back()->with('success', 'Sports Deleted Successfully');
    }
}