// accordion.js
document.addEventListener("DOMContentLoaded", function () {
  const headers = document.querySelectorAll(".accordion-header");

  // --- Spinner helpers ---
  const ensureSpinner = (panel) => {
    if (!panel.querySelector('.spinner')) {
      const s = document.createElement('div');
      s.className = 'spinner';
      s.setAttribute('aria-live', 'polite');
      s.innerHTML = '<div class="ring" role="status"></div><span class="sr-only">Loading…</span>';
      panel.prepend(s);
    }
  };
  const showSpinner = (panel) => {
    panel.classList.add("loading");
    panel.setAttribute("aria-busy", "true");
    // keep some space so overlay is visible during expand
    if (!panel.style.minHeight) panel.style.minHeight = "160px";
  };
  const hideSpinner = (panel) => {
    panel.classList.remove("loading");
    panel.removeAttribute("aria-busy");
    panel.style.minHeight = "";
  };

  // --- Iframe lazy-load with spinner ---
  const loadIframeIfNeeded = (panel) => {
    if (!panel) return;
    const iframe = panel.querySelector("iframe[data-src]");
    if (!iframe) return;

    // already loaded?
    if (iframe.dataset.loaded === "1") return;

    ensureSpinner(panel);
    showSpinner(panel);

    const onLoad = () => {
      iframe.dataset.loaded = "1";
      hideSpinner(panel);
      iframe.removeEventListener("load", onLoad);
    };
    iframe.addEventListener("load", onLoad, { once: true });

    if (!iframe.src) {
      iframe.loading = "lazy";
      iframe.src = iframe.dataset.src; // kick off load
    }
  };

  // --- Height animation helpers ---
  const openPanel = (panel) => {
    panel.classList.add("open");
    // measure full height
    panel.style.height = "auto";
    const full = panel.scrollHeight;
    // set to 0 then to full -> transition
    panel.style.height = "0px";
    // reflow
    panel.offsetWidth; // eslint-disable-line no-unused-expressions
    panel.style.height = full + "px";

    // After transition, set height:auto so content changes don’t break layout
    const onEnd = (e) => {
      if (e.propertyName === "height") {
        panel.style.height = "auto";
        panel.removeEventListener("transitionend", onEnd);
      }
    };
    panel.addEventListener("transitionend", onEnd);

    loadIframeIfNeeded(panel);
  };

  const closePanel = (panel) => {
    // set fixed height to current, then to 0 to animate close
    panel.style.height = panel.scrollHeight + "px";
    // reflow
    panel.offsetWidth; // eslint-disable-line no-unused-expressions
    panel.style.height = "0px";
    panel.classList.remove("open");
  };

  // --- Click wiring ---
  headers.forEach((headerEl) => {
    headerEl.addEventListener("click", function (e) {
      const targetId = headerEl.getAttribute("data-target");
      const targetPanel = document.getElementById(targetId);
      if (!targetPanel) return;

      const isOpen = targetPanel.classList.contains("open") || targetPanel.classList.contains("show");

      if (isOpen) {
        closePanel(targetPanel);
        headerEl.classList.remove("active", "is-open");
        // if your CSS uses .show to mean "currently open", remove it too:
        targetPanel.classList.remove("show");
      } else {
        openPanel(targetPanel);
        headerEl.classList.add("active", "is-open");
        // normalize: mark as open
        targetPanel.classList.add("show");
      }
    }, { passive: true });
  });

  // --- Prime any panel that starts open in markup (.show or .open) ---
  document.querySelectorAll(".accordion-panel.show, .accordion-panel.open").forEach((p) => {
    // ensure correct classes/styles for a visible panel
    p.classList.add("open");
    p.style.height = "auto";
    loadIframeIfNeeded(p);
  });
});


// --------- Optional: Members filter block guarded so it doesn’t error on pages without it ---------
document.addEventListener("DOMContentLoaded", function () {
  const buttons = document.querySelectorAll('.filter-button');
  const sections = document.querySelectorAll('.member-group-section');
  if (!buttons.length || !sections.length) return;

  const defaultFilter = 'faculty';
  sections.forEach(section => {
    section.style.display = section.classList.contains('group-' + defaultFilter) ? '' : 'none';
  });

  buttons.forEach(button => {
    button.addEventListener('click', function () {
      const filter = this.dataset.filter;
      buttons.forEach(btn => btn.classList.remove('active'));
      this.classList.add('active');

      sections.forEach(section => {
        section.style.display = section.classList.contains('group-' + filter) ? '' : 'none';
      });
    });
  });
});
