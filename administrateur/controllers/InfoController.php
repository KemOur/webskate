<?php

require('models/Info.php');


if ($_GET['action'] == 'info') {
    $infos = getInfos();
    require('views/info.php');
}
elseif($_GET['action'] == 'new'){
    $infos=getInfos();
    require('views/infoForm.php');
}
elseif($_GET['action'] == 'addInfo'){
    if(empty($_POST['sujet']) || empty($_POST['news'])){

        if(empty($_POST['sujet']) ){
            $_SESSION['messages'][] = 'Quel est votre sujet? !';
        }
        if(empty($_POST['news'])){
            $_SESSION['messages'][] = 'Ce champs ne peut pas être vide!';
        }
        $_SESSION['old_inputs'] = $_POST;
        header('Location:index.php?controller=infos&action=new');
        exit;
    }
    else{
        $resultAdd = addInfo($_POST);

        $_SESSION['messages'][] = $resultAdd ? 'L\'information à été ajouté !' : "Erreur lors de l'ajout de l'info... :(";
        header('Location:index.php?controller=infos&action=info');
        exit;
    }
}

elseif($_GET['action'] == 'delInfo'){
    $result = delInfo($_GET['id']);
    if($result){
        $_SESSION['messages'][] = 'supprimé avec succés !';
    }
    else{
        $_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
    }
    header('Location:index.php?controller=infos&action=info');
    exit;
}

elseif($_GET['action'] == 'editInfo'){
    if(!empty($_POST)){
        if(empty($_POST['sujet']) || empty($_POST['news'])){

            if(empty($_POST['sujet'])){
                $_SESSION['messages'][] = 'Ce champ est obligatoire !';
            }
            if(empty($_POST['news'])){
                $_SESSION['messages'][] = 'Veuillez remplir le champ!!';
            }

            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=infos&action=editInfo&id='.$_GET['id']);
            exit;
        }else

            $result = editInfo($_GET['id'], $_POST);
        if($result){
            $_SESSION['messages'][] = 'info à été mis à jour!';
        }
        else{
            $_SESSION['messages'][] = 'erreur... :(';
        }
        header('Location:index.php?controller=infos&action=info');
        exit;
    }

    else{
        if (!isset($_SESSION['old_inputs'])){
            $info = getInfo($_GET['id']);
        }
        $infos = getInfos();

        require('views/infoForm.php');
    }
}