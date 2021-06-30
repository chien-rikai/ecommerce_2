<form action="{{route('suggest.more')}}" method="POST">
@csrf
  <div class="modal fade" id="myModal-2" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4>{{__('lang.suggest-more')}}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
          <ul class="rating rating-with-review-item" id="review-star">
            @include('web.table.suggest_more')
          </ul>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" id="review-star6">{{__('lang.suggest-more')}}</button>
        </div>
      </div>
    </div>
  </div>
</form>