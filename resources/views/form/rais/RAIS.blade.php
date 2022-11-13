@extends('layouts.app')

@section('title', 'Create Document')
@section('bg-color', 'warning')
@section('content')
    <div class="container p-5 bg-white">
        <form action="{{ route('mayor.rais.store') }}" method="POST">
            @csrf
            <h4>Requisition and Issue Slip</h4>
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="division" class="form-label">Division</label>
                        <input type="text" class="form-control" value="{{ old('division') }}" name="division"
                            id="division" placeholder="Division">
                        @error('division')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">RIS No.</label>
                        <input type="text" class="form-control" value="{{ old('risno') }}" name="risno" id=""
                            placeholder="PR No.">
                        @error('risno')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Date</label>
                        <input type="date" class="form-control" value="{{ old('date1') }}" name="date1" id=""
                            placeholder="Date">
                        @error('date1')
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
                                <label for="" class="form-label">Code</label>
                                <input type="text" class="form-control" value="{{ old('code') }}" name="code"
                                    id="" placeholder="SAI No.">
                                    @error('code')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">RAI No.</label>
                                <input type="text" class="form-control" value="{{ old('raino') }}" name="raino"
                                    id="" placeholder="RAI No.">
                                    @error('raino')
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
                                    @error('date2')
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
            <div class="mb-3">
                <label for="" class="form-label">Purpose</label>
                <textarea class="form-control" name="purpose" id="" rows="1" placeholder="Purpose"></textarea>
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
                                                txtNewInputBox.innerHTML = "<div class='row'><div class='col'><div class='mb-3'><input type='text' name='balancestock[]' class='form-control' id='newInputBox' placeholder='Item No.'></div></div><div class='col'><div class='mb-3'><input type='text' name='quantity[]' class='form-control' id='newInputBox' placeholder='Quantity'></div></div><div class='col'><div class='mb-3'><input type='text' name='unitissue[]' class='form-control' id='newInputBox' placeholder='Unit of Issue'></div></div><div class='col-3'><div class='mb-3'><input type='text' name='itemdescription[]' class='form-control' id='newInputBox' placeholder='Item Desciption'></div></div><div class='col'><div class='mb-3'><input type='text' name='estimateunit[]' class='form-control' id='newInputBox' placeholder='Total Unit Cost'></div></div><div class='col'><div class='mb-3'><input type='text' name='estimatecost[]' class='form-control' id='newInputBox' placeholder='Total Cost'></div></div></div>";

                                                // Finally put it where it is supposed to appear.
                                                document.getElementById("newElementId").appendChild(txtNewInputBox);
                                            }
                                            </script>
@endsection
