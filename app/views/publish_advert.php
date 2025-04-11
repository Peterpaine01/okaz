<?php
require_once __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/../libs/pdo.php';
require_once __DIR__ . '/../libs/category.php';


// Redirige vers la page de connexion si l'utilisateur n'est pas connecté
if (empty($_SESSION["user"])) {
    header("Location: /login");
    exit;
}
$categories = getCategories($pdo);
var_dump_pre($_SESSION["user"]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $price = $_POST['price'] ?? 0;
    $description = $_POST['description'] ?? '';
    $category = $_POST['category'] ?? 0;
    $image = $_FILES['image'] ?? null;
    $user_id = $_SESSION['user']['id'] ?? null;

    // Assurez-vous que les champs obligatoires sont remplis
    if ($title && $price > 0 && $category && $image && $image['error'] === UPLOAD_ERR_OK) {
        
        // Gestion du fichier image
        $imageName = uniqid() . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
        $targetDir = __DIR__ . '/../../public/uploads/listing/';
        $targetFile = $targetDir . $imageName;

        // Vérifie si l'image est bien un fichier valide (optionnel)
        $imageFileType = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        $validExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($imageFileType, $validExtensions)) {
            $error = "Seules les images JPG, JPEG, PNG, et GIF sont autorisées.";
        } else {
            // Déplace le fichier dans le dossier cible
            if (move_uploaded_file($image['tmp_name'], $targetFile)) {
                // Données pour l'annonce
                $data = [
                    'title' => $title,
                    'price' => $price,
                    'description' => $description,
                    'category' => $category,
                    'image' => $imageName, 
                    'user_id' => $user_id,
                ];

                // Appel à la fonction pour ajouter l'annonce
                if ($listingId = addListing($pdo, $data)) {
                    // Redirige l'utilisateur vers la page de l'annonce avec un message de succès
                    header("Location: /annonce/{$listingId}?success=1");
                    exit;
                } else {
                    $error = "Erreur lors de la publication de l'annonce.";
                }
            } else {
                $error = "Erreur lors du téléchargement de l'image.";
            }
        }
    } else {
        $error = "Veuillez remplir tous les champs obligatoires.";
    }
}

?>


<div class="form-listing w-100 m-auto">
    <form method="post" enctype="multipart/form-data">
        <h1 class="mb-3 fw-normal">Publier une annonce</h1>
        <div class="py-2">
            <label class="form-label" for="title">Titre</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Que vendez-vous ?">
        </div>
        <div class="py-1">
            <label class="form-label" for="price">Prix</label>
            <input name="price" type="number" class="form-control" id="price" placeholder="0" step="0.01" min="0">
        </div>
        <div class="py-1">
            <label class="form-label" for="description">Description</label>
            <textarea name="description" class="form-control" id="description" placeholder="Dites-nous en plus... ?"></textarea>
        </div>
        <div class="py-2">
            <label class="form-label" for="category">Catégorie</label>
            <select name="category" class="form-select" id="category">
                <?php foreach ($categories as $key => $category) { ?>
                    <option value="<?= $category["id"] ?>" <?php if (isset($_GET["category"]) && $category["id"] === (int)$_GET["category"]) { echo 'selected="selected"'; } ?>>
                        <?= $category["name"] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="py-2">
            <label class="form-label" for="image">Image</label>
            <input name="image" type="file" class="form-control" id="image" required>
        </div>
        <button class="btn btn-primary w-100 py-2 my-1" type="submit">Publier</button>
    </form>
</div>






  <?php
require_once __DIR__ . '/../templates/footer.php';
?>