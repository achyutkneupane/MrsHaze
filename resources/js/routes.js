import React from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter,Route,Switch,Link} from 'react-router-dom';
import CategoryArticles from './Pages/CategoryArticles/CategoryArticles';
import FourZeroFour from './Pages/FourZeroFour/FourZeroFour';
import LandingPage from './Pages/LandingPage/LandingPage';
import ViewArticle from './Pages/ViewArticle/ViewArticle';

function Routes() {
    return (
        <BrowserRouter>
            <Switch>
                <Route path='/' exact>
                    <LandingPage />
                </Route>
                <Route path='/article/:slug' children={({ match }) => <ViewArticle match={match} />} />
                <Route path='/category/:slug' children={({ match }) => <CategoryArticles match={match} />} />
                <Route component={FourZeroFour}></Route>
            </Switch>
        </BrowserRouter>
    );
}

export default Routes;

if (document.getElementById('mrshaze')) {
    ReactDOM.render(<Routes />, document.getElementById('mrshaze'));
}