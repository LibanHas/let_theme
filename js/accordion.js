document.addEventListener("DOMContentLoaded", function () {
  const headers = document.querySelectorAll(".accordion-header");

  headers.forEach(header => {
    header.addEventListener("click", function (e) {
      const headerEl = e.currentTarget;
      const targetId = headerEl.getAttribute("data-target");
      const targetPanel = document.getElementById(targetId);
      if (!targetPanel) return;

      const isOpen = targetPanel.classList.contains("open");

      if (isOpen) {
        targetPanel.style.height = "0px";
        targetPanel.classList.remove("open");
        headerEl.classList.remove("active", "is-open");
      } else {
        // Close all others (optional)
        // document.querySelectorAll(".accordion-panel.open").forEach(panel => {
        //   panel.style.height = "0px";
        //   panel.classList.remove("open");
        //   const otherHeader = document.querySelector(`.accordion-header[data-target="${panel.id}"]`);
        //   otherHeader?.classList.remove("active", "is-open");
        // });

        targetPanel.classList.add("open");
        targetPanel.style.height = "auto";
        const fullHeight = targetPanel.scrollHeight;
        targetPanel.style.height = "0px";
        void targetPanel.offsetWidth;
        targetPanel.style.height = fullHeight + "px";
        headerEl.classList.add("active", "is-open");
      }
    });
  });
});
