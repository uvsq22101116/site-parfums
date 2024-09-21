<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Comment;

class CommentController extends Controller {
    public function list() {
        $comments = Comment::getAll();
        $this->render('comments/list', ['comments' => $comments]);
    }
}
