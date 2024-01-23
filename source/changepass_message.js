window.onload = function() {
    let successMessage = document.querySelector('#success-message');
    let errorMessage = document.querySelector('#error-message');
    setTimeout(function() {
        if (successMessage) {
            successMessage.style.display = 'none';
        }
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 5000); // Hide the messages after 5 seconds
};