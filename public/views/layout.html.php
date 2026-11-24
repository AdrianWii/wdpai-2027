<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= htmlspecialchars($pageTitle ?? 'Aplikacja', ENT_QUOTES, 'UTF-8') ?>
    </title>

    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' rx='16' fill='%23167b83'/%3E%3Cpath d='M20 17h17c8 0 13 5 13 12s-5 12-13 12h-7v9H20V17zm10 8v8h7c2 0 4-1 4-4s-2-4-4-4h-7z' fill='white'/%3E%3C/svg%3E">
    <?php foreach ($stylesheets ?? [] as $stylesheet): ?>
        <link rel="stylesheet" href="<?= htmlspecialchars($stylesheet, ENT_QUOTES, 'UTF-8') ?>">
    <?php endforeach; ?>
    <script src="/js/theme.js" defer></script>
</head>
<body>
    <button
        class="theme-toggle"
        type="button"
        aria-label="Włącz ciemny motyw"
        aria-pressed="false"
        title="Zmień motyw"
    >
        <span class="theme-toggle__icon" aria-hidden="true">☾</span>
    </button>

    <?= $content ?>
</body>
</html>
