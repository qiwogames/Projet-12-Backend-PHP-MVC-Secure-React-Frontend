import React,{useState, useEffect} from 'react'
import axios from "axios";
import DetailsEnseignant from "./DetailsEnseignant";


function Enseignants(){

    //Les hooks
    const [enseignants, setEnseignants] = useState([]);
    const [enseignantCourant, setEnseignantCourant] = useState(null);

    const afficherEnseignants = () => {
        axios.get("http://localhost/SchoolFullstack/backend/vues/enseignants/enseignant_json.php")
            .then(response => {
                setEnseignants(response.data);
                console.log(response.data);
            })
            .catch(err => {
                console.log("Erreur : " + err);
            })
    }

    const enseignantID = (enseignant) =>{
        setEnseignantCourant(enseignant);
        console.log(enseignant)
    }

    //Cycle de vie
    useEffect(() => {
        afficherEnseignants();
    }, [])

    return(
        <div className="etudiant-content box p-5 m-5">
            <div className="box">
                <h1 className="title is-1 has-text-centered has-text-success">ENSEIGNANTS DEPUIS PHP JSON ENCODE</h1>
            </div>

            {enseignantCourant ? (
                <DetailsEnseignant enseignant={enseignantCourant}/>
            ) : (

                <div className="columns is-multiline">
                    {enseignants.map(enseignant =>
                        <div key={enseignant.idEns} onClick={() => enseignantID(enseignant, enseignant.id)} className="mt-5 column is-2">
                            <div className="card">
                                <div className="card-image">
                                    <figure className="image">
                                        <img src="https://picsum.photos/200" alt="" title=""/>
                                    </figure>
                                </div>
                                <div className="card-content">
                                    <div className="media">
                                        <div className="media-content">
                                            <p className="title is-4">NOM : <b className="has-text-success">{enseignant.nomEns}</b></p>
                                            <p className="title is-4">PRENOM : <b className="has-text-info">{enseignant.prenomEns}</b></p>
                                        </div>
                                    </div>

                                    <div className="content">
                                        <p>MATIERE : <b className="has-text-warning">{enseignant.nomMatiere}</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    )}
                </div>
            )}
        </div>
    )
}

export default Enseignants;