<?php
/**
 * Shared helpers. Included by every page via includes/header.php.
 */

define('SITE_NAME', 'Meridian Projects');
define('SITE_TAGLINE', 'Project management, made visible.');

/**
 * Load every project record.
 * @return array[]
 */
function get_all_projects(): array {
  static $projects = null;
  if ($projects === null) {
    $projects = require __DIR__ . '/../data/projects.php';
  }
  return $projects;
}

/**
 * Find one project by its id, or null if it doesn't exist.
 */
function get_project(string $id): ?array {
  foreach (get_all_projects() as $project) {
    if ($project['id'] === $id) {
      return $project;
    }
  }
  return null;
}

/**
 * Zero-padded drawing-style reference number, e.g. PRJ-01.
 */
function project_ref(int $index): string {
  return 'PRJ–' . str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT);
}

/** Escape helper to keep template markup short. */
function h(string $value): string {
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Render a small blueprint-style SVG mark for a project card.
 *
 * `$icon` is a named key that picks a motif matched to the project's
 * subject matter (see ICON_LIBRARY below) — e.g. 'clinical' for a health
 * project, 'dynamics' for a stability/control-systems project. If a key
 * isn't found, it falls back to one of six generic abstract motifs chosen
 * from the old numeric 1–6 scheme, so existing placeholder entries with an
 * integer `accent` keep working untouched.
 *
 * To add a new themed icon: add a case to ICON_LIBRARY below, then set
 * 'accent' => 'your-new-key' on the matching project in data/projects.php.
 */
function render_project_mark($icon, string $seed = '', int $size = 64): string {
  $n = 0;
  foreach (str_split($seed) as $ch) {
    $n += ord($ch);
  }
  $o1 = $n % 9;
  $o2 = ($n * 3) % 7;
  $vb = 64;

  $library = [
    // Health / clinical / predictive-risk projects.
    'clinical' => '<path d="M6 34 H20 L26 18 L34 48 L40 28 L46 34 H58" />
      <circle cx="46" cy="34" r="2.4" fill="currentColor" stroke="none" />',

    // Survivorship, lifestyle & wellbeing platforms (patient-facing, ongoing
    // care rather than acute/diagnostic — kept visually distinct from 'clinical').
    'wellbeing' => '<path d="M32 48 C14 36 8 22 18 14 C25 9 32 15 32 15 C32 15 39 9 46 14 C56 22 50 36 32 48 Z" />
      <path d="M23 27 L29 33 L42 20" />',
	  
	  // Children's / education / block-based learning platforms.
	  'learn' => '<rect x="8" y="30" width="20" height="16" rx="2" />
	    <rect x="34" y="8" width="20" height="16" rx="2" />
		  <path d="M28 38 H34 V16" />
		  <path d="M48 30 V38" /><path d="M44 34 H52" />',
		
	  // Academic administration / student–supervisor workflow platforms.
	  'academic' => '<path d="M32 10 L58 22 L32 34 L6 22 Z" />
		  <path d="M14 24 V32 C14 36 22 40 32 40 C42 40 50 36 50 32 V24" stroke-opacity="0.5" />
		  <path d="M32 34 V44" />
		  <circle cx="32" cy="47" r="2.2" fill="currentColor" stroke="none" />',
		
	  // Lost-and-found / campus item registry & search platforms.
	  'lostfound' => '<rect x="14" y="26" width="20" height="16" rx="2" />
		  <path d="M20 26 V20 C20 17 22 15 24 15 C26 15 28 17 28 20 V26" />
		  <circle cx="42" cy="36" r="9" />
		  <path d="M48.5 42.5 L56 50" />',
		
	  // Scholarship / grant / award & recognition programs.
	  'award' => '<circle cx="32" cy="24" r="14" />
		  <circle cx="32" cy="24" r="3" fill="currentColor" stroke="none" />
		  <path d="M23 36 L16 54 L32 45 L48 54 L41 36" />',

    // Mathematics, dynamical systems, control & stability projects.
    'dynamics' => '<path d="M32 32 C 32 20, 20 20, 20 30 C 20 42, 40 42, 40 28 C 40 16, 26 14, 22 22" />
      <circle cx="32" cy="32" r="2.6" fill="currentColor" stroke="none" />
      <circle cx="22" cy="22" r="2.2" fill="currentColor" stroke="none" />
      <path d="M10 52 H54" stroke-opacity="0.4" />',

    // Software / product / app delivery projects.
    'software' => '<rect x="12" y="10" width="40" height="28" rx="1" />
      <path d="M12 18 H52" />
      <circle cx="17" cy="14" r="1.4" fill="currentColor" stroke="none" />
      <path d="M20 46 H44" />
      <path d="M28 38 V46" /><path d="M36 38 V46" />',

    // Construction / physical build projects.
    'construction' => '<path d="M10 54 V26 L32 10 L54 26 V54" />
      <path d="M22 54 V36 H42 V54" />',

    // Data / systems migration projects.
    'migration' => '<rect x="8" y="14" width="18" height="14" />
      <rect x="38" y="36" width="18" height="14" />
      <path d="M26 21 H38" />
      <path d="M17 28 V38 H38" />
      <circle cx="38" cy="38" r="2" fill="currentColor" stroke="none" />',

    // Logistics / supply chain / network projects.
    'network' => '<circle cx="14" cy="32" r="4" />
      <circle cx="50" cy="14" r="4" />
      <circle cx="50" cy="50" r="4" />
      <path d="M18 32 L46 15" /><path d="M18 32 L46 49" />',

    // Events, exhibits, campaigns, launches.
    'launch' => '<path d="M32 8 L44 44 L32 36 L20 44 Z" />
      <path d="M26 44 L22 54" /><path d="M38 44 L42 54" />',

    // Compliance, governance, risk & safety projects.
    'compliance' => '<path d="M32 8 L54 16 V32 C54 46 44 54 32 58 C20 54 10 46 10 32 V16 Z" />
      <path d="M23 32 L30 39 L42 24" />',

    // Internal operations / process redesign projects.
    'process' => '<circle cx="32" cy="32" r="20" />
      <path d="M32 12 V20" /><path d="M32 44 V52" />
      <path d="M12 32 H20" /><path d="M44 32 H52" />
      <circle cx="32" cy="32" r="4" fill="currentColor" stroke="none" />',
  ];

  if (is_string($icon) && isset($library[$icon])) {
    return '<svg class="mark" width="' . $size . '" height="' . $size . '" viewBox="0 0 ' . $vb . ' ' . $vb . '" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">' . $library[$icon] . '</svg>';
  }

  // Fallback: generic numbered motifs, unchanged, for any project that
  // hasn't been given a themed key yet.
  switch (((int) $icon) % 6) {
    case 1:
      $inner = '<circle cx="' . (20 + $o1) . '" cy="20" r="12" />
        <circle cx="44" cy="' . (44 - $o2) . '" r="6" />
        <path d="M28 28 L40 40" />
        <path d="M8 50 H24" />
        <path d="M40 8 H56" />';
      break;
    case 2:
      $inner = '<path d="M8 ' . (44 + $o1 - 4) . ' L24 20 L40 36 L56 12" />
        <circle cx="24" cy="20" r="3" />
        <circle cx="40" cy="36" r="3" />
        <circle cx="8" cy="' . (44 + $o1 - 4) . '" r="3" />
        <circle cx="56" cy="12" r="3" />';
      break;
    case 3:
      $inner = '<rect x="10" y="10" width="' . (28 + $o1) . '" height="20" rx="0" />
        <rect x="' . (18 + $o2) . '" y="36" width="26" height="18" rx="0" />
        <path d="M24 30 V36" />';
      break;
    case 4:
      $inner = '<path d="M8 32 H56" />
        <path d="M16 32 V16 H32" />
        <path d="M40 32 V48 H24" />
        <circle cx="32" cy="16" r="3" />
        <circle cx="24" cy="48" r="3" />';
      break;
    case 5:
      $inner = '<path d="M12 ' . (12 + $o1) . ' L52 12 L52 ' . (52 - $o2) . ' L12 52 Z" />
        <path d="M12 32 H52" />
        <path d="M32 12 V52" />';
      break;
    default:
      $inner = '<path d="M32 8 V24" />
        <path d="M32 40 V56" />
        <circle cx="32" cy="32" r="8" />
        <path d="M12 ' . (18 + $o1) . ' L20 26" />
        <path d="M52 ' . (46 - $o2) . ' L44 38" />';
  }

  return '<svg class="mark" width="' . $size . '" height="' . $size . '" viewBox="0 0 ' . $vb . ' ' . $vb . '" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">' . $inner . '</svg>';
}
