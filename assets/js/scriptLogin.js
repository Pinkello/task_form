$(document).ready(function () {
  //login validation
  document.getElementById("loginButton").addEventListener("click", function () {
    resetErrorMessages2();

    validateAndDisplay2("email", "Proszę podać adres email.");
    validateAndDisplay2("password", "Proszę podać hasło.");

    if (allValid2()) {
      document.getElementById("form_login").submit();
    }
  });

  function validateAndDisplay2(inputId, errorMessage) {
    const inputValue = document.getElementById(inputId).value.trim();

    if (inputValue === "") {
      displayErrorMessage2(errorMessage, inputId);
      return false;
    }

    if (inputId === "password" && inputValue.length < 5) {
      displayErrorMessage2("Hasło musi mieć co najmniej 5 znaków.", inputId);
      return false;
    }

    return true;
  }

  function resetErrorMessages2() {
    const errorMessages = document.querySelectorAll(".error-message");
    errorMessages.forEach((message) => {
      message.remove();
    });
  }

  function displayErrorMessage2(messageText, inputId) {
    const errorMessage = document.createElement("div");
    errorMessage.classList.add("error-message");
    errorMessage.classList.add("text-danger");
    errorMessage.textContent = messageText;
    const inputElement = document.getElementById(inputId);
    inputElement.parentNode.appendChild(errorMessage);
  }

  function allValid2() {
    const errorMessages = document.querySelectorAll(".error-message");
    return errorMessages.length === 0;
  }
});
