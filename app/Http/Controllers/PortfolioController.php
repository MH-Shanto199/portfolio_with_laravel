<?php

namespace App\Http\Controllers;

use App\Models\Portfolios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\New_;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.portfolio.create');
    }

    public function list()
    {
        $portfolio = Portfolios::all();
        return view('pages.portfolio.list', compact('portfolio'));
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
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'big_image' => 'required|image',
            'small_image' => 'required|image',
            'description' => 'required|string',
            'clint' => 'required|string',
            'category' => 'required|string',
        ]);

        $portfolio = New Portfolios();
        $portfolio->title = $request->title;
        $portfolio->sub_title = $request->sub_title;
        $portfolio->description = $request->description;
        $portfolio->clint = $request->clint;
        $portfolio->category = $request->category;

        $big_file = $request->file('big_image'); 
        Storage::putFile('public/img', $big_file); 
        $portfolio->big_image = "storage/img/".$big_file->hashName();

        $small_file = $request->file('small_image'); 
        Storage::putFile('public/img', $small_file); 
        $portfolio->small_image = "storage/img/".$small_file->hashName();

        $portfolio->save();

        return redirect()->route('admin.portfolio.create')->with('success','New Portfoio create Successfully');

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
        $portfolio = Portfolios::findOrFail($id);
        return view('pages.portfolio.edit', compact('portfolio'));
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
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'big_image' => 'nullable|image',
            'small_image' => 'nullable|image',
            'description' => 'required|string',
            'clint' => 'required|string',
            'category' => 'required|string',
        ]);

        $portfolio = Portfolios::findOrFail($id);
        $portfolio->title = $request->title;
        $portfolio->sub_title = $request->sub_title;
        $portfolio->description = $request->description;
        $portfolio->clint = $request->clint;
        $portfolio->category = $request->category;

        if ( $request->file('big_image')) {
            $big_file = $request->file('big_image'); 
            Storage::putFile('public/img', $big_file); 
            $portfolio->big_image = "storage/img/".$big_file->hashName();
        }

        if ($request->file('small_image')) {
            $small_file = $request->file('small_image'); 
            Storage::putFile('public/img', $small_file); 
            $portfolio->small_image = "storage/img/".$small_file->hashName();
        }

        $portfolio->save();

        return redirect()->route('admin.portfolio.list')->with('success','Portfoio Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Portfolios::findOrFail($id);
        @unlink(public_path($item->big_image));
        @unlink(public_path($item->small_image));
        $item->delete();

        return redirect()->route('admin.portfolio.list')->with('success','Portfoio Deleted Successfully');
    }
}
