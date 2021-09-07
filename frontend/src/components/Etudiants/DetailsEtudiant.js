import React from 'react'

function DetailsEtudiant({etudiant}){

    function reload(){
        window.location.reload()
    }

    return(
        <div className="has-text-centered box">
            <div className="title is-1 has-background-warning has-text-centered has-text-danger p-3">DÉTAILS DE L'ETUDIANT : <br />{etudiant.prenomEtudiant} {etudiant.nomEtudiant}  </div>
            <div>
                <img src="https://picsum.photos/200" alt="" title=""/>
            </div>
            <div className="content">
                <p><b>INFORMATIONS :</b></p>
                <p>SEXE : {etudiant.sexe}</p>
                <p className="has-text-info">DATE DE NAISSANCE : {etudiant.dateNaissance}</p>
            </div>
            <div className="buttons">
                <button onClick={reload} className="button is-info">RETOUR</button>
            </div>
        </div>
    )

}

export default DetailsEtudiant;