fetch('http://localhost/ElgadiSalma_Alpha/Pages/grapheUser')
    .then(response => response.json())
    .then(data => {
        createUserChart(data); // Appelle la fonction spécifique pour les utilisateurs
    })
    .catch(error => {
        console.error('Error:', error);
    });

function createUserChart(data) {
    const dates = data.map(entry => entry.date);
    const counts = data.map(entry => entry.user_count);

    const ctx = document.getElementById('userChart').getContext('2d');
    const userChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dates,
            datasets: [{
                label: 'Nombre d\'utilisateurs ajoutés',
                data: counts,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Nombre d\'utilisateurs'
                    }
                }
            }
        }
    });
}

// End User Graphe

// Wikis Graphe

fetch('http://localhost/ElgadiSalma_Alpha/Pages/grapheWikis')
    .then(response => response.json())
    .then(data => {
        createWikisChart(data); // Appelle la fonction spécifique pour les wikis
    })
    .catch(error => {
        console.error('Error:', error);
    });

function createWikisChart(data) {
    const dates = data.map(entry => entry.date);
    const counts = data.map(entry => entry.wiki_count);

    const ctx = document.getElementById('wikiChart').getContext('2d');
    const wikiChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dates,
            datasets: [{
                label: 'Nombre de wikis ajoutées',
                data: counts,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Nombre de wikis'
                    }
                }
            }
        }
    });
}

// End Wikis Graphe

// to pdf
document.getElementById('exportToPDF').addEventListener('click', function() {
    const element = document.getElementById('statistique');
    html2pdf(element);
});