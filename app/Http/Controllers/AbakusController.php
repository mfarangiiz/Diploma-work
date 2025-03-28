<?php

namespace App\Http\Controllers;

use App\Models\Abakus;
use App\Http\Requests\StoreAbakusRequest;
use App\Http\Requests\UpdateAbakusRequest;

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
        $embedUrl = $this->getYouTubeEmbedUrl($request->video);

        if (!$embedUrl) {
            return back()->with('error', 'Invalid YouTube URL!');
        }

        $abakus = Abakus::create($request->all());
        $abakus->status = 1;
        $abakus->video = $embedUrl;
        $abakus->save();
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

        $embedUrl = $this->getYouTubeEmbedUrl($request->video);

        if (!$embedUrl) {
            return back()->with('error', 'Invalid YouTube URL!');
        }

        $abakus = Abakus::find($id)->update($request->all());

        $abakus->video = $embedUrl;
        $abakus->save();

        return redirect()->back()->with('success', 'Abakus yangilandi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Abakus::findorfail($id)->delete();
        return redirect()->back()->with('success', 'Abakus o`chirildi');
    }

    private function getYouTubeEmbedUrl($url)
    {
        preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/|user\/.+?#v\/|.+?&v=))([^"&?\/\s]{11})/', $url, $matches);
        return isset($matches[1]) ? "https://www.youtube.com/embed/{$matches[1]}" : null;
    }

}
