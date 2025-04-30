console.log('animations.js started');

document.addEventListener('DOMContentLoaded', () => {
  // ==============================
  // scroll-float and fade-in logic
  // ==============================
  const floatingEls = document.querySelectorAll('.scroll-float');
  const fadeEls = document.querySelectorAll('.fade-in-on-scroll');

  function easingWithPause(x) {
    x = Math.min(Math.max(x, 0), 1);
    if (x < 0.4) {
      return x * 2.5;
    } else if (x < 0.6) {
      return 1;
    } else {
      return 1 + (x - 0.6) * 2.5;
    }
  }

  function updateFloatPositions() {
    const viewportHeight = window.innerHeight;
    const scrollY = window.scrollY;

    floatingEls.forEach(el => {
      const rect = el.getBoundingClientRect();
      const speed = parseFloat(el.dataset.speed) || 0;
      const elOffset = rect.top + scrollY;
      const distanceFromTop = scrollY + viewportHeight - elOffset;
      const normalizedScroll = Math.min(Math.max(distanceFromTop / (viewportHeight * 1.5), 0), 1);
      const eased = easingWithPause(normalizedScroll);
      let floatAmount = eased * speed * 500;

      if (el.classList.contains('lock-after')) {
        if (!el.classList.contains('locked') && normalizedScroll >= 1) {
          el.classList.add('locked');
          el.style.transform = 'none';
        } else if (!el.classList.contains('locked')) {
          el.style.transform = `translateY(${floatAmount}px)`;
        }
      } else {
        el.style.transform = `translateY(${floatAmount}px)`;
      }
    });

    fadeEls.forEach(el => {
      const rect = el.getBoundingClientRect();
      const elTop = rect.top;
      const elBottom = rect.bottom;
      const centerY = window.innerHeight / 2;

      const isCentered = elTop <= centerY && elBottom >= centerY;

      if (isCentered && !el.classList.contains('visible')) {
        el.classList.add('visible');
      }

      if (el.getBoundingClientRect().top + window.scrollY < scrollY) {
        el.classList.add('done');
      }
    });

    requestAnimationFrame(updateFloatPositions);
  }

  requestAnimationFrame(updateFloatPositions);

  // ==============================
  // revealLines logic (for split-line fade fill)
  // ==============================
  function revealLines() {
    const lines = document.querySelectorAll('.split-line');

    lines.forEach((line, index) => {
      const rect = line.getBoundingClientRect();
      const windowHeight = window.innerHeight;

      const progress = 1 - Math.min(Math.max((rect.top + rect.height / 2) / windowHeight, 0), 1);
      const delayOffset = index * 0.4;
      const speedMultiplier = 1.4;

      const rawAdjusted = (progress * speedMultiplier) - delayOffset;
      const clamped = Math.max(0, Math.min(rawAdjusted, 1));
      const eased = clamped * clamped * (3 - 2 * clamped);

      const fillPercent = eased * 100;

      line.style.backgroundImage = `linear-gradient(to right, #fcf7e6 ${fillPercent}%, rgba(252, 247, 230, 0.2) ${fillPercent}%)`;
    });
  }

  revealLines();
  window.addEventListener('scroll', revealLines);
  window.addEventListener('resize', revealLines);

  // ==============================
  // tagline-split animation logic
  // ==============================
  console.log('split tagline code starting');
  const splitTargets = document.querySelectorAll('.tagline-split');
  console.log('Found tagline-split:', splitTargets);

  if (splitTargets.length === 0) {
    console.warn('No elements with class "tagline-split" found.');
  } else {
    splitTargets.forEach(target => {
      const text = target.textContent.trim();
      target.textContent = '';

      [...text].forEach((char, i) => {
        const span = document.createElement('span');
        span.className = 'split-char';
        span.textContent = char;
        target.appendChild(span);
      });
    });

    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          console.log('Tagline entered viewport');
          entry.target.querySelectorAll('.split-char').forEach((char, i) => {
            char.style.transition = `all 0.6s ease-out ${i * 0.05}s`;
            char.style.opacity = 1;
            char.style.transform = 'translateY(0)';
          });
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });

    splitTargets.forEach(el => observer.observe(el));
  }

  // ==============================
  // Generic [data-anim] in-view trigger
  // ==============================
  const dataAnimEls = document.querySelectorAll('[data-anim]');

  if (dataAnimEls.length) {
    const animObserver = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
          animObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });

    dataAnimEls.forEach(el => animObserver.observe(el));
  }

  // ==============================
// Enhanced scroll-float with drift
// ==============================
const scrollFloatElements = document.querySelectorAll('.scroll-float');
const floatState = [];

scrollFloatElements.forEach(el => {
  floatState.push({
    el,
    currentY: 0,
    targetY: 0,
    speed: parseFloat(el.dataset.speed) || 0.1,
  });
});

function animateScrollFloat() {
  const scrollY = window.scrollY;
  const windowHeight = window.innerHeight;

  floatState.forEach(obj => {
    const rect = obj.el.getBoundingClientRect();
    const centerOffset = (rect.top + rect.height / 2) - (windowHeight / 2);
    obj.targetY = centerOffset * obj.speed;

    // Drift easing: closer to 0.1 = slower, more "lag"
    obj.currentY += (obj.targetY - obj.currentY) * 0.08;

    obj.el.style.transform = `translateY(${obj.currentY}px)`;
  });

  requestAnimationFrame(animateScrollFloat);
}

requestAnimationFrame(animateScrollFloat);

});
