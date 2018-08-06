import React from 'react';
import { BrowserRouter as Router, Route } from 'react-router-dom';
//import Login from './components/login'
//import Register from './components/register'
import Home from './components/home'

export default (
    <Router>
        <Route exact path = "/" component = { Home } /> 
    </Router>
);


