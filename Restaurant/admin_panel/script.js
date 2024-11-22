document.addEventListener("DOMContentLoaded", function() {
    const toggle = document.querySelector('.toggle-btn');
    if (toggle) {  // Check if the element exists
        toggle.addEventListener('click', function(){
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('active');
        });
    }

    const userBtn = document.querySelector('#user-btn');
    if (userBtn) {  // Check if the element exists
        userBtn.addEventListener('click', function(){
            const userBox = document.querySelector('.profile-detail');
            userBox.classList.toggle('active');
        });
    }
});
        