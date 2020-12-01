<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Stoks;
use App\Models\Devices;
use App\Models\Lokasistoks;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $stok = Stoks::count();
        $stok_ins = Lokasistoks::where('institut_id',auth()->user()->institut_id)->count();
        $deviceall = Devices::count();
        $device = Devices::where('institut_id',auth()->user()->institut_id)->count();

        return view('frontend.user.dashboard')
            ->with('stok',$stok)
            ->with('stok_ins',$stok_ins)
            ->with('deviceall',$deviceall)
            ->with('device',$device);
    }




}
