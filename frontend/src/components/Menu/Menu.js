import React from 'react';
import './Menu.css';
import {BrowserRouter as Router, Switch, Route, Link} from "react-router-dom";
import Etudiants from "../Etudiants/Etudiants";
import logo from '../../logo.png';
import Accueil from "../Accueil/Accueil";
import Enseignants from "../Enseignants/Enseignants";

export default function Menu(){
    return (
        <Router>
            <div>
                <nav className="navbar has-shadow" role={"navigation"}>
                    <div className={"navbar-start"}>
                        <span className={"navbar-item"}>
                            <Link className="title is-1 has-text-info" to="/">
                                <img src={logo}/>
                            </Link>
                        </span>
                        <span className={"navbar-item"}>
                            <Link to="/">ACCUEIL</Link>
                        </span>
                        <span className={"navbar-item"}>
                            <Link to="/etudiants">ETUDIANTS</Link>
                        </span>
                        <span className={"navbar-item"}>
                            <Link to="/enseignants">ENSEIGNANTS</Link>
                        </span>
                    </div>
                </nav>

                {/* La balise switch regarde a travers les enfants des Route et rend les elements qui matches */}
                <Switch>
                    {/* ici exact specifie le point d'entrée par defaut*/}
                    <Route exact path="/">
                        <Accueil/>
                    </Route>
                    <Route path="/etudiants">
                        <Etudiants/>
                    </Route>
                    <Route path="/enseignants">
                        <Enseignants/>
                    </Route>
                </Switch>
            </div>
        </Router>
    );
}

