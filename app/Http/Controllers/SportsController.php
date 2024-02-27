<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sports\StoreSportsRequest;
use App\Http\Requests\Sports\UpdateSportsRequest;
use App\Models\Sport;
use App\Models\SportCategory;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class SportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $vendors = Vendor::pluck('name', 'id');
        $categories = SportCategory::enabled()->pluck('name', 'id');
        $sports = QueryBuilder::for(Sport::class)
            ->defaultSort('-id')
            ->allowedFilters(['title', 'vendor_id', 'sport_category_id', 'city'])
            ->paginate(20)
            ->appends($request->query());

        return view('sports.index', compact('sports', 'vendors', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendor::pluck('name', 'id');

        if (auth()->user()->user_type !== 'admin') {
            $vendors = Vendor::where('user_id', auth()->id())->pluck('name', 'id');
        }
        $categories = SportCategory::enabled()->pluck('name', 'id');
        return view('sports.create', compact('vendors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSportsRequest $request)
    {
        $sport = Sport::create($request->all());
        if ($request->has('filepond') && is_array($request->filepond)) {
            foreach ($request->filepoond as $file) {
                $sport->addMedia($file)->toMediaCollection();
            }
        } else if ($request->has('filepond')) {
            $sport->addMedia($request->filepond)->toMediaCollection();
        }
        return redirect()->route('sports.index')->with('success', 'Sports Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport)
    {
        $sport->load(['vendor', 'sport_category']);
        return view('sports.show', compact('sport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sport $sport)
    {
        $vendors = Vendor::pluck('name', 'id');
        if (auth()->user()->user_type !== 'admin') {
            $vendors = Vendor::where('user_id', auth()->id())->pluck('name', 'id');
        }
        $categories = SportCategory::enabled()->pluck('name', 'id');
        return view('sports.edit', compact('sport', 'vendors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSportsRequest $request, Sport $sport)
    {
        $sport->update($request->all());
        if ($request->has('filepond') && is_array($request->filepond)) {
            $sport->clearMediaCollection();
            foreach ($request->filepoond as $file) {
                $sport->addMedia($file)->toMediaCollection();
            }
        } else if ($request->has('filepond')) {
            $sport->clearMediaCollection();
            $sport->addMedia($request->filepond)->toMediaCollection();
        }

        return redirect()->route('sports.index')->with('success', 'Sports Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport)
    {
        $sport->delete();
        return redirect()->back()->with('success', 'Sports Deleted Successfully');
    }
}
