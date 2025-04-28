document.addEventListener('DOMContentLoaded', () => {
    const floatingEls = document.querySelectorAll('.scroll-float');
    const fadeEls = document.querySelectorAll('.fade-in-on-scroll');
  
    function easingWithPause(x) {
      x = Math.min(Math.max(x, 0), 1);
      if (x < 0.4) {
        return x * 2.5;
      } else if (x < 0.6) {
        return 1; // Pause zone
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
  });

  
  // Intersection Observer setup
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in-view');
      }
    });
  });
  
  document.querySelectorAll('[data-anim]').forEach(el => {
    observer.observe(el);
  });
  