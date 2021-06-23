<div class="modal fade" id="request_more" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('lang.suggest-more')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="request-more-form" action="{{ route('request.store')}}" method="POST">
          @csrf
          @Method('POST')
          <input type="hidden" id="id" name="product_id" value="">
          <input type="hidden" id="name" name="name" value="">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{__('lang.name-product')}}</label>
            <input type="text" id="name" class="form-control" value="" disabled>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{__('lang.quantity')}}</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="1">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">{{__('lang.note')}}</label>
            <textarea class="form-control" id="message" name="note"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.cancel')}}</button>
        <button type="submit" class="btn btn-primary" form="request-more-form">{{__('lang.request')}}</button>
      </div>
    </div>
  </div>
</div>