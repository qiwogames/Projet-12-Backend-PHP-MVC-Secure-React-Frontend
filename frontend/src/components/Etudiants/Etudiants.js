import React,{useState, useEffect} from 'react';

import './Etudiants.css';
import axios from "axios";
import DetailsEtudiant from "./DetailsEtudiant";


function Etudiants(){
    //Hook etudiants
    const [etudiants, setEtudiants] = useState([])

    //Details etudiants hook
    const [etudiantCourant, setEtudiantCourant] = useState(null);

    const afficherEtudiants = () =>{
        axios.get("http://localhost/SchoolFullstack/backend/vues/etudiant_json.php")
            .then(response => {
                setEtudiants(response.data);
                console.log(response.data);
            })
            .catch(err => {
                console.log("Erreur : " + err);
            })
    }

    //Etudiant par ID
    const etudiantID = (etudiant) => {
        setEtudiantCourant(etudiant)
        //debug
        console.log(etudiant)
    }

    //Cycle de vie apres componentDidMount() apres le 1er render()

    useEffect(() => {
        afficherEtudiants();
    },[])

    return (
        <div className="etudiant-content box p-5 m-5">
            <div className="box">
                <h1 className="title is-1 has-text-centered has-text-success">ETUDIANT DEPUIS PHP JSON ENCODE</h1>
            </div>

            {etudiantCourant ? (
                <DetailsEtudiant etudiant={etudiantCourant}/>
            ) : (

                <div className="columns is-multiline">
                    {etudiants.map(etudiant =>
                        <div key={etudiant.id} onClick={() => etudiantID(etudiant, etudiant.id)} className="mt-5 column is-2">
                            <div className="card">
                                <div className="card-image">
                                    <figure className="image">
                                        <img src="https://picsum.photos/200" alt="" title=""/>
                                    </figure>
                                </div>
                                <div className="card-content">
                                    <div className="media">
                                        <div className="media-content">
                                            <p className="title is-4">PRENOM :<br /> {etudiant.prenomEtudiant}</p>
                                            <p className="title is-4">NOM :<br /> {etudiant.nomEtudiant}</p>
                                        </div>
                                    </div>

                                    <div className="content">
                                        <p>SEXE : {etudiant.sexe}</p>
                                        <p>DATE DE NAISSANCE : {etudiant.dateNaissance}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    )}
                </div>
            )}
        </div>
    );
}

export default Etudiants;
