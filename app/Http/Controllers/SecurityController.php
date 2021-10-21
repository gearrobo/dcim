<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.security.index');
    }

    public function book()
    {
        return view('pages.security.book');
    }

    public function list()
    {
        // dd(Storage::disk('public')->get('Gatot Nugroho22:58.png'));
        $data = [
            'storage' => Storage::disk('public'),
            'guests' => Guest::all()
        ];
        return view('pages.security.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wktu = $request->time.'|'.$request->date;
        $image = $request->image;
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = $request->name . '' . $wktu . '.png';
        Storage::disk('public')->put($imageName, base64_decode($image));
        Guest::create([
            'name' => $request->name,
            'address' => $request->address,
            'handphone' => $request->phone,
            'gender' => $request->gender,
            'destination' => $request->destination,
            'reason' => $request->need,
            'time' => $wktu
        ]);
        return redirect()->route('security.list');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
