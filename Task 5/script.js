const password = document.getElementById("password");
const message = document.getElementById("message");

const symbols = /[%*+=_]/;

password.addEventListener("input", function () {
    const passwordValue = password.value;
    if (passwordValue.length < 10) {
        message.innerText = "Password must be at least 10 characters";
        message.className = "text-danger";
    } else if (!symbols.test(passwordValue)) {
        message.innerText = "Password must contain % * + = _";
        message.className = "text-danger";
    } else {
        message.innerText = "Valid Password";
        message.className = "text-success";
    }
});

setTimeout(function () {
    document.body.style.backgroundColor = "black";
}, 10000);
