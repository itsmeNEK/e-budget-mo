@extends('layouts.app')

@section('title', 'Manage Request')
@section('content')
    <div class="container p-5 bg-white">
        <h4>Manage Request</h4>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="purchase-request-tab" data-bs-toggle="pill" data-bs-target="#purchase-request"
                    type="button" role="tab" aria-controls="purchase-request" aria-selected="true">Purchase Request</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                    aria-expanded="false">Quotation</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" id="request-price-tab" data-bs-toggle="pill"
                            data-bs-target="#request-price" type="button" role="tab"
                            aria-controls="request-price">Request for Price Quotation</a></li>
                    <li><a class="dropdown-item" id="abstract-tab" data-bs-toggle="pill" data-bs-target="#abstract"
                            type="button" role="tab" aria-controls="abstract">Abstract of
                            Quotation</a></li>
                </ul>
            </li>
            @if (Auth::user()->role === '2')
                <li class="nav-item">
                    <a class="nav-link" id="PO-tab" data-bs-toggle="pill" data-bs-target="#PO" type="button"
                        role="tab" aria-controls="PO">Purchase Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="OR-tab" data-bs-toggle="pill" data-bs-target="#OR" type="button"
                        role="tab" aria-controls="OR">Obligation Request</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" id="allotment-tab" data-bs-toggle="pill" data-bs-target="#allotment" type="button"
                    role="tab" aria-controls="allotment">Allotment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="air-tab" data-bs-toggle="pill" data-bs-target="#air" type="button" role="tab"
                    aria-controls="air" href="#">Acceptance and Inspection Report</a>
            </li>
            @if (Auth::user()->role === '3'||Auth::user()->role === '4')
                <li class="nav-item">
                    <a class="nav-link" id="ris-tab" data-bs-toggle="pill" data-bs-target="#ris" type="button"
                        role="tab" aria-controls="ris">Requisition and Issue Slip</a>
                </li>
            @endif
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="purchase-request" role="tabpanel">
                @include('mayor.MR-table.PR')
            </div>
            <div class="tab-pane fade" id="request-price" role="tabpanel">
                @include('mayor.MR-table.RPQ')
            </div>
            <div class="tab-pane fade" id="abstract" role="tabpanel">
                abstract
            </div>
            <div class="tab-pane fade" id="PO" role="tabpanel">
                PO
            </div>
            <div class="tab-pane fade" id="OR" role="tabpanel">OR</div>
            <div class="tab-pane fade" id="allotment" role="tabpanel">allotment</div>
            <div class="tab-pane fade" id="air" role="tabpanel">air</div>
            <div class="tab-pane fade" id="ris" role="tabpanel">ris</div>
        </div>
    </div>
@endsection
