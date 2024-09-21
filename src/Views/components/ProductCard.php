<?php
function renderProductCard($product) {
    echo "<div class='product-card'>";
    echo "<h2>" . htmlspecialchars($product['name']) . "</h2>";
    echo "<p>" . htmlspecialchars($product['description']) . "</p>";
    echo "<p>Price: " . htmlspecialchars($product['price']) . "€</p>";
    echo "<button>Add to cart</button>";
    echo "</div>";
}
?>
