<form action="submit_comment.php" method="POST">
    <input type="hidden" name="product_id" value="<?= $product->id ?>">
    <div>
        <label for="comment">Ajouter un commentaire :</label>
        <textarea name="comment" id="comment" required></textarea>
    </div>
    <button type="submit">Envoyer</button>
</form>
