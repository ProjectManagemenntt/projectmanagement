/**
 * Roll-in reveal animation.
 * Any element with class="reveal" starts hidden/tipped back (see
 * assets/css/style.css). As soon as it scrolls into view, this adds
 * "is-visible", which triggers the CSS transition into place.
 *
 * Stagger a group of reveals (e.g. a grid of cards) by adding an inline
 * `style="transition-delay: 90ms"` to each item in the PHP template —
 * this script only handles the visibility trigger, not timing.
 */
(function () {
  if (typeof window === 'undefined') return;

  var targets = document.querySelectorAll('.reveal');
  if (!targets.length) return;

  if (!('IntersectionObserver' in window)) {
    // No IntersectionObserver support: show everything immediately rather
    // than leaving content permanently hidden.
    targets.forEach(function (el) { el.classList.add('is-visible'); });
    return;
  }

  var observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.15, rootMargin: '0px 0px -40px 0px' }
  );

  targets.forEach(function (el) { observer.observe(el); });
})();
