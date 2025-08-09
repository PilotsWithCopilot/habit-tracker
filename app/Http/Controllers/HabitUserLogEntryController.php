<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreHabitUserLogEntryRequest;
use App\Http\Requests\UpdateHabitUserLogEntryRequest;
use App\Models\Habit\HabitUserLogEntry;

final class HabitUserLogEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreHabitUserLogEntryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HabitUserLogEntry $habitUserLogEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HabitUserLogEntry $habitUserLogEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHabitUserLogEntryRequest $request, HabitUserLogEntry $habitUserLogEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HabitUserLogEntry $habitUserLogEntry)
    {
        //
    }
}
