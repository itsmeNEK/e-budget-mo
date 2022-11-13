<h4>Request for Price Quotation</h4>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered table-sm text-center align-item-center">
        <thead class="table-dark text-uppercase">
            <tr>
                <th width="5%">id</th>
                <th>PR No.</th>
                <th width="30%">Name</th>
                <th>Item</th>
                <th>Total</th>
                <th>Status</th>
                <th width="15%"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse ($all_rpq as $rpq)
                <tr>
                    <th>{{ $rpq->id }}</th>
                    <th>{{ $rpq->purchaseRequest->prno }}</th>
                    <th>{{ $rpq->name }}</th>
                    <th>{{ $rpq->items }}</th>
                    <th>{{ $rpq->total }}</th>
                    <th><span class="badge text-bg-success">On Proccess</span></th>
                    <th>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                            <a href="" class="btn btn-warning">View</a>
                            {{-- <a href="" class="btn btn-success">Accept</a>
                            <a href="" class="btn btn-danger">Reject</a> --}}
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
