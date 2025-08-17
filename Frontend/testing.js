// Form Submission Handler
document.querySelector(".form-container form").addEventListener("submit", function(e) {
    e.preventDefault();
    
    const fname = document.getElementById("firstname").value;
    const lname = document.getElementById("lastname").value;
    const email = document.getElementById("email").value;

    const confirmMsg =  `Please confirm your details:\n\n` +
                        `First Name: ${fname}\n` +
                        `Last Name: ${lname}\n` +
                        `Email: ${email}`;

    if (confirm(confirmMsg)) {
        this.submit();
    }
});

// Test Ur Luck Button
document.addEventListener("DOMContentLoaded", () => {
    const testLuckBtn = document.getElementById("testLuckBtn");

    testLuckBtn.addEventListener("click", async () => {
        try {
            const response = await fetch("./Backend/get_random_user.php");
            const data = await response.json();

            let messageBox = document.getElementById("luckMessage");
            if (!messageBox) {
                messageBox = document.createElement("div");
                messageBox.id = "luckMessage";
                messageBox.classList.add("luck-message");
                document.querySelector(".form-container").after(messageBox);
            }

            if (data.error) {
                messageBox.innerHTML = `<div class="error">${data.error}</div>`;
            } else {
                messageBox.innerHTML = `
                    <center><div class="success">
                        <h3>🎉 Congratulations, ${data.firstname} ${data.lastname}!</h3>
                        <p>You Are The Winner !!!!!</p>
                    </div></center>
                `;
            }
        } catch (error) {
            console.error("Error fetching user:", error);
        }
    });
});