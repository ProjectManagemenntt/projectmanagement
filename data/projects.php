<?php
/**
 * Project data store.
 *
 * This is placeholder/dummy content. Replace each entry with real project
 * details when they're ready. To add or remove a project, add or remove
 * an array entry below — every page on the site reads from this file, so
 * nothing else needs to change.
 *
 * Fields:
 *   id          - unique slug, used in the URL: project.php?id=xxxx
 *   title       - project name
 *   category    - short category tag shown on cards and the project page
 *   duration    - dummy timeframe, e.g. "14 weeks"
 *   sector      - dummy industry/sector label
 *   summary     - one sentence shown on the project card
 *   overview    - short paragraph: what the project is
 *   challenge   - short paragraph: the problem going in
 *   approach    - short paragraph: how it was run
 *   outcome     - short paragraph: what changed as a result
 *   tags        - array of short skill/method tags
 *   live_url    - link to the live interactive project (placeholder for now)
 *   accent      - which motif variant to draw for the project's mark (1-6)
 */

return [
  [
  // group 1
    'id' => 'campus-lost-and-found',
    'title' => 'Campus Lost & Found',
    'category' => 'Campus operations',
    'duration' => '4 weeks',
    'sector' => 'Education (higher ed)',
    'summary' => 'A searchable, verified registry of items found on campus, so a lost ID or backpack doesn\'t just disappear into a drawer.',
    'overview' => 'Campus Lost & Found is a web platform that lets a university community search, report, and track lost items in one place, built for Obafemi Awolowo University. Every item listed has been physically checked in by Security or the Dean of Students\' Affairs (DSA) office before it appears, and each entry records what was found, where, when, and its current status — so a search is a search against verified holdings, not a hopeful noticeboard.',
    'challenge' => 'Campus lost-and-found processes are usually just a box in a security office: no searchable record, no way to check from off-site whether your item has turned up, and no notification when it does. Students lose time walking between offices on the chance an item was handed in, and items sit unclaimed simply because there\'s no way to connect a found item to the person looking for it.',
    'approach' => 'The system centers on a verified item registry: staff at Security or DSA check items in with a category, description, and found location, and those listings become searchable and filterable by category (bags, IDs, keys, electronics, documents, and more) for any verified campus member. Reporting a missing item, tracking your own activity, and getting notified when a match appears are built as their own dedicated flows, so a student doesn\'t have to keep re-checking the list manually.',
    'outcome' => 'The result is a lost-and-found process a student can resolve from their phone — searching and filtering verified listings, reporting what they\'ve lost, and getting notified on a match — instead of physically checking multiple offices on the chance something turned up.',
    'tags' => ['Campus services', 'Verified registry', 'Search & notifications'],
    'live_url' => 'https://lostandfound-project.netlify.app/',
    'accent' => 'lostfound',
  ],
  [
   // group 2
    'id' => 'cancer-treatment-response',
    'title' => 'Cancer Treatment Response & Completion Predictor',
    'category' => 'Clinical decision support',
    'duration' => '6 months',
    'sector' => 'Healthcare',
    'summary' => 'Giving oncology teams an early read on treatment completion and response risk, built from clinical and socio-demographic data.',
    'overview' => 'OncoPredict is a decision-support tool that generates two linked predictions for a patient starting cancer treatment: the likelihood they\'ll complete the prescribed treatment cycle, and the likelihood of a positive clinical response. It combines tumour and treatment data (cancer type, stage, metastasis status, genetic mutation, regimen, dosage, cycles completed) with socio-demographic and support-context data (location, distance from hospital, financial status, prior treatment history, comorbidities) to route both a clinical prediction and a supportive-care recommendation from the same intake form.',
    'challenge' => 'Treatment non-completion and poor response are often driven by different things — clinical factors on one side, practical and financial barriers on the other — but most tools only model the clinical side. The team also had to keep a strict line between fields used for prediction and fields used only for context or support routing, so that variables like overall survival (recorded for context) didn\'t leak into a model meant to run before an outcome is known.',
    'approach' => 'The prediction engine is a Random Forest model trained on the clinical and tumour/treatment fields. Socio-demographic and support-context fields (location, religion, distance from hospital, financial status, prior treatment record) are deliberately excluded from the model itself and instead feed a separate rules layer that generates decision-support recommendations — for example, flagging a patient for a financial counsellor when financial status is low-income, or flagging adherence monitoring when completion risk is moderate or higher. Every prediction ships with the model\'s confidence framed explicitly as decision support, not a standalone treatment decision.',
    'outcome' => 'Clinicians get, in one screen: a treatment-completion likelihood, a treatment-response likelihood, a breakdown across four tumour-response categories (progressive/stable/partial/complete), and a short list of concrete next actions tied to that specific patient\'s risk factors — turning a data-entry form into a triage step rather than a report to read later.',
    'tags' => ['Predictive modeling', 'Clinical decision support', 'Data governance'],
    'live_url' => 'https://onco-predict-one.vercel.app/',
    'accent' => 'clinical',
  ],
  [
   // group 3
    'id' => 'fill-in-the-gap-exam',
    'title' => 'GAP Examination Portal',
    'category' => 'EdTech / Computer-based Assessment',
    'duration' => '6 months',
    'sector' => 'Education (higher ed)',
    'summary' => 'A computer-based exam system built specifically for fill-in-the-gap questions, with full academic-hierarchy setup on the admin side.',
    'overview' => 'GAP Exam is a computer-based examination platform purpose-built for fill-in-the-gap question formats, rather than adapting a generic multiple-choice exam tool to the format. Students see only the exams they\'re eligible for and enter a timed exam room to attempt them; administrators configure the full academic structure behind that — faculties, departments, courses, lecturers, students, and course assignments — so exam eligibility reflects real enrollment rather than a manually maintained list.',
    'challenge' => 'Fill-in-the-gap questions raise a marking problem multiple-choice doesn\'t have: a correct answer can be typed in more than one valid way (spelling variants, spacing, near-misses), so a naive exact-match grader either marks correct answers wrong or has to be graded by hand at scale. The admin side also had to model a real academic hierarchy — faculties down to individual course assignments — so that "which exams is this student eligible for" is a byproduct of enrollment data, not a separate manual step.',
    'approach' => 'Each exam carries its own tolerance setting — a non-strict mode that accounts for minor spelling variation — configurable per exam rather than fixed system-wide, alongside standard controls like duration and open/active status. On the admin side, the academic structure was modeled as a proper hierarchy (faculties → departments → courses → lecturers → students → course assignments), with bulk student account import, so eligibility and rostering scale without manual per-student setup.',
    'outcome' => 'Students get a focused exam room experience — see what you\'re eligible for, attempt it within the time limit, done — while administrators manage the entire academic structure and exam configuration, including answer-tolerance rules, from one control center.',
    'tags' => ['Computer-based testing', 'Academic hierarchy modeling', 'Automated grading'],
    'live_url' => 'https://fillgap.vercel.app',
    'accent' => 'exam',
  ],
  [
   // group 4
    'id' => 'lumen-brand-launch',
    'title' => 'Lumen Product Launch Campaign',
    'category' => 'Marketing operations',
    'duration' => '13 weeks',
    'sector' => 'Consumer goods',
    'summary' => 'Aligning nine agencies and three internal teams around one launch date.',
    'overview' => 'Cross-functional coordination of a multi-market product launch spanning creative, media buying, retail packaging, and PR.',
    'challenge' => 'Nine external agencies and three internal teams each held a piece of the launch, with no single owner of the overall timeline.',
    'approach' => 'A single master timeline replaced each team\'s separate tracker, with named owners for every handoff point and a weekly cross-agency checkpoint.',
    'outcome' => 'The launch shipped on the original date across all six markets, and the shared timeline was adopted as the template for the following two launches.',
    'tags' => ['Cross-team coordination', 'Timeline design', 'Vendor management'],
    'live_url' => '#',
    'accent' => 4,
  ],
  [
   // group 5
    'id' => 'academic-resource-repository',
    'title' => 'PastQHub - Academic Resource Repository',
    'category' => 'EdTech / Academic Resource Repository',
    'duration' => '5 months',
    'sector' => 'Education (higher ed)',
    'summary' => 'A searchable, verified library of past exam papers and worked solutions for science courses, with quizzes and a discussion forum built around it.',
    'overview' => 'Design and Implementation of a Past Questions and Solution Repository System for Science-Based Courses (PastQHub). PastQ Hub is a repository of past examination papers and their solutions for science-based courses, organized so a student can browse by department, session, and course rather than hunting through scattered PDFs and old group-chat uploads. Each paper is broken down into individual questions, tagged by topic, and marked as verified once checked — with a quiz mode, bookmarking, a discussion forum, and topic-trend analytics built on top of the same underlying question bank.',
    'challenge' => 'Past exam papers are usually the most-requested and least-organized resource in a department — copies circulate informally, solutions (when they exist at all) are unverified, and there\'s no way to tell which topics actually get examined repeatedly versus which paper someone happened to keep. A useful repository needed both trustworthy content (verified papers and solutions) and structure (searchable by course, session, and topic) to be worth more than a shared folder.',
    'approach' => 'Every paper is entered into the system broken down question-by-question and tagged by topic, so the platform can show not just "here\'s a paper" but "here\'s how often each topic actually appears across papers" — turning a static archive into something students can study strategically from. A verification flag distinguishes lecturer-checked papers from unreviewed uploads, and quiz mode, bookmarking, and a forum give students ways to actively use the material rather than just read it.',
    'outcome' => 'Students get a single, filterable library of verified past papers with topic-level breakdowns showing what\'s actually likely to be examined, plus a forum and quiz mode to study the material actively rather than passively reading through old papers.',
    'tags' => ['Academic resource repository', 'Content verification', 'Topic analytics'],
    'live_url' => 'https://past-q-hub-ochre.vercel.app/',
    'accent' => 'repository',
  ],
  [
   // group 6
    'id' => 'lifestyle-recommendation',
    'title' => 'lifestyle Recommendation For Colorectal Cancer (CRC) Survivors',
    'category' => 'Health & lifestyle decision support',
    'duration' => '5 months',
    'sector' => 'Healthcare',
    'summary' => 'A daily check-in platform that turns a Colorectal Cancer(CRC) survivor\'s routine into a personalized lifestyle plan their care team can review.',
    'overview' => 'Development of a Lifestyle Recommendation System For Colorectal Cancer (CRC) Survivors (Colocare Platform). ColoCare is a patient-facing platform for colorectal cancer survivors, built around a daily check-in that feeds a personalized lifestyle plan across three areas — hydration, movement, and rest & stress. Each recommendation is written as a manageable daily action rather than a clinical instruction, and every category explicitly points the patient back to their oncology team for anything that changes or persists. The platform tracks weekly consistency (days logged, actions completed) so a starter plan can sharpen into a fuller picture as check-in data builds up.',
    'challenge' => 'Lifestyle guidance for cancer survivors is usually handed out once, in a leaflet, at discharge — with no mechanism to adapt it to how someone is actually doing week to week, and no easy way for a care team to see adherence between appointments. The platform also had to walk a careful line: giving genuinely useful, personalized guidance without ever reading as a substitute for clinical advice, especially given how much individual variation there is in post-treatment recovery.',
    'approach' => 'The system is organized around a simple daily loop: a check-in calendar captures how the day went, a personalized plan translates that into a small number of concrete actions (e.g. building fluids into the day, choosing a safe-paced activity, keeping a consistent wind-down routine), and a goals view tracks weekly consistency to reinforce the habit rather than a single perfect day. A resources section gives survivors context on why each recommendation matters, and every single recommendation is paired with an explicit prompt to raise changes with their clinician — decision support for the patient\'s own routine, not a diagnostic or treatment tool.',
    'outcome' => 'Survivors get a plan that starts simple on day one and becomes more personalized as check-ins accumulate, with a weekly view that makes consistency visible rather than abstract — and a consistent, repeated nudge back to the clinical relationship rather than away from it.',
    'tags' => ['Patient engagement', 'Behavioural recommendation', 'Survivorship care'],
    'live_url' => 'https://colocare.jesulonimii.xyz/',
    'accent' => 'wellbeing',
  ],
  [
   // group 7
    'id' => 'lyapunov-function-generator',
    'title' => 'Lyapunov Function Generator for Stability Analysis of Differential Equation Systems',
    'category' => 'Applied mathematics / computation',
    'duration' => '6 months',
    'sector' => 'Mathematics & Engineering',
    'summary' => 'A tool that builds and verifies Lyapunov functions for systems of differential equations, and shows the working, not just the verdict.',
    'overview' => 'Lyapunov Studio takes a system of differential equations, finds its equilibria within a configurable search radius, and constructs a candidate Lyapunov function to determine whether each equilibrium is stable. Where the system is linear (or can be usefully linearized), it solves the matrix equation AᵀP + PA = −I to produce a function valid everywhere; where linearization fails or says nothing useful, it falls back to direct analysis of the nonlinear system itself. Every result comes with a step-by-step derivation panel, not just a stable/unstable label.',
    'challenge' => 'Stability analysis is usually taught and done by hand, and the standard shortcut — linearizing around an equilibrium and checking the eigenvalues — quietly breaks down in exactly the cases students and engineers most need help with: repeated or zero eigenvalues, centres where energy is conserved, and nonlinear terms (like cubic damping or quadratic coupling) that the linearization can\'t see at all. A generator that only handled the textbook linear case would fail on most of the interesting systems.',
	'approach' => 'The system was built around a library of worked cases spanning four tiers of difficulty — linear (damped/undamped oscillators, saddle points), classic nonlinear (damped pendulum, Van der Pol, Duffing), applied models (mass–spring–damper, Lotka–Volterra predator–prey, logistic growth with harvesting, the Lorenz system), and deliberate edge cases (cubic damping, quadratic coupling) chosen specifically because linearization gives no answer or the wrong one. For each, the tool typesets the entered system, locates equilibria, attempts the linear (AᵀP + PA = −I) route first, and switches to a direct Lyapunov-candidate construction when that route is inconclusive — surfacing which method was used and why at each step.',
    'outcome' => 'The result is a generator that handles the full range from a textbook damped oscillator to a three-dimensional Lorenz system at chaotic parameters, correctly identifying centres (stable but non-converging), saddles (no valid positive-definite P exists), and cases where a nonlinear system is stable despite a zero eigenvalue defeating the linear test — with the derivation shown at every step rather than delivered as a black-box verdict.',
    'tags' => ['Dynamical systems', 'Symbolic computation', 'Numerical stability analysis'],
    'live_url' => 'https://lyapunovgenerator.vercel.app',
    'accent' => 'dynamics',
  ],
  [
   // group 8
    'id' => 'kb-foundation',
    'title' => 'KB Foundation',
    'category' => 'Nonprofit / Grants Management',
    'duration' => '3 months',
    'sector' => 'Nonprofit & Education',
    'summary' => 'A management system that runs a scholarship foundation\'s full award cycle — application, review, and donor reporting — in one place.',
    'overview' => 'Design and Implementation of a Foundation Management System for KB Foundation. The KB Foundation Management System runs the full lifecycle of a merit-based scholarship program: applicant registration and profile completion, application submission (academic details, CGPA, personal statement), supporting document upload, committee review, and award notification. It also gives the foundation a public face — mission, impact figures, scholar success stories, and event updates — alongside separate portals for applicants, donors, and members.',
    'challenge' => 'Running a scholarship program at scale on paper or spreadsheets makes it hard to apply merit criteria consistently, easy to lose track of which applicants have submitted which documents, and nearly impossible to give donors clear visibility into where their contributions actually went. As the applicant pool grows past a handful of people, an ad hoc process either slows to a crawl or starts making inconsistent decisions.',
    'approach' => 'The system was built around the four-step process the foundation already used — create account, submit application, upload documents, receive award — turning each into a structured, trackable stage rather than an email exchange. A committee review layer sits between submission and award, and separate donor/member and applicant portals keep each audience looking at the information relevant to them: applicants track their own application status, while donors and members get visibility into program impact.',
    'outcome' => 'The foundation can now run its scholarship cycle — from open application to award notification — through one system, with a public-facing site that reports transparent, aggregate impact figures (total scholars supported, total grants disbursed, partner institutions, graduation rate) rather than requiring a donor to ask.',
    'tags' => ['Nonprofit operations', 'Application workflow', 'Donor transparency'],
    'live_url' => 'https://kb-foundation-system.onrender.com',
    'accent' => 'award',
  ],
  [
   // group 9
    'id' => 'interactive-Learning-Platform',
    'title' => 'Children Interactive Coding Learning Platform',
    'category' => 'EdTech / children\'s education',
    'duration' => '6 months',
    'sector' => 'Education',
    'summary' => 'A block-based coding platform that teaches children sequencing, loops, and conditionals through games and puzzles',
    'overview' => 'Design and Implementation of an Interactive Coding Learning Platform for Children (CodeQuest). CodeQuest is an interactive learning platform that introduces children to core programming concepts — sequencing, loops, conditions — through visual, game-like puzzles rather than written syntax. It\'s built around the same "learn by doing" model used in tools like Scratch: children assemble logic from blocks and see the result immediately, turning abstract programming ideas into something they can play with.',
    'challenge' => 'Programming concepts are abstract by nature, and traditional text-based teaching methods assume a level of reading fluency and abstract reasoning that most children haven\'t developed yet. The platform needed to make ideas like "a loop repeats an action" or "a condition changes what happens next" tangible and rewarding for a young audience, without the frustration of syntax errors getting in the way of the concept.',
    'approach' => 'Core concepts were built as game and puzzle sequences rather than lessons: children snap together visual blocks to build a solution, run it, and see it play out immediately, with mistakes treated as part of the puzzle rather than as errors to debug. The learning progression moves from simple sequencing through to loops and conditionals, each introduced through its own puzzle mechanic rather than a definition.',
    'outcome' => 'The result is a platform where children build working programs through play well before they\'d be ready to write a line of conventional code — with immediate visual feedback replacing the compile-and-debug cycle that usually makes early programming discouraging.',
    'tags' => ['Educational technology', 'Block-based programming', 'Interactive learning'],
    'live_url' => 'https://codequest-learn-platform-frontend.vercel.app/',
    'accent' => 'learn',
  ],
  [
   // group 10
    'id' => 'summit-museum-exhibit',
    'title' => 'Summit Museum Exhibit Opening',
    'category' => 'Events & exhibits',
    'duration' => '6 months',
    'sector' => 'Culture',
    'summary' => 'Landing a touring exhibit, a gala, and a construction crew on one opening date.',
    'overview' => 'Coordination of a touring exhibit installation, a members\' gala, and final gallery construction, all converging on one fixed public opening date.',
    'challenge' => 'The exhibit\'s touring schedule, the gallery\'s construction finish, and the gala\'s catering and guest logistics were managed by three separate teams with no shared calendar.',
    'approach' => 'A single shared calendar became the source of truth for all three teams, with a two-week contingency window built in before the public opening.',
    'outcome' => 'The exhibit opened on its announced date with the contingency window unused, and the gala ran the same evening without incident.',
    'tags' => ['Event coordination', 'Vendor management', 'Contingency planning'],
    'live_url' => '#',
    'accent' => 4,
  ],
  [
   // group 11
    'id' => 'final-year-project-supervision',
    'title' => 'UniManage Portal - Final Year Project Supervision',
    'category' => 'Academic administration',
    'duration' => '4 months',
    'sector' => 'Education (higher ed)',
    'summary' => 'A shared system that tracks a final-year student\'s project, from topic assignment through to submission and supervisor sign-off.',
    'overview' => 'Web Based Final Year Project Supervision Database Management System (UniManage Portal). UniManage Portal is a database-backed platform for managing final-year project supervision in a university department. It gives each student a single dashboard showing their assigned topic, supervisor, chapter submission status, overall progress percentage, and upcoming supervisor meetings — replacing the usual scatter of email threads, paper logs, and spreadsheet trackers that departments tend to run this process on.',
    'challenge' => 'Final-year project supervision typically involves dozens of students, each at a different chapter, each waiting on a different supervisor for feedback, with no shared record of who\'s submitted what or how close anyone actually is to finishing. Students lose track of feedback status; supervisors lose track of who\'s overdue; and progress is usually only visible to the two people directly involved, not to the department managing the process.',
    'approach' => 'The system centers on the student\'s project record as the single source of truth: a topic and supervisor assignment, a submission log per chapter (with clear status — submitted, pending review, reviewed), an aggregate progress percentage, and a meetings feature for scheduling and tracking supervisor check-ins. Quick actions (browse project topics, submit a chapter) keep the two most frequent tasks one click away from the dashboard rather than buried in a menu.',
    'outcome' => 'Students get one place to see exactly where their project stands and what\'s next; supervisors and departments get a shared, structured record of submission and progress status across every student, instead of reconstructing it from email on request.',
    'tags' => ['Database-driven web app', 'Academic workflow', 'Progress tracking'],
    'live_url' => 'https://universityprojectportal.netlify.app/',
    'accent' => 'academic',
  ],
  [
   // group 12
    'id' => 'laboratory-equipment-inventory',
    'title' => 'Ledgerly - Laboratory Equipment Inventory',
    'category' => 'Inventory & Asset Management',
    'duration' => '6 months',
    'sector' => 'Education / Laboratory Operations',
    'summary' => 'A single dashboard tracking every lab equipment unit, consumable, borrow, and maintenance ticket, before small problems become missing equipment.',
    'overview' => 'Development of a Web-Based Laboratory Equipment Inventory and Maintenance Management System (Ledgerly). Ledgerly is an inventory and maintenance management system for laboratory equipment and consumables, giving lab officers and administrators a live register of every unit\'s status — available, borrowed, damaged, or under maintenance — alongside consumable stock levels, borrow/return tracking, and scheduled or reported maintenance work. Role-based views separate what a Lab Officer needs day-to-day from what a System Administrator manages across users and access.',
    'challenge' => 'Lab equipment tends to be tracked, if at all, through sign-out sheets and someone\'s memory — which makes it hard to know at a glance how much is actually available, who has what and when it\'s due back, which consumables are about to run out, and which equipment is quietly sitting broken instead of in use. By the time a shortage or an overdue item becomes visible, it\'s usually already disrupted someone\'s practical session.',
    'approach' => 'The system centers on a live overview that surfaces exactly the numbers that matter operationally — total units, units available now, units borrowed, damaged units, units under maintenance — alongside two specific alert feeds: overdue and upcoming returns (who has what, and when it\'s due), and stock/maintenance alerts (consumables nearing reorder point, equipment scheduled or reported for maintenance). Equipment, consumables, and borrow/return activity are each modeled as their own register, feeding the same dashboard rather than living in separate spreadsheets.',
    'outcome' => 'Lab staff can now see, in one screen, exactly what\'s overdue, what\'s running low, and what\'s broken or scheduled for repair — replacing the sign-out-sheet-and-memory approach with a register that surfaces problems before they become a disrupted lab session.',
    'tags' => ['Inventory management', 'Asset tracking', 'Maintenance scheduling'],
    'live_url' => 'https://ledgerly-eta-steel.vercel.app/',
    'accent' => 'inventory',
  ],
  [
   // group 13
    'id' => 'wren-fitness-launch',
    'title' => 'Wren Fitness App Launch',
    'category' => 'Product delivery',
    'duration' => '6 months',
    'sector' => 'Consumer tech',
    'summary' => 'Bringing a founding team\'s idea to a public app store launch in two quarters.',
    'overview' => 'Delivery management for a fitness tracking app\'s build, from early prototype through to a public app store launch.',
    'challenge' => 'A small founding team had strong opinions on scope but limited experience shipping a full product cycle, leading to frequent scope changes.',
    'approach' => 'A fixed launch date was set early, and every new scope request was weighed against that date in a weekly prioritization session with the founders.',
    'outcome' => 'The app launched on the original target date with a smaller, sharper feature set than first proposed, and positive early app store reviews.',
    'tags' => ['Scope management', 'Prioritization', 'Launch planning'],
    'live_url' => '#',
    'accent' => 1,
  ],
];
