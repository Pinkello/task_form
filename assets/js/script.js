$(document).ready(function () {
  document
    .getElementById("submitButton")
    .addEventListener("click", function () {
      // Resetowanie komunikatów o błędach
      resetErrorMessages();

      // Sprawdzenie warunków walidacji
      validateAndDisplay("inputName", "Proszę podać imię.");
      validateAndDisplay("inputSurname", "Proszę podać nazwisko.");
      validateAndDisplay(
        "inputEmail",
        "Proszę podać poprawny adres email.",
        validateEmail
      );
      validateAndDisplay(
        "inputDate",
        "Proszę podać datę w poprawnym formacie.",
        validateDate
      );
      validateAndDisplay(
        "inputEducation",
        "Proszę wybrać wykształcenie.",
        validateSelect
      );

      validateAttachmentAndDisplay(
        "attachment",
        "Proszę załączyć list motywacyjny."
      );
      validateAttachmentAndDisplay("attachment2", "Proszę załączyć CV.");

      // Tutaj możesz dodawać inne warunki walidacji dla dodatkowych plików

      // Sprawdzenie warunków dotyczących staży
      const internshipsValid = validateInternships();
      if (!internshipsValid) {
        displayErrorMessage(
          "Proszę podać wszystkie informacje dotyczące stażu."
        );
      }

      // Jeśli nie wystąpiły błędy, możesz przesłać formularz
      if (allValid()) {
        document.getElementById("myForm").submit();
      }
    });
  function validateSelect(inputId, errorMessage) {
    const selectedValue = document.getElementById(inputId).value;
    return selectedValue !== "";
  }

  // Funkcje walidacji dla poszczególnych pól
  function validateAndDisplay(
    inputId,
    errorMessage,
    customValidationFunction = null
  ) {
    const isValid = customValidationFunction
      ? customValidationFunction(inputId)
      : validateEmpty(inputId);
    if (!isValid) {
      displayErrorMessage(errorMessage, inputId);
    }
  }

  function validateEmpty(inputId) {
    const inputValue = document.getElementById(inputId).value.trim();
    return inputValue !== "";
  }

  function validateEmail(inputId) {
    const email = document.getElementById(inputId).value.trim();
    // Prosta walidacja adresu email, można rozbudować
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  function validateDate(inputId) {
    const date = document.getElementById(inputId).value.trim();
    // Prosta walidacja daty, można rozbudować
    return /^\d{4}-\d{2}-\d{2}$/.test(date);
  }

  function validateAttachmentAndDisplay(inputId, errorMessage) {
    const isValid = validateAttachment(inputId);
    if (!isValid) {
      displayErrorMessage(errorMessage, inputId);
    }
  }

  function validateAttachment(inputId) {
    const attachment = document.getElementById(inputId);
    return attachment.files.length > 0;
  }

  function validateInternships() {
    const internshipContainers = document.querySelectorAll(".internship-entry");
    for (const container of internshipContainers) {
      const companyName = container
        .querySelector("input[name='companyName[]']")
        .value.trim();
      const startDate = container
        .querySelector("input[name='startDate[]']")
        .value.trim();
      const endDate = container
        .querySelector("input[name='endDate[]']")
        .value.trim();

      if (companyName === "" || startDate === "" || endDate === "") {
        return false;
      }
    }

    return true;
  }

  // Resetuje komunikaty o błędach
  function resetErrorMessages() {
    const errorMessages = document.querySelectorAll(".error-message");
    errorMessages.forEach((message) => {
      message.remove();
    });
  }

  // Wyświetla komunikat o błędzie pod danym polem
  function displayErrorMessage(messageText, inputId) {
    const errorMessage = document.createElement("div");
    errorMessage.classList.add("error-message");
    errorMessage.classList.add("text-danger");
    errorMessage.classList.add("font-weight-bold");
    errorMessage.textContent = messageText;
    const inputElement = document.getElementById(inputId);
    inputElement.parentNode.appendChild(errorMessage);
  }

  // Sprawdza, czy wszystkie warunki są spełnione
  function allValid() {
    const errorMessages = document.querySelectorAll(".error-message");
    return errorMessages.length === 0;
  }

  // Resetuje komunikaty o błędach
  function resetErrorMessages() {
    const errorMessages = document.querySelectorAll(".error-message");
    errorMessages.forEach((message) => {
      message.remove();
    });
  }

  // Wyświetla komunikat o błędzie pod danym polem
  function displayErrorMessage(messageText, inputId) {
    const errorMessage = document.createElement("div");
    errorMessage.classList.add("error-message");
    errorMessage.textContent = messageText;
    const inputElement = document.getElementById(inputId);
    inputElement.parentNode.appendChild(errorMessage);
  }

  // Sprawdza, czy wszystkie warunki są spełnione
  function allValid() {
    const errorMessages = document.querySelectorAll(".error-message");
    return errorMessages.length === 0;
  }

  $("#submitBtn").on("click", function () {
    event.preventDefault();
    var subjectValue = $("#subject").val().trim();
    var contentValue = $("#notes").val().trim();
    if (subjectValue === "" || contentValue === "") {
      showToast(error_toast);
    } else {
      $("#myForm").submit();
    }
  });

  function showToast(message) {
    var toast = new bootstrap.Toast(document.getElementById("toast"));
    $(".toast-body").text(message);
    toast.show();
  }

  $(".add-to-textarea").on("click", function (e) {
    e.preventDefault();
    var linkValue = $(this).data("value");
    var currentContent = $("#notes").val();
    var newContent = currentContent + linkValue;
    $("#notes").val(newContent);
  });

  $("#flexSwitchCheckDefault").change(function () {
    if ($(this).is(":checked")) {
      $(".checks").slideUp();
    } else {
      $(".checks").slideDown();
    }
  });

  $("#skills").change(function () {
    if ($(this).is(":checked")) {
      $(".checkSkills").slideDown();
    } else {
      $(".checkSkills").slideUp();
    }
  });

  $("#trainings").change(function () {
    if ($(this).is(":checked")) {
      $(".checkTrainings").slideDown();
    } else {
      $(".checkTrainings").slideUp();
    }
  });

  $("#companies").change(function () {
    if ($(this).is(":checked")) {
      $(".checkCompanies").slideDown();
    } else {
      $(".checkCompanies").slideUp();
    }
  });

  $("#companies").change(function () {
    if ($(this).is(":checked")) {
      $(".checkDepartments").slideDown();
    } else {
      $(".checkDepartments").slideUp();
    }
  });

  $("#database_data").change(function () {
    if ($(this).is(":checked")) {
      $(".buttons_database")
        .hide()
        .css({
          display: "flex",
          "flex-direction": "column",
        })
        .slideDown("slow");
    } else {
      $(".buttons_database")
        .hide()
        .css({
          "flex-direction": "row",
        })
        .slideUp("slow");
    }
  });

  $("#checkboxAddFile").change(function () {
    if ($(this).is(":checked")) {
      $(".checks").slideDown();
    } else {
      $(".checks").slideUp();
    }
  });

  const toastTrigger = document.getElementById("liveToastBtn");
  const toastLiveExample = document.getElementById("liveToast");

  if (toastTrigger) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(
      toastLiveExample
    );
    toastTrigger.addEventListener("click", () => {
      toastBootstrap.show();
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  const successParam = urlParams.get("success");
  const failParam = urlParams.get("fail");

  if (successParam === "1") {
    const toastLiveExample = document.getElementById("liveToast");
    if (toastLiveExample) {
      const toastBootstrap = new bootstrap.Toast(toastLiveExample);
      setTimeout(() => {
        toastBootstrap.show();
      }, 2000);
    }
  }
  if (failParam === "1") {
    const toastLiveExample = document.getElementById("liveToast2");
    if (toastLiveExample) {
      const toastBootstrap = new bootstrap.Toast(toastLiveExample);
      setTimeout(() => {
        toastBootstrap.show();
      }, 2000);
    }
  }
  if (failParam === "2") {
    const toastLiveExample = document.getElementById("liveToast3");
    if (toastLiveExample) {
      const toastBootstrap = new bootstrap.Toast(toastLiveExample);
      setTimeout(() => {
        toastBootstrap.show();
      }, 2000);
    }
  }

  const addInternshipBtn = document.getElementById("addInternshipBtn");
  const internshipContainer = document.getElementById("internshipContainer");

  addInternshipBtn.addEventListener("click", function () {
    const newInternshipEntry = document.createElement("div");
    newInternshipEntry.classList.add("internship-entry");

    newInternshipEntry.innerHTML = `
        <div class="row">
            <div class="col-6">
                <label for="companyName" class="form-label">Nazwa firmy</label>
                <input type="text" class="form-control" name="companyName[]">
            </div>
            <div class="col-3">
                <label for="startDate" class="form-label">Od</label>
                <input type="date" class="form-control" name="startDate[]">
            </div>
            <div class="col-3">
                <label for="endDate" class="form-label">Do</label>
                <input type="date" class="form-control" name="endDate[]">
            </div>
        </div>
    `;

    internshipContainer.appendChild(newInternshipEntry);

    // Aktualizuj widoczność przycisków
    updateButtonsVisibility();
  });

  function removeInternship() {
    const internshipEntries = document.getElementsByClassName(
      "internship-entry"
    );

    // Sprawdź czy są staże do usunięcia
    if (internshipEntries.length > 0) {
      // Usuń ostatnio dodane pola dla stażu
      internshipContainer.removeChild(
        internshipEntries[internshipEntries.length - 1]
      );

      // Aktualizuj widoczność przycisków
      updateButtonsVisibility();
    }
  }

  function updateButtonsVisibility() {
    const internshipEntries = document.getElementsByClassName(
      "internship-entry"
    );
    const removeInternshipBtn = document.getElementById("removeInternshipBtn");

    // Ustaw widoczność przycisku "Usuń staż" w zależności od liczby staży
    removeInternshipBtn.style.display =
      internshipEntries.length > 0 ? "inline-block" : "none";
  }

  const removeInternshipBtn = document.getElementById("removeInternshipBtn");
  removeInternshipBtn.addEventListener("click", removeInternship);
});

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
