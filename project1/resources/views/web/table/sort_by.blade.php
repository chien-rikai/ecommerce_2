<p>{{__('lang.sort-by')}}:</p>
<select onchange="SortBy(0)" id="sort_by_id" class="nice-select">
  <option value="created_at"><a>{{__('lang.created-at')}}</a></option>
  <option value="view">{{__('lang.view')}}</option>
  <option value="price">{{__('lang.price')}}</option>
  <option value="star_rating">{{__('lang.review')}}</option>
</select>
<i onclick="SortBy(1)" class="fa fa-sort icon-sort"></i>