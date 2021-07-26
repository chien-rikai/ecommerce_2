import logo from './logo.svg';
import './App.css';
import { HeaderComponent   } from './components/web/header/Header';
import {HomePage} from './pages/web/home';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";
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
             </Switch>
          </div>
          <div class="footer">
            
          </div>
          
    </Router>
  );
}

export default App;
