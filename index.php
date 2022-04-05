<?php
//le nom de la variable

//Connexion à la base donnée
include('inc/config.php');
//Connexion de l'entête du fichier
include('inc/header.php');

//connecion de la navbar

 //error_reporting() modifie la directive error_reporting pendant l'exécution du script.
 error_reporting( ~E_NOTICE );

    //Si le bouton au nom "submit" est cliquer
    if (isset($_POST['submit'])) {
        $contact = htmlspecialchars($_POST['contact']);
        $nom = htmlspecialchars($_POST['nom']);
        
         if (empty($nom) OR empty($contact) ) {
            echo '
                    <div class="bs-example text-center">    
                        <div class="toast fade show">
                            <div class="toast-header red" >
                                <strong class="mr-auto"><i class="fa fa-exclamation-triangle"></i> Information</strong>
                                <button type="button" class="ml-2 mb-1 close red" data-dismiss="toast">&times;</button>
                            </div>
                            <div class="toast-body red">Veuillez; s\'il vous plaît remplir tous les champs du formulaire</div>
                        </div>
                    </div>  '; 
         } 
         
         else {//sinon

            $sql = "INSERT INTO `users` ( `nom`, `contact`) VALUES (:nom, :contact);";//$sql reçoit la requête d'exécution d'insertion dans la table users des différents paramètre
                        $req = $bdd->prepare($sql);//la requête $sql est préparée
                        //Une fois la requête preparée on l'exécute 
                        $result = $req->execute([
                            ':nom'      => $nom,
                            ':contact'      => $contact,
                            
                            
                        ]);
            //Si $result qui permet l'exécution de l'insertion dans la base de donnée n'est pas null alors
            if(!empty($result)){
                //on affiche que tout est bon et que celui-ci sera rédirigé dans 2 secondes
                echo '
                        <div class="bs-example text-center">    
                            <div class="toast fade show">
                                <div class="toast-header green" >
                                    <strong class="mr-auto green"><i class="fa fa-check-circle green"></i> Succes</strong>
                                    <button type="button" class="ml-2 mb-1 close green" data-dismiss="toast">&times;</button>
                                </div>
                                <div class="toast-body green">
                                    Bravo l\'enregistrement a bien été fait et vous serez rédirigez d\'ici 5  secondes
                                </div>
                            </div>
                        </div> ';
                header("refresh:5;index.php");//header permet la redirection vers la nouvelle qu'on souhaite, et le refresh permet de définir en seconde le temps mis.
            }
            
        }
          
    }

?>
   
    <div class="jumbotron">
        <div class="container mt-5">
            <div class="row">
                    <h1 class="display-4"> AJOUTER UN ETUDIANT</h1>
                <div class="col-sm"></div>
                <div class="col-sm"></div>
                <div class="col-sm"></div>
                <div class="col-sm"></div>
                <div class="col-sm">
                    <a name="" id="" class="btn btn-primary " href="index.php" role="button">
                        <i class="fa fa-arrow-left fa-3x" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
                <form class="container form1" action="" method="POST" name="frmAdd" class="ml-5 text-center">

                    <h2 class="text-center"></h2>


                    <div class="form-group ">
                        <label >Nom</label>
                        <input type="text" name="nom" class="form-control w-25" >
                    </div>
                    <div class="form-group ">
                        <label >contact</label>
                        <input type="text" name="contact" class="form-control w-25" >
                    </div>
                    
                    
                    

                    <input type="submit" name="submit" class="btn btn-primary">

                </form>
                
            </div>
    </div>


</body>
</html>