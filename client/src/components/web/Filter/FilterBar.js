export const FilterBar =()=>{
    return (
        <div class="shop-top-bar mt-30">
                <div class="shop-bar-inner">
                    <div class="product-view-mode">
                        <ul class="nav shop-item-filter-list" role="tablist">
                            <li role="presentation"><a aria-selected="true" class="active show"
                                    aria-controls="grid-view" href="#" data-toggle="tab" id="all"><i
                                        class="fa fa-th">&nbsp;All</i></a></li>
                            <li><a aria-selected="true" class="show" aria-controls="grid-view" href="#"
                                    data-toggle="tab" id="popular"><i class="fa fa-fire">&nbsp;Popular</i></a>
                            </li>
                            <li><a aria-selected="true" class="show" data-toggle="tab" aria-controls="grid-view"
                                    href="#" id="history"><i class="fa fa-history">&nbsp;History</i></a></li>
                        </ul>
                    </div>
                    <div class="toolbar-amount">
                        <span>Showing 1 to 9 of 15</span>
                    </div> 
                </div>
                <input type="hidden" class="view-types" value="all"/>
                <div class="product-select-box">
                    <select class="nice-select sort-by">
                        <option value="normal" selected>Normal</option>
                        <option value="name">Name</option>
                        <option value="price">Price</option>
                        <option value="star_rating">Rating</option>
                    </select>
                </div>
                <div class="product-select-box">
                    <select class="nice-select order-by">
                        <option value="asc" selected>Asc</option>
                        <option value="desc">Desc</option>
                    </select>
                </div>
            </div>
    );
}