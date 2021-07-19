import './App.css';
import { HeaderComponent   } from './components/web/header/Header';
import {HomePage} from './pages/web/home';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";
import { CartPage } from './pages/web/cart/Cart';
import { DetailPage } from './pages/web/detail/Detail';
import { Checkout } from './pages/web/checkout/Checkout';
import LoginAndRegisterPage from './components/web/login/LoginAndRegisterPage';
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
                <Route path='/cart'>
                  <CartPage/>
                </Route>
                <Route path='/product/:id' component={DetailPage}/>
                <Route path='/payment' component={Checkout}/>
             </Switch>
          </div>
          <div className="footer">
          </div>
          <div class="footer">
            
          </div>
    </Router>
  );
}
export default App;
