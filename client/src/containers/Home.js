import { FilterBar } from '../components/web/Filter/FilterBar';
import banner from '../style/images/banner.jpg';
import { ProductList } from '../components/web/product/ProductList';
import { Component, useEffect, useState } from 'react';
import ApiClient from '../services/Api';
import { Pagination } from '@material-ui/lab';
import { CategoryBar } from '../components/web/SideBar/CategoryBar';
export class HomeContainer extends Component{
    state ={
        products: [],
        isLoading :true,
        current_page :1,
        total :0,
        per_page :0,
        total_page:0,
        type: 'all',
        orderBy : 'asc',
        sortBy :'normal'    
    }
    async componentDidMount(){
        await this.getProducts();
    }  
    async getProducts(event,page=1){    
        this.setState({...this.state,isLoading: true});
        const response =await ApiClient.get('/web.com/products/fetch/'+this.state.type,{
            params:{
                page : page,
                orderBy: this.state.orderBy,
                sortBy : this.state.sortBy
            }
        });
        this.setState({
            ...this.state,
            current_page:page,
            products: response.products.data,
            isLoading:false,
            total: response.products.total,
            per_page: response.products.per_page,
            total_page: response.products.last_page,
        });
    }
    async changeView(e){
        e.preventDefault();
        this.setState({
            ...this.state,
            type: e.target.id,  
            
        },async()=>{
            await this.getProducts(e,1);
        });
    }
    async changeOrderBy(e){
      e.preventDefault();
      this.setState({
          ...this.state,
          orderBy: e.target.value,      
        },async()=>{
            await this.getProducts(e,1);
        });
    }
    async changeSortBy(e){
      e.preventDefault();
      this.setState({
          ...this.state,
          sortBy: e.target.value,      
        },async()=>{
            await this.getProducts(e,1);
        });
    }
    render(){
        return (
            <>
                <div class="container">
        <div class="row">
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="shop-page-banner">
                    <a href="#">
                        <img src={banner} alt="Banner"/>
                    </a>
                </div>
                {/* <FilterBar onChange={}/> */}
                <div class="shop-top-bar mt-30">
                <div class="shop-bar-inner">
                    <div class="product-view-mode">
                        <ul class="nav shop-item-filter-list" role="tablist">
                            <li role="presentation"><a aria-selected="true" class={this.state.type=='all'?'active show':'show'}
                                    aria-controls="grid-view" href="#" data-toggle="tab" value={1} id="all" onClick={this.changeView.bind(this)}><i
                                        class="fa fa-th" id='all'>&nbsp;All</i></a></li>
                            <li><a aria-selected="true" class={this.state.type=='popular'?'active show':'show'} aria-controls="grid-view" href="#"
                                    data-toggle="tab" id="popular" name={2} onClick={this.changeView.bind(this)}><i class="fa fa-fire" id='popular'>&nbsp;Popular</i></a>
                            </li>
                            <li><a aria-selected="true" class="show" data-toggle="tab" aria-controls="grid-view"
                                    href="#" id="history"><i class="fa fa-history">&nbsp;History</i></a></li>
                        </ul>
                    </div>
                    <div class="toolbar-amount">
                        <span></span>
                    </div> 
                </div>
                <div class="product-select-box">
                    <select class="nice-select" onChange={this.changeSortBy.bind(this)}>
                        <option value="normal" selected>Normal</option>
                        <option value="name">Name</option>
                        <option value="price">Price</option>
                        <option value="star_rating">Rating</option>
                    </select>
                </div>
                <div class="product-select-box">
                    <select class="nice-select" onChange={this.changeOrderBy.bind(this)}>
                        <option value="asc" selected>Asc</option>
                        <option value="desc">Desc</option>
                    </select>
                </div>
            </div>
                {
                    !this.state.isLoading?<ProductList products={this.state.products}/>:<div>Loading</div>              
                }
                <br/>
                <br></br>
                <Pagination
                    count={this.state.total_page}
                    onChange={this.getProducts.bind(this)}
                    color="primary"
                 />
            </div>
            <div class="col-lg-3 order-2 order-lg-1">
                <CategoryBar />
            </div>
        </div>
    </div>
    <br/>
            </>
        );
    }
    
}