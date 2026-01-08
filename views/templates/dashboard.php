<?php
/**
 * Affichage du tableau de bord.
 */
?>
<div class="adminMenu">
    <a class="adminBtnMenu <?= ($_GET['action'] ?? '') === 'dashboard' ? 'inactive' : '' ?>" href="index.php?action=admin"><h2>Edition des articles</h2></a>
    <p class="separator">|</p>
    <a class="dashboardBtnMenu <?= ($_GET['action'] ?? '') === 'admin' ? 'inactive' : '' ?>" href="index.php?action=dashboard"><h2>Tableau de bord</h2></a>
</div>

<div class="dashboard">
    <?php foreach ($dashboards as $dashboard) { ?>
        <div class="dashboardLine">
            <div class="title"><?= $dashboard->getTitle() ?></div>
            <div class="viewNumber">
                <?= $dashboard->getVueNumber() ?> vue<?= $dashboard->getVueNumber() > 1 ? 's' : '' ?>
            </div>
            <div class="commentNumber">
                <?= $dashboard->getCommentNumber() ?> commentaire<?= $dashboard->getCommentNumber() > 1 ? 's' : '' ?>
            </div>
            <div class="creationDate"><?= Utils::convertDateToFrenchFormat($dashboard->getDateCreation()) ?></div>
        </div>
    <?php } ?>
</div>