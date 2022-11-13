@extends('layouts.app')

@section('title', 'Create Document')
@section('content')
    <div class="container p-5 bg-white">
        <form action="{{ route('purchaseOrder.store') }}" method="POST">
            @csrf
            <h4>Purchase Order</h4>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="supplier" class="form-label">Supplier</label>
                        <input type="text" class="form-control" value="{{ old('supplier') }}" name="supplier"
                            id="supplier" placeholder="Supplier">
                            @error('supplier')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Address</label>
                        <input type="text" class="form-control" value="{{ old('address') }}" name="address"
                            id="" placeholder="Address">
                            @error('address')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">PO No.</label>
                                <input type="text" class="form-control" value="{{ old('pono') }}" name="pono"
                                    id="" placeholder="PO No.">
                                    @error('pono')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Mode of Procurement</label>
                                <input type="text" class="form-control" value="{{ old('modeproc') }}" name="modeproc"
                                    id="" placeholder="Mode of Procurement">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Date</label>
                                <input type="date" class="form-control" value="{{ old('date') }}" name="date"
                                    id="" placeholder="Date">
                                    @error('date')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">PR No.</label>
                                <input type="text" class="form-control" value="{{ old('prno') }}" name="prno"
                                    id="" placeholder="PR No.">
                                    @error('prno')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Place of Delivery</label>
                        <input type="text" class="form-control" value="{{ old('placedelivery') }}" name="placedelivery" id=""
                            placeholder="Place of Delivery">
                            @error('placedelivery')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Delivery Term</label>
                        <input type="text" class="form-control" value="{{ old('deliveryterm') }}" name="deliveryterm" id=""
                            placeholder="Delivery Term">
                            @error('deliveryterm')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Date of Delivery</label>
                        <input type="text" class="form-control" value="{{ old('datedelivery') }}" name="datedelivery" id=""
                            placeholder="Date of Delivery">
                            @error('datedelivery')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Payment Terms</label>
                        <input type="text" class="form-control" value="{{ old('paymentterms') }}" name="paymentterms" id=""
                            placeholder="Payment Terms">
                            @error('paymentterms')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                    </div>
                </div>
            </div>
            <hr>
            <div class="mb-3 w-25">
                <div id="dynamicCheck">
                    <input type="button" class="btn btn-warning text-white fw-bold" value="Add row"
                        onclick="createNewElement();" />
                </div>
            </div>
            <div id="newRows">Click here to add row</div>
            <hr>
            <div class="mb-3">
                <label for="" class="form-label">Total Amount</label>
                <input type="text" class="form-control" value="{{ old('totalamount') }}" name="totalamount" id=""
                    placeholder="Total Amount">
                    @error('totalamount')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Total Amount in word</label>
                <textarea class="form-control" name="totalamountW" id="" rows="1" placeholder="Total Amount in word"></textarea>
                @error('totalamountW')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning float-end text-white fw-bold"><i
                    class="bi bi-send me-1"></i>Process</button>
        </form>
    </div>
    <script type="text/JavaScript">
        function createNewElement() {
                                        // First create a DIV element.
                                        var txtNewInputBox = document.createElement('div');

                                        // Then add the content (a new input box) of the element.
                                        txtNewInputBox.innerHTML = "<div class='row'><div class='col'><div class='mb-3'><input type='text' name='itemno[]' class='form-control' id='newInputBox' placeholder='Item No.'></div></div><div class='col'><div class='mb-3'><input type='text' name='quantity[]' class='form-control' id='newInputBox' placeholder='Quantity'></div></div><div class='col'><div class='mb-3'><input type='text' name='unitissue[]' class='form-control' id='newInputBox' placeholder='Unit of Issue'></div></div><div class='col-3'><div class='mb-3'><input type='text' name='itemdescription[]' class='form-control' id='newInputBox' placeholder='Item Desciption'></div></div><div class='col'><div class='mb-3'><input type='text' name='estimateunit[]' class='form-control' id='newInputBox' placeholder=' Unit Cost'></div></div><div class='col'><div class='mb-3'><input type='text' name='estimatecost[]' class='form-control' id='newInputBox' placeholder=' Cost'></div></div></div>";

                                        // Finally put it where it is supposed to appear.
                                        document.getElementById("newRows").appendChild(txtNewInputBox);
                                    }
                                    </script>
@endsection
