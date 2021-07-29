import './App.css';
import { HeaderComponent   } from './components/web/header/Header';
import {HomePage} from './pages/web/home';
import ProfilePage from './components/web/profile/ProfilePage';
import './bootstrap.min.css'
import { createStore } from 'redux';
import { todoLogin } from './redux/reducers/LoginAndRegister';
import LoginAndRegisterPage from './components/web/login/LoginAndRegisterPage';
import Home from './components/Home';
import { UpdateUserType } from './enums/UpdateUserType';
import './bootstrap.min.css'
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";
import { CartPage } from './pages/web/cart/Cart';
import { DetailPage } from './pages/web/detail/Detail';
import { Checkout } from './pages/web/checkout/Checkout';
import { Footer } from './components/web/footer/Footer';
var defaultState = {user: [], orders: [],}

var store = createStore(todoLogin, defaultState);
function App() {
  return (
    <Router>
      <div class="body-wrapper">
            <HeaderComponent/>
          </div>
          <div class="content-wraper pt-60 pb-60">
             <Switch>
                <Route exact path="/">
                  <HomePage />
                </Route>
                <Route path="/home" component={HomePage} />
                <Route path="/login" component={LoginAndRegisterPage} />
                <Route path="/profile" 
                  render={props => <ProfilePage {...props} isRole={UpdateUserType.PROFILE} />}
                />
                <Route path="/change-password" 
                  render={props => <ProfilePage {...props} isRole={UpdateUserType.CHANGE_PASSWORD} />}
                />
                <Route path="/order-history" 
                  render={props => <ProfilePage {...props} isRole={UpdateUserType.ORDER_HISTORY} />}
                />
                <Route path='/cart'>
                  <CartPage/>
                </Route>
                <Route path='/product/:id' component={DetailPage}/>
                <Route path='/payment' component={Checkout}/>
             </Switch>
          </div>
          <div class="footer">
             <Footer/>
          </div>
    </Router>
  );
}
export default App;
export {store};
