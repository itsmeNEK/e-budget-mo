<?php

namespace App\Http\Controllers\mayor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mayor\air as AdminAir;
use App\Models\mayor\airDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class airController extends Controller
{
    private $air;
    private $air_details;

    public function __construct(AdminAir $air, airDetails $air_details)
    {
        $this->air = $air;
        $this->air_details = $air_details;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mayor.air');
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
        $request->validate([
            'supplier' => 'required',
            'airno' => 'required',
            'pono' => 'required',
            'invoiceno' => 'required',
            'rod' => 'required',
        ]);

        $air = $this->air;
        $air->user_id = Auth::user()->id;
        $air->supplier = $request->supplier;
        $air->airno = $request->airno;
        $air->pono = $request->pono;
        $air->date = $request->date;
        $air->invoiceno = $request->invoiceno;
        $air->date2 = $request->date2;
        $air->rod = $request->rod;
        $air->acceptance = $request->acceptance;
        $air->inspection = $request->inspection;
        $air->dater = $request->dater;
        $air->datei = $request->datei;
        $air->save();
        $details = [];
        for ($i = 0; $i < count($request->itemno); $i++) {
            $details[] = [
                'air_id' => $air->id,
                'itemno' => $request->itemno[$i],
                'unit' => $request->unit[$i],
                'itemdescription' => $request->itemdescription[$i],
                'quantity' => $request->quantity[$i],
            ];
        }
        $this->air_details->insert($details);

        Session::flash('alert', 'success|Record has been Saved');
        return redirect()->back();
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
    public function update(Request $request, $id)
    {
        //
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
