<?php

namespace App\Http\Controllers;

use App\Models\Abakus;
use App\Http\Requests\StoreAbakusRequest;
use App\Http\Requests\UpdateAbakusRequest;

class MotorikaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.motorika.index', [
            'motorikaes' => Abakus::where('status', 2)->paginate(15)
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


        $embedUrl = $this->getYouTubeEmbedUrl($request->video);

        if (!$embedUrl) {
            return back()->with('error', 'Invalid YouTube URL!');
        }
        $abakus = Abakus::create($request->all());
        $abakus->status = 2;
        $abakus->video = $embedUrl;
        $abakus->save();
        $abakus->save();
        return redirect()->back()->with('success', 'Motorika yaratildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Abakus $Abakus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Abakus $Abakus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbakusRequest $request, $id)
    {
        $embedUrl = $this->getYouTubeEmbedUrl($request->video);

        if (!$embedUrl) {
            return back()->with('error', 'Invalid YouTube URL!');
        }

        $abakus = Abakus::find($id)->update($request->all());

        $abakus->video = $embedUrl;
        $abakus->save();

        return redirect()->back()->with('success', 'motorika yangilandi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        dd('id');
        Abakus::findorfail($id)->delete();
        return redirect()->back()->with('success', 'Motorika o`chirildi');
    }
    private function getYouTubeEmbedUrl($url)
    {
        preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/|user\/.+?#v\/|.+?&v=))([^"&?\/\s]{11})/', $url, $matches);
        return isset($matches[1]) ? "https://www.youtube.com/embed/{$matches[1]}" : null;
    }
}
