document.addEventListener("DOMContentLoaded", function () {
  const headers = document.querySelectorAll(".accordion-header");

  headers.forEach(header => {
    header.addEventListener("click", function () {
      const targetId = this.getAttribute("data-target");
      const targetPanel = document.getElementById(targetId);
      const icon = this.querySelector(".accordion-icon");
      const isOpen = targetPanel.classList.contains("open");

      if (isOpen) {
        targetPanel.style.height = "0px";
        targetPanel.classList.remove("open");
        this.classList.remove("active");
        icon.textContent = "+";
      } else {
        targetPanel.classList.add("open");
        targetPanel.style.height = "auto";
        const fullHeight = targetPanel.scrollHeight;
        targetPanel.style.height = "0px";
        void targetPanel.offsetWidth;
        targetPanel.style.height = fullHeight + "px";
        this.classList.add("active");
        icon.textContent = "×";
      }
    });
  });
});
