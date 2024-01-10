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

                <div class="max-w-sm bg-white px-6 pt-6 flex flex-col justify-between pb-2 rounded-xl shadow-lg transform transition duration-500">
                    <h3 class="mb-3 text-xl font-bold text-indigo-600">${wiki.titre}</h3>
                    <img class="w-full rounded-xl h-72 w-72" src="./assets/image/wikis/${wiki.photo}" />
                    <div class="mt-4 flex gap-2">
                        <a href="<?= PATH ?>index.php?page=edit_wiki?id=1" class="inline-block w-1/2 rounded-md bg-green-500 px-6 py-2 font-semibold text-green-100 shadow-md duration-75 hover:bg-green-400"><button type="submit" name="modifier" >Modifier</button></a>
                        <form action="<?= PATH ?>index.php?page=wikis" method="post">
                            <input type="hidden" name="wikiId" value="${wiki.id_wiki}">
                            <button type="submit" name="supprimer" class="inline-block rounded-md bg-red-500 px-10 py-2 font-semibold text-red-100 shadow-md duration-75 hover:bg-red-400">Supprimer</button>
                        </form>
                    </div>
                    <div class="">
                        <div class="flex space-x-1 items-center">
                            <button class="mt-2 text-xl w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg">Voir plus -></button>
                        </div>
                    </div>
                </div>
            
                `
            );
        });

        document.getElementById('wikiContainer').innerHTML = rows.join('');
    }
});
