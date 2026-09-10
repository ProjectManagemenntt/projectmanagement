<?php
require_once __DIR__ . '/includes/functions.php';
$page_title = SITE_NAME . ' — ' . SITE_TAGLINE;
$current_nav = 'work';
require __DIR__ . '/includes/header.php';

$projects = get_all_projects();
$project_count = count($projects);
$sector_count = count(array_unique(array_column($projects, 'sector')));
?>

<main>

  <section class="hero">
    <div class="container">
      <div class="hero-copy">
        <span class="ref">Manage Project</span>
        <h1>Several projects, planned in the open.</h1>
        <p class="lede">This is a working record of project management practice, how each engagement was scoped, sequenced, and delivered. Every project below has a live, interactive version you can step through yourself.</p>
        <div class="hero-actions">
          <a href="#work" class="btn btn-primary">Browse the work</a>
          <a href="#approach" class="btn btn-ghost">How these run</a>
        </div>
        <div class="hero-stats">
          <div>
            <span class="stat-num"><?= (int) $project_count ?></span>
            <span class="stat-label">Delivered projects</span>
          </div>
          <div>
            <span class="stat-num"><?= (int) $sector_count ?></span>
            <span class="stat-label">Sectors covered</span>
          </div>
          <div>
            <span class="stat-num">0</span>
            <span class="stat-label">Missed hard deadlines</span>
          </div>
        </div>
      </div>
      <div class="hero-diagram corner-frame" aria-hidden="true">
        <svg viewBox="0 0 200 200" fill="none" stroke="#2f5cf6" stroke-width="1.4">
          <circle cx="100" cy="100" r="70" stroke-opacity="0.35"/>
          <circle cx="100" cy="100" r="45" stroke-opacity="0.55"/>
          <path d="M100 30 V170 M30 100 H170" stroke-opacity="0.25"/>
          <circle cx="100" cy="30" r="4" fill="#2f5cf6" stroke="none"/>
          <circle cx="150" cy="60" r="4" fill="#2f5cf6" stroke="none"/>
          <circle cx="60" cy="145" r="4" fill="#2f5cf6" stroke="none"/>
          <path d="M100 30 L150 60 L120 120 L60 145" stroke-width="1.6"/>
        </svg>
      </div>
    </div>
  </section>

  <section class="section" id="approach">
    <div class="container">
      <div class="section-head">
        <div>
          <span class="ref">Method</span>
          <h2>The same three moves, on every project.</h2>
        </div>
        <p class="section-note">Industries change. Team sizes change. The sequence that keeps a project on schedule doesn't.</p>
      </div>
      <div class="pillars">
        <div class="pillar">
          <span class="ref">01 — Plan</span>
          <h3>Find the real constraint</h3>
          <p>Every project has one thing that actually limits the schedule; a permit, a vendor, a hard date. Planning starts by naming it, not by building a generic timeline.</p>
        </div>
        <div class="pillar">
          <span class="ref">02 — Run</span>
          <h3>Make status visible</h3>
          <p>Delays are cheap to fix early and expensive to fix late. A shared, honest view of status is what makes early fixes possible.</p>
        </div>
        <div class="pillar">
          <span class="ref">03 — Close</span>
          <h3>Hand off cleanly</h3>
          <p>A project isn't done when it ships, it's done when the people running it day-to-day don't need the project manager anymore.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-alt" id="work">
    <div class="container">
      <div class="section-head">
        <div>
          <span class="ref">Selected work</span>
          <h2>Projects delivered</h2>
        </div>
        <p class="section-note">Each card links through to a short case-study and a live, interactive version of the project. Explore each project tool feed it real data from your case project, and use the output in your report and decision making.</p>
      </div>
      <div class="project-grid">
        <?php foreach ($projects as $i => $project): ?>
          <a class="project-card" href="project.php?id=<?= urlencode($project['id']) ?>">
            <div class="project-card-top">
              <?= render_project_mark($project['accent'], $project['id']) ?>
              <span class="card-ref"><?= h(project_ref($i)) ?></span>
            </div>
            <span class="category"><?= h($project['category']) ?></span>
            <h3><?= h($project['title']) ?></h3>
            <p class="summary"><?= h($project['summary']) ?></p>
            <div class="card-foot">
              <span><?= h($project['sector']) ?></span>
              <span class="view-link">View project</span>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section" id="about">
    <div class="container">
      <div class="about-grid">
        <div>
          <span class="ref">About</span>
          <h2>Project management as a craft, not just a job title.</h2>
          <p>The idea behind this dedicated visibility is simple: instead of describing project management in the abstract, 
		  show it, project by project, with enough detail that anyone can see how the work was actually done.</p>
          <p>Every case study on this site follows the same shape: what the project was, what made it hard, 
		  how it was run, and what happened as a result. Replace the sixteen placeholders with real engagements when they're ready.</p>
		  <p>Project Management as a course in higer institutions introduces the principles and tools of project management across the initiating, 
		  planning, executing, monitoring, and closing process groups. Also, students learn to scope, schedule, budget, 
		  and de-risk projects using both predictive (waterfall) and adaptive (agile) approaches, aligned broadly with PMBOK and common agile frameworks.</p>
        </div>
        <ul class="about-list">
          <li><span class="label">Focus</span><span class="value">Delivery &amp; program management</span></li>
          <li><span class="label">Typical engagement</span><span class="value">4–18 months</span></li>
          <li><span class="label">Sectors</span><span class="value">Retail, healthcare, public sector, tech &amp; more</span></li>
          <li><span class="label">Based in</span><span class="value">Available for remote &amp; on-site work</span></li>
        </ul>
      </div>
    </div>
  </section>

  <section class="section section-alt" id="contact">
    <div class="container">
      <div class="contact-panel corner-frame">
        <span class="ref">Get in touch</span>
        <h2>Have a project that needs a plan?</h2>
        <p>Send an email to Dr. T.O Omodunbi (Project Coordinator).</p>
        <p><a class="btn btn-primary" href="mailto:tessydunbi@oauife.edu.ng">tessydunbi@oauife.edu.ng</a></p>
      </div>
    </div>
  </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
