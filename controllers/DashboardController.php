<?php

class DashboardController
{
    public function showDashboard()
    {
        $dashboardManager = new DashboardManager();
        $dashboards = $dashboardManager->getAllArticlesForDashBoard();

        $view = new View("Dashboard");
        $view->render("dashboard", [
            'dashboards' => $dashboards
        ]);
    }
}