<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CenterPoint;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('lokasi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centerPoint = CenterPoint::get()->first();
        return view('lokasi.create', ['centerPoint' => $centerPoint]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'icon' => 'required',
            'address' => 'required',
        ]);

        $spot = new Lokasi;
        $spot->name = $request->input('name');
        $spot->icon = $request->input('icon');
        $spot->address = $request->input('address');
        $spot->latitude = $request->input('latitude');
        $spot->longitude = $request->input('longitude');
        $spot->save();

        if ($spot) {
            return to_route('lokasi.index')->with('success', 'Data berhasil disimpan');
        } else {
            return to_route('lokasi.index')->with('error', 'Data gagal disimpan');
        }
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
    public function edit(Lokasi $spot)
    {
        $centerPoint = CenterPoint::get()->first();
        return view('lokasi.edit', [
            'centerPoint' => $centerPoint,
            'spot' => $spot
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lokasi $spot)
    {
        $this->validate($request, [
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'icon' => 'required',
            'address' => 'required',
        ]);

        $spot->name = $request->input('name');
        $spot->slug = Str::slug($request->name, '-');
        $spot->description = $request->input('description');
        $spot->latitude = $request->input('latitude');
        $spot->longitude = $request->input('longitude');
        $spot->update();

        if ($spot) {
            return to_route('lokasi.index')->with('success', 'Data berhasil diupdate');
        } else {
            return to_route('lokasi.index')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        //Storage::disk('local')->delete('public/ImageLokasis/' . ($lokasi->image));
        $lokasi->delete();
        return redirect()->back();
    }
}
