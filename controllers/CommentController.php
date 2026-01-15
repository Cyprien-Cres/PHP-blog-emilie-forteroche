<?php

class CommentController 
{
    /**
     * Ajoute un commentaire.
     * @return void
     */
    public function addComment() : void
    {
        // Récupération des données du formulaire.
        $pseudo = Utils::request("pseudo");
        $content = Utils::request("content");
        $idArticle = Utils::request("idArticle");

        // On vérifie que les données sont valides.
        if (empty($pseudo) || empty($content) || empty($idArticle)) {
            throw new Exception("Tous les champs sont obligatoires. 3");
        }

        // On vérifie que l'article existe.
        $articleManager = new ArticleManager();
        $article = $articleManager->getArticleById($idArticle);
        if (!$article) {
            throw new Exception("L'article demandé n'existe pas.");
        }

        // On crée l'objet Comment.
        $comment = new Comment([
            'pseudo' => $pseudo,
            'content' => $content,
            'idArticle' => $idArticle
        ]);

        // On ajoute le commentaire.
        $commentManager = new CommentManager();
        $result = $commentManager->addComment($comment);

        // On vérifie que l'ajout a bien fonctionné.
        if (!$result) {
            throw new Exception("Une erreur est survenue lors de l'ajout du commentaire.");
        }

        // On redirige vers la page de l'article.
        Utils::redirect("showArticle", ['id' => $idArticle]);
    }

    /**
     * Affiche les commentaires d'un article.
     * @return void
     */
    public function showArticleComments(): void
    {
        $idArticle = Utils::request('idArticle');

        $articleManager = new ArticleManager();
        $article = $articleManager->getArticleById($idArticle);

        if (!$article) {
            throw new Exception("Article non trouvé.");
        }

        $commentManager = new CommentManager();
        $comments = $commentManager->getAllCommentsByArticleId($idArticle);

        $view = new View($article->getTitle());
        $view->render("comments", ['article' => $article, 'comments' => $comments]);
    }

    /**
     * Supprime un commentaire.
     * @return void
     */
    public function deleteCommentById(): void
    {
        $commentId = (int)($_GET['id'] ?? 0);

        if ($commentId) {
            $commentManager = new CommentManager();
            $comment = $commentManager->getCommentById($commentId);

            if ($comment) {
                $idArticle = $comment->getIdArticle();
                $commentManager->deleteComment($comment); // Passer l'objet, pas l'ID
                header("Location: index.php?action=articleComments&idArticle=" . $idArticle);
                exit;
            }
        }

        header("Location: index.php?action=admin");
        exit;
    }
}