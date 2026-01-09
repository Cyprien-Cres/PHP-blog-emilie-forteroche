<div class="adminMenu">
    <a class="adminBtnMenu <?= ($_GET['action'] ?? '') === 'dashboard' ? 'inactive' : '' ?>" href="index.php?action=admin"><h2>Edition des articles</h2></a>
    <p class="separator">|</p>
    <a class="dashboardBtnMenu <?= ($_GET['action'] ?? '') === 'admin' ? 'inactive' : '' ?>" href="index.php?action=dashboard&sort=title&order=asc"><h2>Tableau de bord</h2></a>
</div>

<div class="dashboard">
    <div class="dashboardLine">
        <a class="title sortable" href="<?= $sortUrls['title'] ?>">
            Titre de l'article
        </a>
        <a class="viewNumber titleColumn sortable" href="<?= $sortUrls['views'] ?>">
            Nombre de vues
        </a>
        <a class="commentNumber titleColumn sortable" href="<?= $sortUrls['comments'] ?>">
            Nombre de commentaires
        </a>
        <a class="creationDate titleColumn sortable" href="<?= $sortUrls['date'] ?>">
            Date de création
        </a>
    </div>
    <?php foreach ($dashboards as $dashboard) : ?>
        <div class="dashboardLine">
            <div class="title"><?= htmlspecialchars($dashboard->getTitle()) ?></div>
            <div class="viewNumber"><?= $dashboard->getVueNumber() ?></div>
            <div class="commentNumber"><?= $dashboard->getCommentNumber() ?></div>
            <div class="creationDate"><?= Utils::convertDateToFrenchFormat($dashboard->getDateCreation()) ?></div>
        </div>
    <?php endforeach; ?>
</div>
