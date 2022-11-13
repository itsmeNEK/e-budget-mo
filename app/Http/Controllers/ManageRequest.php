<?php

namespace App\Http\Controllers;

use App\Models\mayor\PurchaseRequest;
use App\Models\mayor\rpq;
use Illuminate\Http\Request;

class ManageRequest extends Controller
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
        $all_pr = $this->purchaseRequest->latest()->get();
        $all_rpq = $this->rpq->latest()->get();

        return view('mayor.managerequest')
        ->with('all_pr',$all_pr)
        ->with('all_rpq',$all_rpq);
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
