<?php

namespace App\Http\Controllers\mayor;

use App\Http\Controllers\Controller;
use App\Models\mayor\rais;
use App\Models\mayor\raisDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class raisController extends Controller
{
    private $rais;
    private $rais_details;

    public function __construct(rais $rais, raisDetails $rais_details)
    {
        $this->rais = $rais;
        $this->rais_details = $rais_details;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mayor.RAIS');
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
            'division' => 'required',
            'risno' => 'required',
            'code' => 'required',
            'raino' => 'required',
            'date1' => 'required',
            'date2' => 'required',
        ]);

        $rais = $this->rais;
        $rais->user_id = Auth::user()->id;
        $rais->division = $request->division;
        $rais->risno = $request->risno;
        $rais->date1 = $request->date1;
        $rais->code = $request->code;
        $rais->raino = $request->raino;
        $rais->date2 = $request->date2;
        $rais->purpose = $request->purpose;
        $rais->save();
        $details = [];
        for ($i = 0; $i < count($request->balancestock); $i++) {
            $details[] = [
                'rais_id' => $rais->id,
                'balancestock' => $request->balancestock[$i],
                'quantity' => $request->quantity[$i],
                'unitissue' => $request->unitissue[$i],
                'itemdescription' => $request->itemdescription[$i],
                'estimateunit' => $request->estimateunit[$i],
                'estimatecost' => $request->estimatecost[$i],
            ];
        }
        $this->rais_details->insert($details);

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
