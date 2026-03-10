<?php

if (!function_exists('demoAuthBootstrap')) {
    function demoAuthBootstrap(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_GET['demoAuth'])) {
            return;
        }

        $demoAuthValue = strtolower((string) $_GET['demoAuth']);
        $currentState = !empty($_SESSION['demo_authenticated']);

        if ($demoAuthValue === 'toggle') {
            $_SESSION['demo_authenticated'] = !$currentState;
        } elseif ($demoAuthValue === '1') {
            $_SESSION['demo_authenticated'] = true;
        } elseif ($demoAuthValue === '0') {
            $_SESSION['demo_authenticated'] = false;
        }

        demoAuthRedirectCurrentUrlWithoutParam('demoAuth');
    }

    function demoAuthRedirectCurrentUrlWithoutParam(string $paramName): void
    {
        $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
        $uriParts = parse_url($requestUri);
        $path = $uriParts['path'] ?? '/';

        $queryParams = [];
        if (!empty($uriParts['query'])) {
            parse_str($uriParts['query'], $queryParams);
        }

        unset($queryParams[$paramName]);

        $newQuery = http_build_query($queryParams);
        $target = $path . ($newQuery !== '' ? '?' . $newQuery : '');

        header('Location: ' . $target);
        exit;
    }

    function isDemoAuthenticated(): bool
    {
        return !empty($_SESSION['demo_authenticated']);
    }

    function shouldUseAppShell(): bool
    {
        return isDemoAuthenticated();
    }

    function shouldUseGuestShell(): bool
    {
        return !shouldUseAppShell();
    }

    function demoAuthUrl(string $value): string
    {
        $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
        $uriParts = parse_url($requestUri);
        $path = $uriParts['path'] ?? '/';

        $queryParams = [];
        if (!empty($uriParts['query'])) {
            parse_str($uriParts['query'], $queryParams);
        }

        $queryParams['demoAuth'] = $value;

        return $path . '?' . http_build_query($queryParams);
    }

    function demoLogin(string $redirectTo = 'dashboard.php'): void
    {
        $_SESSION['demo_authenticated'] = true;
        header('Location: ' . $redirectTo);
        exit;
    }

    function demoLogout(string $redirectTo = 'home.php'): void
    {
        $_SESSION['demo_authenticated'] = false;
        header('Location: ' . $redirectTo);
        exit;
    }

    function demoRequirePostAndLogin(string $redirectTo = 'dashboard.php'): void
    {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
            demoLogin($redirectTo);
        }
    }
}

demoAuthBootstrap();
