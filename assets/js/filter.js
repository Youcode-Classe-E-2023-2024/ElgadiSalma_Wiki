// console.log("salma");
document.addEventListener('DOMContentLoaded', function () {
    var wikiData;

    var categorySelect = document.getElementById('category');
    var tagSelect = document.getElementById('tag');
    var searchInput = document.getElementById('searchInput');

    categorySelect.addEventListener('change', fetchDataAndDisplay);
    tagSelect.addEventListener('change', fetchDataAndDisplay);
    searchInput.addEventListener('keyup', Search);

    fetchDataAndDisplay();

    function fetchDataAndDisplay() {
        var category = categorySelect.value;
        var tag = tagSelect.value;

        console.log('Fetching data - category:', category, 'tag:', tag);

        fetch(`../../controller/Ticket/filter_tickets.php?category=${category}&tag=${tag}`)
            .then(response => response.json())
            .then(tickets => {
                ticketData = tickets;
                displayData(tickets);
            })
            .catch(error => console.error('Error', error));
    }

    function Search() {
        const searchTerm = searchInput.value.trim().toLowerCase();
        const filteredWikis = wikiData.filter(wiki => wiki.title.toLowerCase().includes(searchTerm));
        displayData(filteredWikis);
    }

    function displayData(wikis) {
        console.log('Displaying data:', wikis);

        const rows = wikis.map((wiki) => {
            return (
                `
                    <div class="bg-white rounded-2xl shadow-xl px-8 py-12 sm:px-12" style="width: 30%;" >
                        <div class="mb-12 space-y-4">
                            <h3 class="text-2xl font-semibold text-purple-900"> ${wiki.titre}</h3>
                            <p class="mb-6 whitespace-pre">${wiki.description}</p>
                            <a href="./description.php?id=${wiki.id_wiki}" class="block font-medium text-purple-600">Know more</a>
                        </div>
                        <img src="https://tailus.io/sources/blocks/end-image/preview/images/ux-design.svg" class="w-2/3 ml-auto" alt="illustration" loading="lazy" width="900" height="600">
                    </div>
                `
            );
        });

        document.getElementById('wikiContainer').innerHTML = rows.join('');
    }
});
