@extends('layouts.app')

@section('title', 'Create Document')
@section('content')
    <div class="container p-5 bg-white">
        <form action="{{ route('purchaseRequest.store') }}" method="POST">
            @csrf
            <h4>Purchase Request</h4>
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="department" class="form-label">Department</label>
                        <input type="text" class="form-control" value="{{ old('department') }}" name="department"
                            id="department" placeholder="Department">
                        @error('department')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Section</label>
                        <input type="text" class="form-control" value="{{ old('section') }}" name="section"
                            id="" placeholder="Section">
                        @error('section')
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
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">SAI No.</label>
                                <input type="text" class="form-control" value="{{ old('saino') }}" name="saino"
                                    id="" placeholder="SAI No.">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">ALOBS No.</label>
                                <input type="text" class="form-control" value="{{ old('alobsno') }}" name="alobsno"
                                    id="" placeholder="ALOBS No.">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Date</label>
                                <input type="date" class="form-control" value="{{ old('date1') }}" name="date1"
                                    id="" placeholder="Date">
                                @error('date1')
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
                                    id="" placeholder="Date">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Date</label>
                                <input type="date" class="form-control" value="{{ old('date3') }}" name="date3"
                                    id="" placeholder="Date">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mb-3 w-25">
                <div id="dynamicCheck">
                    <input type="button" class="btn btn-secondary text-white fw-bold" value="Add row"
                        onclick="createNewElement();" />
                </div>
            </div>
            <div id="newElementId">Click here to add row</div>
            <hr>
            <div class="mb-3">
                <label for="" class="form-label">Purpose</label>
                <textarea class="form-control" name="purpose" id="" rows="1" placeholder="Purpose"></textarea>
            </div>
            <button type="submit" class="btn btn-secondary float-end text-white fw-bold"><i
                    class="bi bi-send me-1"></i>Process</button>
        </form>
    </div>
    <script type="text/JavaScript">
        function createNewElement() {
                                        // First create a DIV element.
                                        var txtNewInputBox = document.createElement('div');

                                        // Then add the content (a new input box) of the element.
                                        txtNewInputBox.innerHTML = "<div class='row'><div class='col'><div class='mb-3'><input type='text' name='itemno[]' class='form-control' id='newInputBox' placeholder='Item No.'></div></div><div class='col'><div class='mb-3'><input type='text' name='quantity[]' class='form-control' id='newInputBox' placeholder='Quantity'></div></div><div class='col'><div class='mb-3'><input type='text' name='unitissue[]' class='form-control' id='newInputBox' placeholder='Unit of Issue'></div></div><div class='col-3'><div class='mb-3'><input type='text' name='itemdescription[]' class='form-control' id='newInputBox' placeholder='Item Desciption'></div></div><div class='col'><div class='mb-3'><input type='text' name='estimateunit[]' class='form-control' id='newInputBox' placeholder='Estimated Unit Cost'></div></div><div class='col'><div class='mb-3'><input type='text' name='estimatecost[]' class='form-control' id='newInputBox' placeholder='Estimated Cost'></div></div></div>";

                                        // Finally put it where it is supposed to appear.
                                        document.getElementById("newElementId").appendChild(txtNewInputBox);
                                    }
                                    </script>
@endsection
