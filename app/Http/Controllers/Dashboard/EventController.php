<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'events' => Activity::all()
        ];
        return view('dashboard.pages.event.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input, pastikan cost ada dan valid
        $validated = $request->validate([
            'name' => 'required',
            'datetime' => 'required|date',
            'description' => 'required',
            'cost' => 'required|numeric', // Pastikan cost tidak null dan berupa angka
            'activity_type' => 'required',
            'total_child' => 'required|integer',
            'location' => 'required',
            'organizer' => 'required',
            'content' => 'required',
            'photo' => 'nullable|image', // Foto opsional
        ]);
    
        // Mengambil data yang sudah tervalidasi
        $data = $validated;
    
        // Menyimpan foto jika ada
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->photo->store('event', 'public');
        }
    
        // Membuat data baru di tabel Activity
        Activity::create($data);
    
        // Redirect dengan pesan sukses
        return to_route('dashboard.events.index')->with('success', 'berhasil menambahkan event!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $event)
    {
        return view('dashboard.pages.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $event)
    {
        $data = $request->all();

        if($request->hasFile('photo'))
        {
            if(Storage::exists('public/'. $event->photo))
                Storage::delete('public/' . $event->photo);

            $data['photo'] = $request->photo->store('event', 'public');
        }

        $event->update($data);

        return to_route('dashboard.events.index')->with('success', 'berhasil mengedit event!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $event)
    {
        if(Storage::exists('public/'. $event->photo))
                Storage::delete('public/' . $event->photo);

        $event->delete();

        return to_route('dashboard.events.index')->with('success', 'berhasil menghapus event!');
    }
}
