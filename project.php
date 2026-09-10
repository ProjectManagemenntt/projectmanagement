<?php
require_once __DIR__ . '/includes/functions.php';

$all_projects = get_all_projects();
$id = isset($_GET['id']) ? (string) $_GET['id'] : '';
$project = $id !== '' ? get_project($id) : null;
$index = null;
if ($project) {
  foreach ($all_projects as $i => $p) {
    if ($p['id'] === $id) { $index = $i; break; }
  }
}

$page_title = $project ? $project['title'] . ' — ' . SITE_NAME : 'Project not found — ' . SITE_NAME;
$current_nav = 'work';
require __DIR__ . '/includes/header.php';
?>

<main>

<?php if (!$project): ?>

  <section class="section not-found">
    <div class="container">
      <span class="ref">404 — Not found</span>
      <h1>That project doesn't exist yet.</h1>
      <p>The project you're looking for isn't in our archive. It may have been renamed or removed.</p>
      <a class="btn btn-primary" href="index.php#work">Back to all projects</a>
    </div>
  </section>

<?php else: ?>

  <section class="project-hero">
    <?= render_hero_background($project) ?>
    <div class="container">
      <p class="breadcrumb"><a href="index.php">Work</a> / <?= h($project['title']) ?></p>
      <div class="project-hero-top">
        <div class="reveal">
          <span class="category"><?= h($project['category']) ?></span>
          <h1><?= h($project['title']) ?></h1>
          <div class="tag-list">
            <?php foreach ($project['tags'] as $tag): ?>
              <span class="tag"><?= h($tag) ?></span>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="reveal" style="transition-delay: 120ms">
          <?= render_project_mark($project['accent'], $project['id'], 80) ?>
        </div>
      </div>
      <div class="meta-row reveal" style="transition-delay: 200ms">
        <div>
          <span class="meta-label">Reference</span>
          <span class="meta-value"><?= h(project_ref($index)) ?></span>
        </div>
        <div>
          <span class="meta-label">Duration</span>
          <span class="meta-value"><?= h($project['duration']) ?></span>
        </div>
        <div>
          <span class="meta-label">Sector</span>
          <span class="meta-value"><?= h($project['sector']) ?></span>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="project-body">
        <div class="project-copy reveal">
          <span class="ref">Overview</span>
          <h2>What this project was</h2>
          <p><?= h($project['overview']) ?></p>

          <span class="ref">The challenge</span>
          <h2>What made it hard</h2>
          <p><?= h($project['challenge']) ?></p>

          <span class="ref">The approach</span>
          <h2>How it was run</h2>
          <p><?= h($project['approach']) ?></p>

          <span class="ref">The outcome</span>
          <h2>What happened</h2>
          <p><?= h($project['outcome']) ?></p>
        </div>

        <aside class="live-panel corner-frame reveal" style="transition-delay: 140ms">
          <h3>Live interactive project</h3>
          <p class="status-line"><span class="status-dot" aria-hidden="true"></span>Available to explore</p>
          <p>Step through the actual tools and views used to run this project — timelines, boards, and status reporting, exactly as built.</p>
          <a class="btn btn-primary btn-block" href="<?= h($project['live_url']) ?>" target="_blank" rel="noopener">Launch live project</a>
        </aside>
      </div>
    </div>
  </section>

  <?php
    // Pick up to three other projects to surface underneath this one.
    $related = array_values(array_filter($all_projects, fn($p) => $p['id'] !== $project['id']));
    shuffle($related);
    $related = array_slice($related, 0, 3);
  ?>
  <section class="section section-alt">
    <div class="container">
      <div class="section-head reveal">
        <div>
          <span class="ref">More work</span>
          <h2>Other projects</h2>
        </div>
        <a href="index.php#work">View all projects →</a>
      </div>
      <div class="related-grid">
        <?php foreach ($related as $ri => $rp):
          $rp_index = array_search($rp['id'], array_column($all_projects, 'id'), true);
        ?>
          <a class="project-card reveal" style="transition-delay: <?= (int) ($ri * 100) ?>ms" href="project.php?id=<?= urlencode($rp['id']) ?>">
            <div class="project-card-top">
              <?= render_project_mark($rp['accent'], $rp['id']) ?>
              <span class="card-ref"><?= h(project_ref($rp_index)) ?></span>
            </div>
            <span class="category"><?= h($rp['category']) ?></span>
            <h3><?= h($rp['title']) ?></h3>
            <p class="summary"><?= h($rp['summary']) ?></p>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

<?php endif; ?>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
