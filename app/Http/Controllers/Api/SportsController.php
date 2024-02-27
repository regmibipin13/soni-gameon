<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Sports\StoreSportsRequest;
use App\Http\Requests\Api\Sports\UpdateSportsRequest;
use App\Models\Sport;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Sport::with(['vendor', 'sport_category'])->apiFilters($request)->orderBy('id', 'desc')->paginate(20);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSportsRequest $request)
    {
        $sport = Sport::create($request->all());

        if ($sport) {
            if ($request->has('images') && is_array($request->filepond)) {
                foreach ($request->images as $file) {
                    $sport->addMedia($file)->toMediaCollection();
                }
            } else if ($request->has('images')) {
                $sport->addMedia($request->images)->toMediaCollection();
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Sport Created Successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Sport Created Failed'
            ], 402);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport)
    {
        $sport->load(['vendor', 'sport_category']);
        return response()->json(['data' => $sport]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sport $sport)
    {
        $sport->load(['vendor', 'sport_category']);
        return response()->json(['data' => $sport]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSportsRequest $request, Sport $sport)
    {
        $sport->update($request->all());
        if ($sport) {
            if ($request->has('images') && is_array($request->filepond)) {
                $sport->clearMediaCollection();
                foreach ($request->images as $file) {
                    $sport->addMedia($file)->toMediaCollection();
                }
            } else if ($request->has('images')) {
                $sport->clearMediaCollection();
                $sport->addMedia($request->images)->toMediaCollection();
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Sport Updated Successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Sport Updat Failed'
            ], 402);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
