import './App.css';
import { HeaderComponent   } from './components/web/header/Header';
import {HomePage} from './pages/web/home';
import { createStore } from 'redux';
import { todoLogin } from './redux/reducers/LoginAndRegister';
import LoginAndRegisterPage from './components/web/login/LoginAndRegisterPage';
import Home from './components/Home';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";

var defaultState = {user: [],}

var store = createStore(todoLogin, defaultState);
import { CartPage } from './pages/web/cart/Cart';
function App() {
  return (
    <Router>
      <div className="body-wrapper">
            <HeaderComponent/>
          </div>
          <div className="content-wraper pt-60 pb-60">
             <Switch>
                <Route exact path="/">
                  <HomePage />
                </Route>
                <Route path="/home" component={Home} />
                <Route path="/login" component={LoginAndRegisterPage} />
                <Route path='/cart'>
                  <CartPage/>
                </Route>
             </Switch>
          </div>
          <div className="footer">
            
          </div>
          
    </Router>
  );
}

export default App;
export {store};
