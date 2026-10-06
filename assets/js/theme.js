/**
 * Yasmina theme behaviour.
 *
 * - Back-to-top button with show/hide and smooth scrolling.
 * - Subtle scroll reveal for elements marked with [data-reveal].
 *
 * Everything is guarded by the prefers-reduced-motion media query,
 * and reveal styles are only applied when JavaScript runs, so the
 * site remains fully readable with JavaScript disabled.
 */
(function () {
	'use strict';

	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	/* ---------- Back to top ---------- */

	var button = document.createElement('button');
	button.className = 'yasmina-back-to-top';
	button.setAttribute('type', 'button');
	button.setAttribute('aria-label', 'Back to top');
	button.innerHTML =
		'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' +
		'<line x1="12" y1="19" x2="12" y2="5"/>' +
		'<polyline points="5 12 12 5 19 12"/>' +
		'</svg>';

	document.body.appendChild(button);

	function toggleButton() {
		var show = window.scrollY > 600;
		button.classList.toggle('is-visible', show);
	}

	window.addEventListener('scroll', toggleButton, { passive: true });
	toggleButton();

	button.addEventListener('click', function () {
		if (reduceMotion) {
			window.scrollTo(0, 0);
		} else {
			window.scrollTo({ top: 0, behavior: 'smooth' });
		}
	});

	/* ---------- Scroll reveal ---------- */

	var revealElements = document.querySelectorAll('[data-reveal]');

	if (reduceMotion || !('IntersectionObserver' in window) || !revealElements.length) {
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
		{ threshold: 0.12 }
	);

	revealElements.forEach(function (element) {
		element.classList.add('yasmina-reveal');
		observer.observe(element);
	});
})();
