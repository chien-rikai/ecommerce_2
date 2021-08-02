import axios from 'axios';
import React,{ Component } from 'react';
import {Modal, Button} from 'react-bootstrap';
import Rating from './Rating';

class Review extends Component{
    constructor(props){
        super(props);
        this.state = {
            isShow: false,
            rating: 0
        }
    }

    open(){
        this.setState({isShow: true});
    }

    close(){
        this.setState({isShow: false, rating:0});
    }

    rating(rating){
        this.setState({rating: rating +1})
    }

    onSubmit(){
        axios({
            method: 'POST',
            url: process.env.REACT_APP_BASE_URL+'/web.com/review/'+this.props.id,
            data: {
                star_rating: this.state.rating,
            },
            headers: {
              'Authorization': 'Bearer '+localStorage.getItem('token'),
            }
           
        }).then(res => {
            alert(res.data.message)
            this.setState({isShow: false, rating:0})
            window.location.reload();
        }).catch(err => console.log(err));
        
    }

    render(){
        console.log(this.props.rating);
        const rating= [];
        for(let i = 0; i<5; i++){
            if(i < this.state.rating){
                rating.push(<li key={i}><i onClick={() => this.rating(i)} class='fa fa-star'></i></li>);
            }else{
                rating.push(<li key={i} class='no-star'><i onClick={() => this.rating(i)} class='fa fa-star'></i></li>);
            }
        }
        return(
            <>
                <Rating rating={this.props.rating}></Rating>
                <li onClick={() => this.open()}><a href>Review</a></li>
                <Modal show={this.state.isShow}>
                    <Modal.Header>
                        Review
                        <Button className="pull-right" onClick={() => this.close()}>Close</Button>
                        </Modal.Header>
                    <Modal.Body>
                    <ul class="rating rating-with-review-item" id="review-star">
                        {rating}
                    </ul>               
                    </Modal.Body>
                    <Modal.Footer>
                        <Button onClick={() => this.onSubmit()}>Review</Button>
                    </Modal.Footer>
                </Modal>
            </>
        )
    }
}

export default Review;