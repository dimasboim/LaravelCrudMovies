<?php

namespace App\Http\Controllers;
use DB;
use App\Quotation;

use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('index');
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
        $image_cover = $request->fotoCover;
        $fileName = pathinfo($image_cover->getClientOriginalName(), PATHINFO_FILENAME);
        $fullFileName = $fileName."-".time().".".$image_cover->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image_cover->move($destinationPath, $fullFileName);

        DB::table('movies')->insert([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'rating' => $request->rating,
             'foto' => $fullFileName,
            'sutradara' => $request->sutradara,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/');
    }
    public function delete(Request $request)
    {
        //
        $id = $request->id;
        DB::table('movies')->where('id', '=', $id)->delete();

        
        // alihkan halaman ke halaman pegawai
        return redirect('/');
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
    public function edit(Request $request)
    {
        //
        $id = $request->id;
        $movies = DB::table('movies')->where('id', '=', $id)->get();
        //$movies = DB::table('movies')->get();
        // echo $movies;
          return view('editmovie', ['movies' => $movies]);

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
        //
        $id = $request->id;
        
        if($request->hasFile('fotoCover')){
            $image_cover = $request->fotoCover;
            $fileName = pathinfo($image_cover->getClientOriginalName(), PATHINFO_FILENAME);
        $fullFileName = $fileName."-".time().".".$image_cover->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image_cover->move($destinationPath, $fullFileName);
        DB::table('movies') ->where('id', $id)
        ->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'rating' => $request->rating,
             'foto' => $fullFileName,
            'sutradara' => $request->sutradara,
        ]);
        }else{
            DB::table('movies') ->where('id', $id)
            ->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'rating' => $request->rating,
                'sutradara' => $request->sutradara,
            ]);
        }
        
        // alihkan halaman ke halaman pegawai
        return redirect('/');
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
