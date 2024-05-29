<?php
    session_start();
    include '../database/database.php';

    if(isset($_POST['inscription'])){
        if ($db){
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $email=$_POST['email'];
        $password=$_POST['motdepasse'];
        $age=$_POST['year'];
        $phoneNumbre=$_POST['phonenumber'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $zip=$_POST['zip'];
        $check=true;
        $sqlQuery=<<<Query
        SELECT * FROM client
        Query;
        $sql=$db->prepare($sqlQuery);
        $sql->execute();
        if ($sql->rowCount()>0){
            foreach ($sql as $result){
                if($result['adressEmail']===$email){
                    $alert=<<<Alert
                    <script>
                    window.alert('the email has been used');
                    setTimeout(function() {
                        window.location.href = '../../frontend/website/InscriptionPage/Inscription.php';
                    }, 5000); // 1000 milliseconds delay
                    </script>
                    Alert;
                    echo $alert;
                    $check=false;
                    header('location:');
                }
                if($result['numeroDeTelphone']==$phoneNumbre){
                    $check=false;
                    echo <<<Alert
                        <script>
                        window.alert('the phonenumber has been used');
                        setTimeout(function() {
                            window.location.href = '../../frontend/website/InscriptionPage/Inscription.php';
                        }, 5000); // 1000 milliseconds delay
                        </script>
                    Alert;

                }
            }
        }
    }
        if($check){
            
            $sqlQuery=<<<Query
            INSERT INTO `client`(`nom`, `prenom`, `adressEmail`, `motDePass`, `dateDeNaissance`, `numeroDeTelphone`, `vill`, `rue`, `codepostal`) 
            VALUES ('$firstname','$lastname','$email','$password','$age','$phoneNumbre','$city','$state','$zip');
            Query;
            $sql=$db->prepare($sqlQuery);
            $sql->execute();
            $sqlQuery=<<<Query
            SELECT * FROM client WHERE nom ='$firstname' 
            Query;
            $sql=$db->prepare($sqlQuery);
            $sql->execute();
            foreach($sql->fetch(PDO::FETCH_ASSOC) as $key => $value){
                $_SESSION[$key]=$value;
            }
            $script=<<<Script
            <script>
            window.history.go(-2);
            </script>
        Script;
        echo $script;      
        }
    }
?>