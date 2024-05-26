function checkInputs() {
    const items = document.querySelectorAll(".item");
    for (const item of items) {
        if (item.value == "") {
            item.classList.add("error");
            item.parentElement.classList.add("error");
        }

        if (items[1].value != "") {
            checkEmail();
        }
        items[1].addEventListener("keyup", () => {
            checkEmail();
        });

        item.addEventListener("keyup", () => {
            if (item.value != "") {
                item.classList.remove("error");
                item.parentElement.classList.remove("error");
            } else {
                item.classList.add("error");
                item.parentElement.classList.add("error");
            }
        });
    }
}

function checkEmail() {
    const email = document.querySelector("#email");
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailPattern.test(email.value)) {
        email.classList.remove("error");
        email.parentElement.classList.remove("error");
    } else {
        email.classList.add("error");
        email.parentElement.classList.add("error");
    }
}

document.addEventListener("DOMContentLoaded", checkInputs);
