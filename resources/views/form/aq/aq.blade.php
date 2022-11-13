@extends('layouts.app')

@section('title', 'Request for Price Quotation')
@section('content')
    <div class="container p-5 bg-white">
        <h4>Request for Price Quotation</h4>
        <form action="{{ route('mayor.rpq.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="" class="form-label">PR No</label>
                            <select class="form-select form-select" name="prno" id="prno">
                                <option hidden>Select PR no</option>
                                @forelse ($all_pr_a as $pr)
                                    <option value="{{ $pr->id }}">{{ $pr->prno }}</option>
                                @empty
                                    <option disabled>No PR accepted</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name"
                            placeholder="Name">
                        @error('name')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Position</label>
                        <input type="text" class="form-control" value="{{ old('position') }}" name="position"
                            id="" placeholder="Position">
                        @error('position')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Address/Tel No.</label>
                        <input type="text" class="form-control" value="{{ old('address') }}" name="address"
                            id="" placeholder="Address/Tel No.">
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Items</label>
                        <input type="text" class="form-control" value="{{ old('items') }}" name="items" id="items"
                            placeholder="Items">
                        @error('items')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Unit Price</label>
                        <input type="text" class="form-control" value="{{ old('unit') }}" name="unit" id="unit"
                            placeholder="Unit Price">
                    </div>
                    @error('unit')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Total Amount</label>
                        <input type="text" class="form-control" value="{{ old('amount') }}" name="amount"
                            id="amount" placeholder="Total Amount">
                    </div>
                    @error('amount')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Total</label>
                        <input type="text" class="form-control" value="{{ old('total') }}" name="total"
                            id="total" placeholder="Total">
                    </div>
                    @error('total')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-secondary float-end text-white fw-bold"><i
                    class="bi bi-send me-1"></i>Process</button>
        </form>
    </div>
@endsection
