<?php
/**
 * Shared header. Expects (optionally) $page_title and $current_nav to be
 * set by the including page before this file is required.
 */
require_once __DIR__ . '/functions.php';

$page_title = $page_title ?? SITE_NAME;
$current_nav = $current_nav ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= h($page_title) ?></title>
<meta name="description" content="<?= h(SITE_TAGLINE) ?> A portfolio of delivered projects, each with a live interactive project you can explore.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="site-header">
  <div class="container">
    <a href="index.php" class="logo">
      <svg class="logo-mark" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M4 20 L4 12 L12 4 L20 12 L20 20" />
        <path d="M9 20 V14 H15 V20" />
      </svg>
      <?= h(SITE_NAME) ?>
    </a>
    <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="main-nav" onclick="var n=document.getElementById('main-nav');var open=n.classList.toggle('open');this.setAttribute('aria-expanded', open ? 'true' : 'false');">
      <span class="visually-hidden">Menu</span>
      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M2 5h14M2 9h14M2 13h14"/></svg>
    </button>
    <nav class="main-nav" id="main-nav" aria-label="Primary">
      <ul>
        <li><a href="index.php#work" <?= $current_nav === 'work' ? 'aria-current="page"' : '' ?>>Work</a></li>
        <li><a href="index.php#approach" <?= $current_nav === 'approach' ? 'aria-current="page"' : '' ?>>Approach</a></li>
        <li><a href="index.php#about" <?= $current_nav === 'about' ? 'aria-current="page"' : '' ?>>About</a></li>
        <li><a href="index.php#contact" <?= $current_nav === 'contact' ? 'aria-current="page"' : '' ?>>Contact</a></li>
      </ul>
    </nav>
  </div>
</header>
