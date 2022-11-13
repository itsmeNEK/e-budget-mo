<h4>Purchase Request</h4>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered table-sm text-center align-item-center">
        <thead class="table-dark text-uppercase">
            <tr>
                <th width="5%">id</th>
                <th width="30%">department</th>
                <th>PR No.</th>
                <th>SAI No.</th>
                <th>ALOBS</th>
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
                    <th>{{ $pr->saino }}</th>
                    <th>{{ $pr->alobsno }}</th>
                    <th>
                        @if ($pr->status == 0)
                            <span class="badge text-bg-warning">
                                Pending
                            @elseif ($pr->status == 1)
                                <span class="badge text-bg-success">
                                    In Property
                        @endif
                        </span>
                    </th>
                    <th>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ route('purchaseRequest.show', $pr->id) }}" class="btn btn-warning">View</a>
                            @if ($pr->status == 0)
                                <a href="{{ route('purchaseRequest.accept', $pr->id) }}"
                                    class="btn btn-success">Accept</a>
                                <a href="{{ route('purchaseRequest.reject', $pr->id) }}"
                                    class="btn btn-danger">Reject</a>
                            @endif
                        </div>
                    </th>
                </tr>
            @empty
                <tr>
                    <th colspan="9" class="text-center">No Records found!</th>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
