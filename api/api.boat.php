<?php
use App\DB\BDD;
include_once 'model/bd.boat.inc.php';

// Définir les en-têtes de réponse HTTP
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Origin: *");

$request_method = $method;

// Fonction pour envoyer une réponse JSON
function sendResponse($statusCode, $data)
{
    http_response_code($statusCode);
    echo json_encode($data);
}
/*

// Fonction pour récupérer toutes les categories articles
function getCategs()
{
    global $pdo;  // variable présente dans db.php
    $stmt = $pdo->query("SELECT * FROM categorie_article");
    $categs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    sendResponse(200, $categs);
}

// Fonction pour récupérer une categorie  par ID
function getCategById($id)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM categorie_article WHERE id = ?");
    $stmt->execute([$id]);
    $categ = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($categ) {
        sendResponse(200, $categ);
    } else {
        sendResponse(404, ["message" => "categorie non trouvée"]);
    }
}

// Fonction pour ajouter une categorie article
function createCateg()
{
    global $pdo;
    $data = json_decode(file_get_contents("php://input"));

    if (!isset($data->id) || !isset($data->libel)) {
        sendResponse(400, ["message" => "Données manquantes"]);
        return;
    }

    $stmt = $pdo->prepare("INSERT INTO categorie_article (id, libel) VALUES (?, ?)");
    $stmt->execute([$data->id, $data->libel]);
    sendResponse(201, ["message" => "catégorie créée"]);
}

// Fonction pour mettre à jour une categorie article
function updateCateg($id)
{
    global $pdo;
    $data = json_decode(file_get_contents("php://input"));

    if (!isset($data->id) || !isset($data->libell)) {
        sendResponse(400, ["message" => "Données manquantes"]);
        return;
    }

    $stmt = $pdo->prepare("UPDATE categorie_article SET id = ?, libel = ?");
    $stmt->execute([$data->id, $data->libelail]);

    if ($stmt->rowCount()) {
        sendResponse(200, ["message" => "categrorie  mise à jour"]);
    } else {
        sendResponse(404, ["message" => "categorie  non trouvée"]);
    }
}

// Fonction pour supprimer une categorie
function deleteCateg($id)
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM categorie_article WHERE id = ?");
    $stmt->execute([$id]);

    if ($stmt->rowCount()) {
        sendResponse(200, ["message" => "categorie supprimée"]);
    } else {
        sendResponse(404, ["message" => "categorie non trouvée"]);
    }
}
*/

// Gestion des différentes méthodes HTTP

$id = $data['id'] ?? false;

switch ($request_method) {
    case 'GET':

        if ($id) {
            sendResponse(200, getBoatByID($id));
        } else {
            sendResponse(200, getAllBoat());
        }
        break;
    case 'POST':
        /*
        createCateg();
        */
        break;
    case 'PUT':
        /*
        if ($id) {
            updateCateg($id);
        } else {
            sendResponse(400, ["message" => "ID manquant"]);
        }
        */
        break;
    case 'DELETE':
        /*
        if ($id) {
            deleteCateg($id);
        } else {
            sendResponse(400, ["message" => "ID manquant"]);
        }
        */
        break;
    default:
        /*
        sendResponse(405, ["message" => "Méthode non autorisée"]);
        */
        break;
}


