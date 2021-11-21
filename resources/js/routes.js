import React from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter,Route,Switch,Link} from 'react-router-dom';
import LandingPage from './Pages/LandingPage/LandingPage';
import ViewArticle from './Pages/ViewArticle/ViewArticle';

function Routes() {
    return (
        <BrowserRouter>
            <Switch>
                <Route path='/' exact>
                    <LandingPage />
                </Route>
                <Route exact path='/article/:slug' children={({ match }) => <ViewArticle match={match} />} />
            </Switch>
        </BrowserRouter>
    );
}

export default Routes;

if (document.getElementById('mrshaze')) {
    ReactDOM.render(<Routes />, document.getElementById('mrshaze'));
}