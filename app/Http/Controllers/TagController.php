<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tags;
use Illuminate\Support\Str;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tags::paginate(10); //menampilkan data kategori per 10
        return view('admin.tag.index', compact('tag')); //tampilam data ke view dengan compact dan category adalah $category
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                        //dd($request->all());
                        $this->validate($request, [
                            'name' => 'required|min:3'
                        ]);
                
                        $tag = Tags::create([
                            'name' => $request->name,
                            'slug' => Str::slug($request->name),
                        ]);
                
                        return redirect()->back()->with('success','Data berhasil disimpan');
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
        $tag = Tags::findorfail($id);
        return view('admin.tag.edit', compact('tag'));
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
            'name' => 'required'
        ]);
        
        $tag_data = [
            'name' => $request->name
        ];
        Tags::whereId($id)->update($tag_data);

        return redirect()->route('tag.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tags::findorfail($id);
        $tag->delete();

        return redirect()->back()->with('success','Data berhasil dihapus');
    }
}