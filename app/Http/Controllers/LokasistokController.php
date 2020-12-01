<?php

namespace App\Http\Controllers;

use App\Models\Lokasistoks;
use App\Models\Auth\User;
use App\Models\Stoks;
use App\Models\Devices;
use Illuminate\Http\Request;

class LokasistokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        /* $lokasistok = Lokasistoks::where('institut_id',auth()->user()->institut_id) */

        if(!empty($request->term)){
            $term = $request->term;
            // $query = Lokasistoks::with(['stok' => function($q) use ($term){
            //     return $q->where('stok_desc','like','%R3%')->get();
            // },'device']);

            $query = Lokasistoks::with('stok')->whereHas('stok', function($q) use ($term){
                $q->where('stok_desc','like','%'.$term.'%')->orWhere('fullcode','like','%'.$term.'%');
            })
            ->orWhereHas('device',function($q) use ($term){
                $q->where('kod_IOT','like','%'.$term.'%');
            });

        }
        else{
            $query = Lokasistoks::query();
        }

        if(!auth()->user()->isAdmin()){
            $query->where('institut_id',auth()->user()->institut_id);
        }




        // $lokasistok = Lokasistoks:: where([

        //     [function ($query) use ($request){
        //         if(($inputState=$request->inputState=='1')){
        //             if(($term=$request->term)){
        //                 $query->orWhere('stok_desc','LIKE','%'. $term .'%')->get();
        //             }
        //         }else{
        //             if(($term=$request->term)){
        //                 $query->orWhere('fullcode','LIKE','%'. $term .'%')->get();
        //             }
        //         }
        //     }]
        // ])

        /* ->withLokasistoks(Lokasistoks::where('institut_id',auth()->user()->institut_id)->get()) */

        $lokasistok = $query->orderBy('device_id','ASC')->paginate(25);



        return view('backend.lokasistok', compact('lokasistok'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Stoks $stok)
    {
        //
        /* $data = Lokasistoks::where('stok_id',$stok->id)->first(); */

        // if(!$data){
        //    /*  Lokasistoks::create($stok->all()); */
        //     /* Lokasistoks::create($request->input('fullcode')); */
        //     return redirect()->route('admin.createlokasistok')
        //     ->withStoks(Stoks::all())
        //     ->withFlashSuccess(__('Nama Stok telah berjaya disimpan.'));
        // }
        // if($data){
        //     // found
        //     return redirect()->route('admin.lokasistok')->withFlashDanger(__('Nama Stok telah ada di database. sila gunakan butang edit!.'));
        // }

        return view('backend.createlokasistok')
        /* ->withDevices(Devices::all()) */
        ->withDevices(Devices::where('institut_id',auth()->user()->institut_id)->get())
        ->withStok($stok);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->check_stok($request->stok_id) > 0){
            return redirect()->back()->withFlashDanger(__('Nama stok telah wujud'));
        }

        if($this->check_device($request->device_id,$request->petak) > 0){
            return redirect()->back()->withFlashDanger(__('Lokasi stok telah wujud'));
        }

        if($this->check_petak($request->device_id,$request->petak) == 0){
            return redirect()->back()->withFlashDanger(__('Lokasi stok melebihi petak yang disediakan!'));
        }

        $lokasistok = new Lokasistoks();
        $lokasistok->stok_id = $request->stok_id;
        $lokasistok->device_id = $request->device_id;
        $lokasistok->petak = $request->petak;
        $lokasistok->institut_id = auth()->user()->institut_id;

        if($lokasistok->save()){
            return redirect()->route('admin.lokasistok')
            ->withFlashSuccess(__('Lokasi Stok telah berjaya disimpan.'));
        }
        else{
            return redirect()->back()->withFlashDanger(__('Lokasi Stok gagal disimpan'));
        }

    }

    public function check_stok($id){
        return Lokasistoks::where('stok_id',$id)
            ->where('institut_id',auth()->user()->institut_id)
            ->count();
    }
    public function check_device($device_id,$petak){
        return Lokasistoks::where('device_id',$device_id)
            ->where('petak',$petak)
            ->count();
    }

    public function check_petak($device_id,$petak){
        return Devices::where('id',$device_id)
            ->where('bil_petak','>=',$petak)
            ->count();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lokasistok  $lokasistok
     * @return \Illuminate\Http\Response
     */
    public function show(Lokasistoks $lokasistok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lokasistok  $lokasistok
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokasistoks $lokasistok)
    {
        //
        return view('backend.editlokasistok')
            ->withLokasistok($lokasistok)
            ->withDevice(Devices::where('institut_id',auth()->user()->institut_id)->get())
            ->withStok(Stoks::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lokasistok  $lokasistok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lokasistok)
    {
        //
        $updateData = $request->validate([
            'device_id' => 'required',
            'petak' => 'required'
        ]);

        if(!empty($request->device_id)){
            if($this->check_device($request->device_id,$request->petak) > 0){
                return redirect()->back()->withFlashDanger(__('Lokasi stok telah wujud'));
            }

            if($this->check_petak($request->device_id,$request->petak) == 0){
                return redirect()->back()->withFlashDanger(__('Lokasi stok melebihi petak yang disediakan!'));
            }
        }

        Lokasistoks::whereId($lokasistok)->update($updateData);

        return redirect()->route('admin.lokasistok')->withFlashSuccess(__('Lokasi Stok berjaya dikemaskini.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lokasistok  $lokasistok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasistoks $lokasistok)
    {
        $lokasistok->delete();

        return redirect()->route('admin.lokasistok')->withFlashSuccess(__('Lokasi Stok berjaya dipadam.'));
    }
}
