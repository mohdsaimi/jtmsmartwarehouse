<?php

namespace App\Http\Controllers;

use App\Models\Devices;
use App\Models\Institut;
use Illuminate\Http\Request;


class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $device = Devices::where([

            [function ($query) use ($request){

                if(($term=$request->term)){
                    $query->orWhere('kod_IOT','LIKE','%'. $term .'%')->get();
                }

            }]
        ])
            ->orderBy('id','ASC')->paginate(15);

        return view('backend.device',compact('device'))
            ->withInstituts(Institut::all())
            ->with('i', (request()->input('page', 1) - 1) * 15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.createdevice')
        ->withInstituts(Institut::all());
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
        $request->validate([
            'kod_IOT' => 'required',
            'bil_petak' => 'required',
            'institut_id' => 'required'
        ]);

        $data = Devices::where('kod_IOT',$request->kod_IOT)->first();

        if(!$data){
            Devices::create($request->all());
            return redirect()->route('admin.device')->withFlashSuccess(__('Peranti IOT Stok baru berjaya disimpan.'));
        }
        if($data){
            // user found
            return redirect()->route('admin.device')->withFlashDanger(__('Peranti IOT Stok telah ada di database.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Devices $device)
    {
        //
        return view('backend.showdevice')
            ->withDevice($device);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Devices $device)
    {
        //
        return view('backend.editdevice')
            ->withDevice($device)
            ->withInstituts(Institut::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $device)
    {
        //
        $updateData = $request->validate([
            'kod_IOT' => 'required',
            'bil_petak' => 'required',
            'institut_id' => 'required'
        ]);


        Devices::whereId($device)->update($updateData);

        return redirect()->route('admin.device')->withFlashSuccess(__('Peranti IOT Stok berjaya dikemaskini.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devices $device)
    {
        //
        $device->delete();

        return redirect()->route('admin.device')->withFlashSuccess(__('Peranti IOT Stok berjaya dipadam.'));
    }
}
