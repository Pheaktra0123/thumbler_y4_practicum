document.addEventListener("DOMContentLoaded", function () {
    // Get references to the elements
    const cartIcon = document.getElementById("cartIcon");
    const cartDialog = document.getElementById("cartDialog");
    const closeCartDialog = document.getElementById("closeCartDialog");

    // Add event listener to the cart icon to open the cart dialog
    cartIcon.addEventListener("click", function (e) {
        e.preventDefault(); // Prevent the default anchor behavior (/# redirection)
        cartDialog.classList.remove("hidden");
    });

    // Add event listener to the close button to hide the cart dialog
    closeCartDialog.addEventListener("click", function () {
        cartDialog.classList.add("hidden");
    });

    // Optional: Close the cart dialog when clicking outside of it
    cartDialog.addEventListener("click", function (e) {
        if (e.target === cartDialog) {
            cartDialog.classList.add("hidden");
        }
    });
});
