@extends('layouts.app')

@section('title', 'Document Status')
@section('content')
    <div class="container p-5 bg-white">
        <h4>Document Status</h4>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm text-center align-item-center">
                <thead class="table-dark text-uppercase">
                    <tr>
                        <th width="5%">id</th>
                        <th width="30%">department</th>
                        <th>PR No.</th>
                        <th>Purpose</th>
                        <th>Status</th>
                        <th width="15%"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($all_pr as $pr)
                        <tr>
                            <th>{{ $pr->id }}</th>
                            <th>{{ $pr->department }}</th>
                            <th>{{ $pr->prno }}</th>
                            <th>{{ $pr->purpose }}</th>
                            <th><span class="badge text-bg-success">In Budget</span></th>
                            <th>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ route('purchaseRequest.show',$pr->id) }}" class="btn btn-warning">View</a>
                                    <button  data-bs-toggle="modal" data-bs-target="#cancel-{{ $pr->id }}" type="button" class="btn btn-danger">Cancel</button>
                                </div>
                            </th>
                        </tr>
                        @include('form.modal.PRmodal')
                    @empty
                        <tr>
                            <th colspan="9" class="text-center">No Records found!</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
