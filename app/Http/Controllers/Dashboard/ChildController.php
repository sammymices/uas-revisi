<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Child::all();
        $child = Child::orderBy('id', 'asc')->paginate(6);
        return view('dashboard.pages.child.index', compact('child'));
        with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.child.form-child');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->photo);
        //melakukan validasi data
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'birthdate' => 'required',
            'photo' => 'required',
            'gender' => 'required',
        ]);

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('gallery', 'public');
        }

        //mengisi nilai model Gallery
        $child = new Child;
        $child->name = $request->input('name');
        $child->birthdate = $request->input('birthdate');
        $child->photo = $request->input('photo');
        $child->gender = $request->input('gender');

// cek apakah id sudah ada di dalam database
        do {
            $id = rand(1000, 9999); // generate id acak
        } while (Child::where('id', $id)->exists()); // cek apakah id sudah ada di dalam database

        $child->id = $id;
        $child->photo = $request->file('photo')->store('child', 'public');
        $child->save();

        //Child::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('dashboard.child.index')
            ->with('success', 'Gallery berhasil ditambahkan');
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
    public function edit($id)
    {
        $child = Child::find($id);
        return view('dashboard.pages.child.edit-child', compact('child'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //melakukan validasi data
//        dd($request->photo);
        $data = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'birthdate' => 'required',
            'photo' => 'required',
            'gender' => 'required',
        ]);

        $child = Child::find($id);
        if (!$child) {
            return redirect()->back()->with('error', 'Data child tidak ditemukan.');
        }

        $oldPhoto = $child->photo;

        if ($request->hasFile('photo')) {
            if (Storage::exists('public/' . $child->photo)) {
                Storage::delete('public/' . $child->photo);
            }

            $data['photo'] = $request->photo->store('child', 'public');
        }
        $child->update($data);

        $child->id = $request->input('id');
        $child->name = $request->input('name');
        $child->birthdate = $request->input('birthdate');
        $child->gender = $request->input('gender');
        $child->save();

        return redirect()->route('dashboard.child.index')
            ->with('success', 'Data child berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $child = Child::find($id);
        if (Storage::exists('public/' . $child->photo)) {
            Storage::delete('public/' . $child->photo);
        }

        $child->delete();
        return redirect()->route('dashboard.child.index')
            ->with('success', 'Mahasiswa Berhasil Dihapus');
    }
}
