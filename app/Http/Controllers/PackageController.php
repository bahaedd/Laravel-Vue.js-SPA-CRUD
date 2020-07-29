<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all()->toArray();
        return array_reverse($packages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'title'       =>   'required',
            'description' =>   'required',
            'link'        =>   'required',
        ]);

        if($data->fails())
        {
            return response()->json([
                'status'   =>   'error',
                'errors'   =>   $data->errors(),
            ], 422);
        }

        $package = new Package([
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'link'        => $request->input('link'),
        ]);
        $package->save();

        return response()->json('Package added successfully !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::find($id);

        return response()->json($package);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $package = Package::find($id);
        $package->update($request->all());

        return response()->json('Package updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::find($id);
        $package->delete();

        return response()->json('Package deleted successfully!');
    }
}
