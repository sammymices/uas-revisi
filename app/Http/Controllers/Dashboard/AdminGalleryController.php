<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeries = Gallery::all(); // Mengambil semua isi tabel
        $posts = Gallery::orderBy('id', 'asc')->paginate(6);
        return view('dashboard.pages.gallery.index',compact('galeries'));
        with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.gallery.form-gallery');
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
            'photo' => 'required',
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('gallery', 'public');
        }

        //mengisi nilai model Gallery
        $gallery = new Gallery;
        $gallery->name = $request->input('name');
        $gallery->description = $request->input('description');
        $gallery->date = $request->input('date');

// cek apakah id sudah ada di dalam database
        do {
            $id = rand(1000, 9999); // generate id acak
        } while (Gallery::where('id', $id)->exists()); // cek apakah id sudah ada di dalam database

        $gallery->id = $id;
        $gallery->photo = $request->file('photo')->store('gallery', 'public');
        $gallery->save();

        //menyimpan model Gallery
        // $gallery->save();

        //Gallery::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('dashboard.galeries.index')
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
        //menampilkan detail data dengan menemukan/berdasarkan Id Gallery
        $galeries = Gallery::find($id);
        return view('dashboard.pages.gallery.index', compact('galeries'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('dashboard.pages.gallery.edit-gallery', compact('gallery'));
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
        $request->validate([
            'id' => 'required',
            'photo' => 'required',
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

        $gallery = Gallery::find($id);
        if (!$gallery) {
            return redirect()->back()->with('error', 'Data gallery tidak ditemukan.');
        }
        $oldPhoto = $gallery->photo;

         if($request->hasFile('photo'))
        {
            if(Storage::exists('public/' . $gallery->photo))
                Storage::delete('public/' . $gallery->photo);

            $gallery['photo'] = $request->photo->store('gallery', 'public');
        }


//        if($request->hasFile('photo')) {
//            Storage::delete('gallery/'.$oldPhoto); // hapus foto lama
//            $gallery->photo = $request->file('photo')->store('gallery', 'public'); // simpan foto baru
//        } else {
//            $gallery->photo = $oldPhoto; // gunakan foto lama
//        }

        $gallery->id = $request->input('id');
        $gallery->name = $request->input('name');
        $gallery->description = $request->input('description');
        $gallery->date = $request->input('date');
        $gallery->save();

        return redirect()->route('dashboard.galeries.index')
            ->with('success', 'Data gallery berhasil diupdate.');

    }


    // public function destroy( $id)
    //     {
    // //fungsi eloquent untuk menghapus data
    //         Gallery::find($id)->delete();
    //         return redirect()->route('dashboard.galeries.index')
    //             -> with('success', 'Mahasiswa Berhasil Dihapus');
    //     }

        public function destroy($id)
    {
        $gallery=Gallery::find($id);
        if(Storage::exists('public/' . $gallery->photo))
            Storage::delete('public/' . $gallery->photo);
        $gallery->delete();
        return redirect()->route('dashboard.galeries.index')
            -> with('success', 'Data Berhasil Dihapus');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
