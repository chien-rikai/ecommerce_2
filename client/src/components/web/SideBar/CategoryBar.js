import { Component } from "react";
import ApiClient from "../../../services/Api";

export class CategoryBar extends Component{
    state ={
        categories : []
    }
    async componentDidMount(){
        await this.getCategories();
    }

    async getCategories(){
        const response = await ApiClient.get('/web.com/categories');
        console.log(response);
        this.setState({
            categories: response
        });
    }
    render(){
        return(
            <div class="sidebar-categores-box mb-sm-0">
    <div class="sidebar-title">
        <h2>Categories</h2>
    </div>
    <div class="category-tags">
        <ul>
        {
            this.state.categories.map((e)=>{
                return <li><a href="">{e.name}</a></li>
            })
        }
        </ul>
    </div>
    </div>
        )
    }
}