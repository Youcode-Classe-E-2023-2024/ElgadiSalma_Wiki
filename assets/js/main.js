// regex register
  document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
      const email = form.querySelector('[name="email"]').value;
      const password = form.querySelector('[name="password"]').value;

      if (!validateEmail(email)) {
        event.preventDefault();
        showError("email", "Veuillez entrer une adresse e-mail valide.");
      }

      if (!validatePassword(password)) {
        event.preventDefault();
        showError("password", "Le mot de passe doit avoir au moins 5 caractères.");
      }

    });

    function validateEmail(email) {
      return /^[^\s@]+@gmail\.com$/.test(email);
    }

    function validatePassword(password) {
      return password.length >= 5;
    }

    function showError(fieldName, message) {
      const field = form.querySelector(`[name="${fieldName}"]`);
      const errorSpan = document.createElement("span");
      errorSpan.className = "text-red-500 text-sm";
      errorSpan.innerHTML = message;

      const existingError = field.parentElement.querySelector(".text-red-500");
      if (existingError) {
        existingError.remove();
      }
      field.parentElement.appendChild(errorSpan);
    }
  });
