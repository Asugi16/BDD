
<?php
require('controller/controller.php');
session_start();

try {

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listBillets') {
            listBillets();
        } elseif ($_GET['action'] == 'billet') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                billet();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['auteur']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['auteur'], $_POST['comment']);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'connexion') {
            connexion();
        } elseif ($_GET['action'] == 'inscription') {
            inscription();
        } elseif ($_GET['action'] == 'updateComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updateComment($_GET['id']);
            }
        } elseif ($_GET['action'] == 'changeComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    changeComment($_GET['id'], $_POST['comment']);
                }
            }
        } elseif ($_GET['action'] == 'idk') {
            idk($_GET['id'], $_POST['billet']);
        }
    } else {
        listBillets();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
