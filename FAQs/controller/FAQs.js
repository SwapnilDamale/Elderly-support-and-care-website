document.querySelectorAll('.card').forEach(function(card) {
    card.addEventListener('click', function() {
        const cardInner = card.querySelector('.card-inner');
        cardInner.classList.toggle('card-flip');
    });
});