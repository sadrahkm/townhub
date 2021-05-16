<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Http\Controllers\Controller;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::paginate(10);
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = 'store';
        return view('admin.cities.create', compact(['action']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:15',
            'image' => 'required'
        ]);
        $imageName = $request->file('image')->store('city');
        $city = City::create([
            'name' => $data['name'],
            'image' => $imageName,
        ]);
        if ($city && $city instanceof City) {
            return redirect()->route('admin.city.index');
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $action = 'update';
        return view('admin.cities.create', compact(['city', 'action']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $filename = $city->image;
        Storage::delete($filename);
        $data = $request->validate([
            'name' => 'required|max:15',
            'image' => 'required'
        ]);
        $newFile = $request->file('image')->store('city');
        $cityItem = $city->update([
            'name' => $request->input('name'),
            'image' => $newFile,
        ]);
        if ($cityItem) {
            return redirect()->route('admin.city.index');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param City $city
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(City $city)
    {
        $cityItem = $city->delete();
        return $cityItem;
    }
}
