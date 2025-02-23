document.getElementById('contactBtn').addEventListener('click', function() {
    document.getElementById('contactModal').style.display = 'flex';
    document.body.classList.add('modal-active');
});

document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('contactModal').style.display = 'none';
    document.body.classList.remove('modal-active');
});

window.addEventListener('click', function(event) {
    const modal = document.getElementById('contactModal');
    if (event.target === modal) {
        modal.style.display = 'none';
        document.body.classList.remove('modal-active');
    }
});
