<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Http\Request;

class ServicePagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $service = service::all();
        return view('pages.services.list', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'icon'        => 'required|string',
            'title'       => 'required|string',
            'description' => 'required|string'
        ]);

        $service              = new service();
        $service->icon        = $request->icon;
        $service->title       = $request->title;
        $service->description = $request->description;

        $service->save();

        return redirect()->route('admin.service.create')->with('success', 'New service created successfully');

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
        $service = service::find($id);
        return view('pages.services.edit', compact('service'));
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
        $this->validate($request, [
            'icon'        => 'required|string',
            'title'       => 'required|string',
            'description' => 'required|string'
        ]);

        $service              = service::find($id);
        $service->icon        = $request->icon;
        $service->title       = $request->title;
        $service->description = $request->description;

        $service->save();

        return redirect()->route('admin.service.list')->with('success', 'Service Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = service::find($id);
        $service->delete();

        return redirect()->route('admin.service.list')->with('success', 'Service Deleted successfully');

    }
}
