<?php

namespace  app\Controllers\axe;

use Exception;

class Routes {
    private array $lesActions;
    private string $action;
    private const DEFAULT_ROUTE = 'connexion_ctrl.php';
    private const ERROR_ROUTE = 'page404_ctrl.php';

    public function __construct() {
        $this->lesActions = [
            'defaut'  => self::DEFAULT_ROUTE,
            'accueil' => self::DEFAULT_ROUTE,
            'page404' => self::ERROR_ROUTE,
        ];
    }

    public function redirection(string $action = 'defaut'): void {
        $this->action = $action;
        $controller_id = $this->lesActions[$this->action] ?? self::ERROR_ROUTE;

        try {
            require $this->getFilePath($controller_id);
        } catch (Exception $e) {
            error_log($e->getMessage());
            require $this->getFilePath(self::ERROR_ROUTE);
        }
    }

    private function getFilePath(string $file): string {
        $path = RACINE . 'app/Controllers/' . $file;
        if (!file_exists($path)) {
            throw new Exception("Le fichier de contrôle {$file} est introuvable.");
        }
        return $path;
    }
}