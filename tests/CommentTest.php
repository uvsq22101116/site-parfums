<?php

use PHPUnit\Framework\TestCase;
use App\Models\Comment;

class CommentTest extends TestCase {
    // Test pour l'ajout d'un commentaire
    public function testAddComment() {
        // Simuler les données d'entrée
        $user_id = 1;
        $parfum_id = 1;
        $comment = "C'est un excellent parfum !";

        // Appeler la méthode addComment
        $result = Comment::addComment($user_id, $parfum_id, $comment);

        // Vérifier que l'ajout a été un succès
        $this->assertTrue($result);
    }

    // Test pour récupérer les commentaires d'un parfum
    public function testGetCommentsByParfumId() {
        $parfum_id = 1;
        $comments = Comment::getCommentsByParfumId($parfum_id);

        // Vérifier que la liste n'est pas vide
        $this->assertNotEmpty($comments);
        $this->assertIsArray($comments);
    }

    // Test pour récupérer tous les commentaires
    public function testGetAllComments() {
        $comments = Comment::getAll();

        // Vérifier que la liste des commentaires n'est pas vide
        $this->assertNotEmpty($comments);
        $this->assertIsArray($comments);
    }
}
?>
