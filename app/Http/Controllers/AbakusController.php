<?php

namespace App\Http\Controllers;

use App\Models\Abakus;
use App\Http\Requests\StoreAbakusRequest;
use App\Http\Requests\UpdateAbakusRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AbakusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.abakus.index', [
            'abakuses' => Abakus::where('status', 1)->paginate(10)
        ]);
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

    public function store(StoreAbakusRequest $request)
    {
        $file = $request->file('video');

        // Generate unique filename with extension
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

        // Store the file with the unique name in the "videos" directory on "public" disk
        $path = $file->storeAs('videos', $filename, 'public');

        $abakus = Abakus::create([
            'title' => $request->title,
            'description' => $request->description,
            'age' => $request->age,
            'status' => 1,
            'video' => $path
        ]);

        return redirect()->back()->with('success', 'Abakus yaratildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Abakus $abakus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Abakus $abakus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateAbakusRequest $request, $id)
    {
        $abakus = Abakus::findOrFail($id);

        if ($request->hasFile('video')) {
            // Delete old video
            if ($abakus->video && Storage::disk('public')->exists($abakus->video)) {
                Storage::disk('public')->delete($abakus->video);
            }

            // Store new video
            $file = $request->file('video');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('videos', $filename, 'public');

            $abakus->video = $path;
        }

        $abakus->title = $request->title;
        $abakus->description = $request->description;
        $abakus->age = $request->age;

        $abakus->save();

        return redirect()->back()->with('success', 'Abakus yangilandi');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $abakus = Abakus::findOrFail($id);

        // Check if it's a stored file (not a YouTube link)
        if ($abakus->video && !str_contains($abakus->video, 'youtube.com') && Storage::disk('public')->exists($abakus->video)) {
            Storage::disk('public')->delete($abakus->video);
        }

        $abakus->delete();

        return redirect()->back()->with('success', 'Abakus o‘chirildi');
    }


}
