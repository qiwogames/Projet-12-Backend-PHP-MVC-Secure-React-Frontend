import React from 'react';
import logo from '../../logo.png';
import './Accueil.css';


function Accueil(){
    return(
        <div className="mt-3 container is-fluid">
            <div className="box">
                <div className="container is-fluid">
                    <img src="https://www.internetcreation.net/wp-content/uploads/2015/04/banner-web-development.png" width="100%"/>
                </div>
                <div className="has-text-centered mt-5">
                    <img src={logo} alt="mic school" title="Mic_Dev_School"/>
                    <h1 className="title is-1 has-text-info">Ecole de Développement Web & Mobile</h1>
                </div>

                <div className="columns mt-5">
                    <div className="column is-3">
                        <img src="https://cdn.nemesis-studio.com/wp-content/uploads/2015/06/developpement-web.png"/>
                    </div>
                    <div className="column is-9">

                        <h4 className="title is-4 has-text-info">Where does it come from?</h4>

                        <p className="title is-5 has-text-grey">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                        Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor
                        at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,
                        from a Lorem Ipsum passage, and going through the cites of the word in classical literature,
                        discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "
                            de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC.</p>

                        <p className="mt-3 title is-5 has-text-danger">This book is a treatise on the theory of ethics, very popular during the Renaissance.
                            The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>

                        <p className="mt-3 title is-5 has-text-danger">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                        Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced
                            in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                        </p>

                    </div>
                </div>


                <h2 className="title is-2 has-text-centered has-text-success">LOREM IPSUM ETC...</h2>

                <div className="columns mt-5">



                    <div className="column is-9">

                        <h4 className="title is-4 has-text-info">Where does it come from?</h4>

                        <p className="title is-5 has-text-grey">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                            Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor
                            at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,
                            from a Lorem Ipsum passage, and going through the cites of the word in classical literature,
                            discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "
                            de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC.</p>

                        <p className="mt-3 title is-5 has-text-danger">This book is a treatise on the theory of ethics, very popular during the Renaissance.
                            The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>

                        <p className="mt-3 title is-5 has-text-danger">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                            Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced
                            in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                        </p>

                    </div>
                    <div className="column is-3">
                        <img src="https://astuces-informatique.com/wp-content/uploads/2020/03/langage-programmation-developpement-web.jpg"/>
                    </div>
                </div>

            </div>



        </div>
    )
}




export default Accueil;
