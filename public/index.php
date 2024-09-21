<?php
session_start();

// Inclure le fichier de connexion à la base de données
require_once 'db.php'; // Assure-toi que ce fichier existe

// Gestion des pages
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'about':
        $title = "À propos";
        break;
    case 'products':
        $title = "Produits";
        break;
    case 'contact':
        $title = "Contact";
        break;
    case 'login':
        $title = "Connexion";
        break;
    default:
        $title = "Bienvenue chez Dupes de Parfums";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
    <header>
        <h1><?php echo $title; ?></h1>
        <nav>
            <ul>
                <li><a href="?page=about">À propos</a></li>
                <li><a href="?page=products">Produits</a></li>
                <li><a href="?page=contact">Contact</a></li>
                <li><a href="?page=login">Connexion</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php
        // Inclure le contenu des pages selon le paramètre
        switch ($page) {
            case 'about':
                ?>
                <section id="about">
                    <h2>À propos de nous</h2>
                    <p>Nous sommes spécialisés dans la création de dupes de parfums de haute qualité à des prix abordables. Découvrez notre gamme de fragrances qui capturent l'essence des plus grands noms.</p>
                </section>
                <?php
                break;
            case 'products':
                ?>
                <section id="products">
                    <h2>Nos Dupes de Parfums</h2>
                    <ul>
                        <li>
                            <h3>Dupe de Chanel No. 5</h3>
                            <img src="public/assets/images/premium_photo-1676748933022-e1183e997436.avif" alt="Dupe de Chanel No. 5" style="width: 200px;">
                            <p>Une fragrance intemporelle aux notes florales et boisées.</p>
                        </li>
                        <li>
                            <h3>Dupe de Dior Sauvage</h3>
                            <img src="public/assets/images/photo-1657270081105-d6a924b9ddab.avif" alt="Dupe de Dior Sauvage" style="width: 200px;">
                            <p>Un parfum audacieux avec des notes épicées et fraîches.</p>
                        </li>
                        <li>
                            <h3>Dupe de Yves Saint Laurent Black Opium</h3>
                            <img src="public/assets/images/photo-1657270081105-d6a924b9ddab.avif" alt="Dupe de Yves Saint Laurent Black Opium" style="width: 200px;">
                            <p>Un parfum oriental et gourmand, parfait pour les soirées.</p>
                        </li>
                    </ul>
                </section>
                <?php
                break;
            case 'contact':
                ?>
                <section id="contact">
                    <h2>Contactez-nous</h2>
                    <p>Pour toute question ou commande, n'hésitez pas à nous contacter à l'adresse email suivante :</p>
                    <p><a href="mailto:contact@dupesdeparfums.com">contact@dupesdeparfums.com</a></p>
                </section>
                <?php
                break;
            case 'login':
                ?>
                <section id="login">
                    <h2>Connexion</h2>
                    <form action="login.php" method="POST">
                        <label for="username">Nom d'utilisateur :</label>
                        <input type="text" name="username" required>
                        <br>
                        <label for="password">Mot de passe :</label>
                        <input type="password" name="password" required>
                        <br>
                        <button type="submit">Se connecter</button>
                    </form>
                </section>
                <?php
                break;
            default:
                ?>
                <section id="home">
                    <h2>Bienvenue chez Dupes de Parfums</h2>
                    <p>Découvrez nos produits de qualité à prix abordables.</p>
                </section>
                <?php
        }
        ?>
    </main>
    <footer>
        <p>&copy; 2024 Dupes de Parfums. Tous droits réservés.</p>
    </footer>
</body>
</html>

