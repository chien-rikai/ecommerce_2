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
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";



var defaultState = {user: [], orders: [],}


var store = createStore(todoLogin, defaultState);
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
                <Route path="/profile" 
                  render={props => <ProfilePage {...props} isRole={UpdateUserType.PROFILE} />}
                />
                <Route path="/change-password" 
                  render={props => <ProfilePage {...props} isRole={UpdateUserType.CHANGE_PASSWORD} />}
                />
                <Route path="/order-history" 
                  render={props => <ProfilePage {...props} isRole={UpdateUserType.ORDER_HISTORY} />}
                />
             </Switch>
          </div>
          <div className="footer">
            
          </div>
          
    </Router>
  );
}

export default App;
export {store};
