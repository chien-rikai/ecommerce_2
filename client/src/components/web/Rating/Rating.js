import React,{ Component } from 'react';

export default class Rating extends Component{
    constructor(props){
        super(props);
    }

    render() {
        const rating= []
        for(var i = 0; i<5; i++){
            if(i < this.props.rating){
                rating.push(<li key={i}><i class='fa fa-star'></i></li>);
            }else{
                rating.push(<li class='no-star' key={i}><i class='fa fa-star'></i></li>);
            }
        }
        return (
            <>
               {rating}
            </>
        )
    }
}