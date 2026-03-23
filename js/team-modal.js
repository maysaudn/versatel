document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".card");
    const modal = document.getElementById("team-modal");
  
    const modalName = document.getElementById("modal-name");
    const modalTitle = document.getElementById("modal-title");
    const modalBio = document.getElementById("modal-bio");
    const modalEmail = document.getElementById("modal-email");
    const modalImage = document.getElementById("modal-image");
  
    const closeBtn = document.querySelector(".team-modal-close");

    function closeModal() {
      modal.style.display = "none";
      document.body.classList.remove("modal-open");
    };
  
    cards.forEach(card => {
      card.addEventListener("click", function () {
        modalName.textContent = this.dataset.name;
        modalTitle.textContent = this.dataset.title;
        modalBio.textContent = this.dataset.bio;
        modalEmail.textContent = this.dataset.email;
        modalEmail.href = "mailto:" + this.dataset.email;
        modalImage.src = this.dataset.image;
  
        modal.style.display = "flex";
        document.body.classList.add("modal-open");
      });
    });
  
    closeBtn.addEventListener("click", closeModal);
  
    window.addEventListener("click", (e) => {
      if (e.target === modal) {
        closeModal();
      }
    });

    
  });