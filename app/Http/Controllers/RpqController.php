<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mayor\PurchaseRequest;
use App\Models\mayor\rpq;
use Illuminate\Support\Facades\Session;

class RpqController extends Controller
{
    private $purchaseRequest;
    private $rpq;

    public function __construct(PurchaseRequest $purchaseRequest,rpq $rpq)
    {
        $this->purchaseRequest = $purchaseRequest;
        $this->rpq = $rpq;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_pr_a = $this->purchaseRequest->where('status','1')->latest()->get();
        return view('form.rpq.RPQ')
        ->with('all_pr_a',$all_pr_a);
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
            'prno' => 'required',
            'name' => 'required',
            'position' => 'required',
            'items' => 'required',
            'unit' => 'required',
            'amount' => 'required',
            'total' => 'required',
        ]);

        $this->rpq->pr_id = $request->prno;
        $this->rpq->name = $request->name;
        $this->rpq->position = $request->position;
        $this->rpq->address = $request->address;
        $this->rpq->items = $request->items;
        $this->rpq->unit = $request->unit;
        $this->rpq->amount = $request->amount;
        $this->rpq->total = $request->total;
        $this->rpq->save();

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
