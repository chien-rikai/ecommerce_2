<form action="{{route('review',[$product->id])}}" method="POST">
@csrf
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4>{{__('lang.review')}}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
          <ul class="rating rating-with-review-item" id="review-star">
            @include('web.table.review_star')
          </ul>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" id="review-star6">{{__('lang.review')}}</button>
        </div>
      </div>
    </div>
  </div>
</form>
