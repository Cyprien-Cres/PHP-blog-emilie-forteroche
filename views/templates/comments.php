<?php /**
 *  Affichage des commentaires d'un article dans la partie admin.
 * Possibilité de supprimer un commentaire.
 * */?>

<h2>Commentaires de l'article : <?= htmlspecialchars($article->getTitle()) ?></h2>

<a href="index.php?action=admin" class="submit return">Retour à l'administration</a>

<?php if (empty($comments)): ?>
    <p>Aucun commentaire pour cet article.</p>
<?php else: ?>
    <div class="articleComments">
        <div class="commentsTable">
            <div class="commentRows">
                <div class="pseudo">Pseudo</div>
                <div class="commentContent">Contenu</div>
                <div class="commentDate">Date</div>
                <div class="deleteComment"></div>
            </div>
        <?php foreach ($comments as $comment): ?>
            <div class="commentRows">
                <div class="pseudo"><?= htmlspecialchars($comment->getPseudo()) ?></div>
                <div class="commentContent"><?= htmlspecialchars($comment->getContent()) ?></div>
                <div class="commentDate"><?= Utils::convertDateToFrenchFormat($comment->getDateCreation()) ?></div>
                <div class="deleteComment">
                    <a class="submit" href="index.php?action=deleteComment&id=<?= $comment->getId() ?>&idArticle=<?= $article->getId() ?>">Supprimer</a>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>