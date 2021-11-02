import React from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter,Route,Switch,Link} from 'react-router-dom';
import Home from './components/Home';
import Example from './components/Example';

function Routes() {
    return (
        <BrowserRouter>
            <Switch>
                <Route path='/' exact>
                    <Home />
                </Route>
                <Route path='/example' exact>
                    <Example />
                </Route>
            </Switch>
        </BrowserRouter>
    );
}

export default Routes;

if (document.getElementById('mrshaze')) {
    ReactDOM.render(<Routes />, document.getElementById('mrshaze'));
}