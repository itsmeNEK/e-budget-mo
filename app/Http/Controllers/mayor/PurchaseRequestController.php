<?php

namespace App\Http\Controllers\mayor;

use App\Http\Controllers\Controller;
use App\Models\mayor\PurchaseRequest;
use App\Models\mayor\PurchaseRequestDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PurchaseRequestController extends Controller
{
    private $purchase_request;
    private $purchase_request_details;

    public function __construct(PurchaseRequest $purchase_request, PurchaseRequestDetails $purchase_request_details)
    {
        $this->purchase_request = $purchase_request;
        $this->purchase_request_details = $purchase_request_details;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form.pr.PR');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'department' => 'required',
            'section' => 'required',
            'prno' => 'required',
            'date1' => 'required',
        ]);

        $purchase_request = $this->purchase_request;
        $purchase_request->user_id = Auth::user()->id;
        $purchase_request->department = $request->department;
        $purchase_request->section = $request->section;
        $purchase_request->prno = $request->prno;
        $purchase_request->saino = $request->saino;
        $purchase_request->alobsno = $request->alobsno;
        $purchase_request->date1 = $request->date1;
        $purchase_request->date2 = $request->date2;
        $purchase_request->date3 = $request->date3;
        $purchase_request->purpose = $request->purpose;
        $purchase_request->save();
        $details = [];
        for ($i = 0; $i < count($request->itemno); $i++) {
            $details[] = [
                'purchase_request_id' => $purchase_request->id,
                'itemno' => $request->itemno[$i],
                'quantity' => $request->quantity[$i],
                'unitissue' => $request->unitissue[$i],
                'itemdescription' => $request->itemdescription[$i],
                'estimateunit' => $request->estimateunit[$i],
                'estimatecost' => $request->estimatecost[$i],
            ];
        }
        $this->purchase_request_details->insert($details);

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
        $pr = $this->purchase_request->where('id',$id)->first();
        return view('form.pr.showPR')->with('pr',$pr);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->purchase_request->destroy($id);
        Session::flash('alert', 'danger|Record has been Deleted');
        return redirect()->back();
    }

    public function reject($id)
    {

        $pr = $this->purchase_request->findOrFail($id);
        $pr->status = 2;
        $pr->save();

        Session::flash('alert', 'danger|Purchase Rquest has been Rejected');
        return redirect()->back();
    }

    public function accept($id)
    {
        $pr = $this->purchase_request->findOrFail($id);
        $pr->status = 1;
        $pr->save();

        Session::flash('alert', 'success|Purchase Rquest has been accepted');
        return redirect()->back();
    }
}
