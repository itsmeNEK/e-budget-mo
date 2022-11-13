<?php

namespace App\Http\Controllers\mayor;

use App\Http\Controllers\Controller;
use App\Models\mayor\PurchaseOrder as AdminPurchaseOrder;
use App\Models\mayor\PurchaseOrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PurchaseOrderController extends Controller
{
    private $purchase_order;
    private $purchase_order_details;

    public function __construct(AdminPurchaseOrder $purchase_order, PurchaseOrderDetails $purchase_order_details)
    {
        $this->purchase_order = $purchase_order;
        $this->purchase_order_details = $purchase_order_details;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mayor.PO');
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
            'address' => 'required',
            'prno' => 'required',
            'pono' => 'required',
            'date' => 'required',
            'placedelivery' => 'required',
            'deliveryterm' => 'required',
            'datedelivery' => 'required',
            'paymentterms' => 'required',
            'totalamount' => 'required',
            'totalamountW' => 'required',
        ]);

        $purchase_order = $this->purchase_order;
        $purchase_order->user_id = Auth::user()->id;
        $purchase_order->supplier = $request->supplier;
        $purchase_order->address = $request->address;
        $purchase_order->pono = $request->pono;
        $purchase_order->modeproc = $request->modeproc;
        $purchase_order->date = $request->date;
        $purchase_order->prno = $request->prno;
        $purchase_order->placedelivery = $request->placedelivery;
        $purchase_order->deliveryterm = $request->deliveryterm;
        $purchase_order->datedelivery = $request->datedelivery;
        $purchase_order->paymentterms = $request->paymentterms;
        $purchase_order->totalamount = $request->totalamount;
        $purchase_order->totalamountW = $request->totalamountW;
        $purchase_order->save();
        $details = [];
        for ($i = 0; $i < count($request->itemno); $i++) {
            $details[] = [
                'purchase_order_id' => $purchase_order->id,
                'itemno' => $request->itemno[$i],
                'quantity' => $request->quantity[$i],
                'unitissue' => $request->unitissue[$i],
                'itemdescription' => $request->itemdescription[$i],
                'estimateunit' => $request->estimateunit[$i],
                'estimatecost' => $request->estimatecost[$i],
            ];
        }
        $this->purchase_order_details->insert($details);
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
