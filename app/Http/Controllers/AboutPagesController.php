<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {

        $abouts = About::all();
        return view('pages.about.list', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.about.create');
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
            'date' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image'
        ]);

        $about = new About();
        $about->date = $request->date;
        $about->title = $request->title;
        $about->description = $request->description;

        $image = $request->file('image');
        Storage::putFile('public/img', $image); 
        $about->image = "storage/img/".$image->hashName();

        $about->save();

        return redirect()->route('admin.about.list')->with('success','New About create Successfully');
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
        $about = About::findOrFail($id);
        return view('pages.about.edit', compact('about'));
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
            'date' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $about = About::findOrFail($id);
        $about->date = $request->date;
        $about->title = $request->title;
        $about->description = $request->description;

        if ($request->file('image')) {
            $image = $request->file('image');
            Storage::putFile('public/img', $image); 
            $about->image = "storage/img/".$image->hashName();
        }

        $about->save();

        return redirect()->route('admin.about.list')->with('success','About Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = About::findOrFail($id);
        @unlink(public_path($item->image));
        $item->delete();
        
        return redirect()->route('admin.about.list')->with('success','About Deleted Successfully');
    }
}
