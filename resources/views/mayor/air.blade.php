@extends('layouts.app')

@section('title', 'Create Document')
@section('content')
        <form action="{{ route('mayor.air.store') }}" method="POST">
            @csrf
            <h4>Acceptance and Inspection Report</h4>
            <div class="row">
                <div class="col-8">
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
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="airno" class="form-label">AIR no</label>
                        <input type="text" class="form-control" value="{{ old('airno') }}" name="airno"
                            id="airno" placeholder="AIR no">
                        @error('airno')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
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
                                <label for="" class="form-label">Date</label>
                                <input type="date" class="form-control" value="{{ old('date') }}" name="date"
                                    id="">
                                @error('date')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Invoice No.</label>
                                <input type="text" class="form-control" value="{{ old('invoiceno') }}" name="invoiceno"
                                    id="" placeholder="Invoice No.">
                                @error('invoiceno')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Date</label>
                                <input type="date" class="form-control" value="{{ old('date2') }}" name="date2"
                                    id="">
                                @error('date2')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Requisitioning Office / Department</label>
                                <input type="text" class="form-control" value="{{ old('rod') }}" name="rod"
                                    id="" placeholder="Requisitioning Office / Department">
                                @error('rod')
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
            <div class="mb-3 w-25">
                <div id="dynamicCheck">
                    <input type="button" class="btn btn-warning text-white fw-bold" value="Add row"
                        onclick="createNewElement();" />
                </div>
            </div>
            <div id="newElementId">Click here to add row</div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Acceptance</label>
                        <input type="text" class="form-control" value="{{ old('acceptance') }}" name="acceptance"
                            id="" placeholder="Acceptance">
                        @error('acceptance')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Inspection</label>
                        <input type="text" class="form-control" value="{{ old('inspection') }}" name="inspection"
                            id="" placeholder="Inspection">
                        @error('inspection')
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
                        <label for="" class="form-label">Date Received</label>
                        <input type="date" class="form-control" value="{{ old('dater') }}" name="dater"
                            id="" placeholder="Date Received">
                        @error('dater')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Date Inspected</label>
                        <input type="date" class="form-control" value="{{ old('datei') }}" name="datei"
                            id="" placeholder="Date Inspected">
                        @error('datei')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
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
            txtNewInputBox.innerHTML = "<div class='row'><div class='col'><div class='mb-3'><input type='text' name='itemno[]' class='form-control' id='newInputBox' placeholder='Item No.'></div></div><div class='col'><div class='mb-3'><input type='text' name='unit[]' class='form-control' id='newInputBox' placeholder='Unit'></div></div><div class='col-6'><div class='mb-3'><input type='text' name='itemdescription[]' class='form-control' id='newInputBox' placeholder='Item Desciption'></div></div><div class='col'><div class='mb-3'><input type='text' name='quantity[]' class='form-control' id='newInputBox' placeholder='Quantity'></div></div></div>";

            // Finally put it where it is supposed to appear.
           document.getElementById("newElementId").appendChild(txtNewInputBox);
                                            }
                                            </script>
@endsection
