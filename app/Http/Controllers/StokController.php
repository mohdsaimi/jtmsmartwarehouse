<?php

namespace App\Http\Controllers;

use App\Models\Stoks;
use Illuminate\Http\Request;

class StokController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        /* $stoks = Stoks:: where([

            [function ($query) use ($request){
                if(($inputState=$request->inputState=='1')){
                    if(($term=$request->term)){
                        $query->orWhere('stok_desc','LIKE','%'. $term .'%')->get();
                    }
                }else{
                    if(($term=$request->term)){
                        $query->orWhere('fullcode','LIKE','%'. $term .'%')->get();
                    }
                }
            }]
        ])
            ->orderBy('ID','ASC')
            ->paginate(25);

        return view('backend.stok', compact('stoks'))
            ->with('i', (request()->input('page', 1) - 1) * 25); */

            if(!empty($request->term)){
                $term = $request->term;

                $query = Stoks::where('stok_desc','like','%'.$term.'%')
                            ->orWhere('fullcode','like','%'.$term.'%');


            }
            else{
                $query = Stoks::query();
            }

            $stoks = $query->orderBy('id','ASC')->paginate(25);

            return view('backend.stok', compact('stoks'))
            ->with('i', (request()->input('page', 1) - 1) * 25);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createstok()
    {
        //
        return view('backend.createstok');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storestok(Request $request)
    {
        //
        $request->validate([
            'fullcode' => 'required',
            'stok_desc' => 'required'
        ]);

        $data = Stoks::where('fullcode',$request->fullcode)->first();

        if(!$data){
            Stoks::create($request->all());
            return redirect()->route('admin.stok')->withFlashSuccess(__('Nama Stok baru berjaya disimpan.'));
        }
        if($data){
            // user found
            return redirect()->route('admin.stok')->withFlashDanger(__('Kod Stok telah ada di database.'));
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stoks  $stoks
     * @return \Illuminate\Http\Response
     */
    public function showstok(Stoks $stok)
    {
        //
        return view('backend.showstok')
            ->withStok($stok);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stoks  $stoks
     * @return \Illuminate\Http\Response
     */
    public function editstok(Stoks $stok)
    {
        //
        //$stok = Stoks::all();
        //$stok = Stoks::find($stok);

        /* return view('backend.editstok', compact('stok')); */
        return view('backend.editstok')
            ->withStok($stok);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stoks  $stok
     * @return \Illuminate\Http\Response
     */
    public function updatestok(Request $request, $stok)
    {
        //
        $updateData = $request->validate([
            'stok_desc' => 'required',
            'detail' => 'required'
        ]);


        Stoks::whereId($stok)->update($updateData);

        return redirect()->route('admin.stok')->withFlashSuccess(__('Stok berjaya dikemaskini.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stoks  $stocks
     * @return \Illuminate\Http\Response
     */
    public function destroystok(Stoks $stok)
    {
        //
        $stok->delete();

        return redirect()->route('admin.stok')->withFlashSuccess(__('Stok berjaya dipadam.'));
    }
}
