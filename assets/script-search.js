document.getElementById('searchButton').addEventListener('click', function() {
    const keyword = document.getElementById('searchInput').value.toLowerCase().trim();

    const cards = document.querySelectorAll('.card-title'); // Ambil semua judul game
    cards.forEach(card => {
        const cardTitle = card.textContent.toLowerCase();
        const parentCard = card.closest('.col'); // Ambil elemen .col terdekat (bungkus kartu)

        if (cardTitle.includes(keyword)) {
            parentCard.style.display = '';
        } else {
            parentCard.style.display = 'none';
        }
    });
});

