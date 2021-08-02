<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;


class MainPage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main = Main::first();
        return view('pages.main', compact('main'));
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
        //
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
    public function update(Request $request)
    {
        // dd($request);
        $this->validate( $request, [
            'title'     => 'required|string',
            'sub_title' => 'required|string'
        ]);

        $main =  Main::first();
        $main->title = $request->title;
        $main->sub_title = $request->sub_title;

        if ($request->hasFile('bg_image')) {
            dd($request);
            $img_file = $request->file('bg_image');
            $img_file->storeAs('public/img/', 'bg_image.'.$img_file->getClientOriginalExtension());
            $main->bg_image = 'storage/img/bg_image.'. $img_file->getClientOriginalExtension();
        }

        if ($request->hasFile('resume')) {
            $pdf_file = $request->file('resume');
            $pdf_file->storeAs('public/pdf/', 'resume.'. $pdf_file->getClientOriginalExtension());
            $main->resume = 'storage/pdf/resume.'. $pdf_file->getClientOriginalExtension();
        }

        // dd($request);


        $main->save();

        return redirect()->route('admin.main')->with('success', 'Main Page updated successfully');

        
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
