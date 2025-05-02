document.addEventListener("DOMContentLoaded", function () {
  const headers = document.querySelectorAll(".accordion-header");

  headers.forEach(header => {
    header.addEventListener("click", function () {
      const targetId = this.getAttribute("data-target");
      const targetPanel = document.getElementById(targetId);
      const icon = this.querySelector(".accordion-icon");
      const isOpen = targetPanel.classList.contains("open");

      // Close all panels
      document.querySelectorAll(".accordion-panel").forEach(panel => {
        panel.style.height = "0px";
        panel.classList.remove("open");
      });

      document.querySelectorAll(".accordion-header").forEach(h => {
        h.classList.remove("active");
        h.querySelector(".accordion-icon").textContent = "+";
      });

      // Open the clicked one if it wasn't already open
      if (!isOpen) {
        targetPanel.classList.add("open");
targetPanel.style.height = "auto"; // reset first
const fullHeight = targetPanel.scrollHeight;

targetPanel.style.height = "0px"; // reset to trigger transition
// Force reflow
void targetPanel.offsetWidth;

targetPanel.style.height = fullHeight + "px";


        this.classList.add("active");
        icon.textContent = "×";
      }
    });
  });
});
