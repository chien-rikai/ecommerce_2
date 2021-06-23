@if(!empty($requests))
@foreach($requests as $request)
<div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
    <div class="ticket-details col-md-10">
        <div class="d-flex">
            <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">{{$request->user->username}}</p>
            @if(!isset($request->product_id))
            <p class="mb-0 ellipsis">{{__('lang.has-sent-a-request-to-import-new-product')}}</p>
            @else
            <p class="mb-0 ellipsis">{{__('lang.has-sent-a-request-to-increment-quantity-of')}}</p>
            @endif
        </div>
        <p class="text-gray ellipsis mb-2"><strong>{{$request->name}}</strong> </p>
        <div class="row text-gray d-md-flex d-none">
            <div class="col-4 d-flex">
                <small class="mb-0 mr-2 text-muted text-muted">{{__('lang.send-at')}} :</small>
                <small class="Last-responded mr-2 mb-0 text-muted text-muted">{{$request->created_at}}</small>
            </div>
        </div>
    </div>
    <div class="ticket-actions col-md-2">
        <div class="btn-group dropdown">
            <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"> Manage </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('request.show',[$request->id])}}">
                    <i class="fa fa-reply fa-fw"></i>{{__('lang.resolve')}}</a>
            </div>
        </div>
    </div>
</div>
@endforeach
{{$requests->links()}}
@else
  {{__('lang.no-data')}}
@endif