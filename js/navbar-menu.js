(() => {
  const menu = document.querySelector(".menu");
  const hamburger = document.querySelector(".hamburger");
  const closeIcon = document.querySelector(".closeIcon");
  const menuIcon = document.querySelector(".menuIcon");
  const desktopMedia = window.matchMedia("(min-width: 1300px)");

  if (!menu || !hamburger || !closeIcon || !menuIcon) {
    if (hamburger) {
      hamburger.hidden = true;
    }

    return;
  }

  function setMenuOpen(isOpen, restoreFocus = false) {
    menu.classList.toggle("showMenu", isOpen);
    hamburger.setAttribute("aria-expanded", String(isOpen));
    closeIcon.style.display = isOpen ? "block" : "none";
    menuIcon.style.display = isOpen ? "none" : "block";

    if (isOpen) {
      menu.querySelector("a")?.focus();
    } else if (restoreFocus) {
      hamburger.focus();
    }
  }

  hamburger.addEventListener("click", () => {
    const isOpen = menu.classList.contains("showMenu");
    setMenuOpen(!isOpen);
  });

  menu.addEventListener("click", (event) => {
    const link = event.target.closest("a");

    if (link && !desktopMedia.matches) {
      setMenuOpen(false);
      return;
    }

    if (!link) {
      setMenuOpen(false, true);
    }
  });

  document.addEventListener("keydown", (event) => {
    if (
      event.key === "Escape" &&
      menu.classList.contains("showMenu")
    ) {
      setMenuOpen(false, true);
    }
  });

  desktopMedia.addEventListener("change", (event) => {
    if (event.matches) {
      setMenuOpen(false);
    }
  });
})();
