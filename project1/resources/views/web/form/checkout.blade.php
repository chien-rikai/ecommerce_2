<form action="#">
    <div class="checkbox-form">
        <h3>{{__('lang.billing-detail')}}</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="checkout-form-list">
                    <label>{{__('lang.customer-name')}} <span class="required">*</span></label>
                    <input placeholder="" type="text">
                </div>
            </div>
            <div class="col-md-12">
                <div class="checkout-form-list">
                    <label>{{__('lang.address')}} <span class="required">*</span></label>
                    <input placeholder="Street address" type="text">
                </div>
            </div>
            <div class="col-md-12">
                <div class="checkout-form-list">
                    <label>{{__('lang.email')}} <span class="required">*</span></label>
                    <input placeholder="" type="email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="checkout-form-list">
                    <label>{{__('lang.phone')}} <span class="required">*</span></label>
                    <input type="text">
                </div>
            </div>
        </div>
        <div class="different-address">
            <div class="order-notes">
                <div class="checkout-form-list">
                    <label>{{__('lang.note')}}</label>
                    <textarea id="checkout-mess" cols="30" rows="10"
                        placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                </div>
            </div>
        </div>
    </div>
</form>
