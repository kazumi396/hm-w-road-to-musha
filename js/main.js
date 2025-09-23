const modal = () => {
  const modal = document.querySelector(".js-modal");
  const openButton = document.querySelector(".js-open-button");
  const closeButton = document.querySelector(".js-modal-close");

  if (!modal || !openButton) return;
  openButton.addEventListener("click", () => modal.showModal());
  closeButton.addEventListener("click", () => modal.close());
};

modal();
