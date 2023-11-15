<?php
class CommentController {
    public static function addComment() {
        // Handle the comment form submission
        $productId = $_POST['product_id'];
        $buyerId = $_SESSION['user_id'];
        $comment = $_POST['comment'];
        CommentModel::addComment($buyerId, $productId, $comment);

    }

}
