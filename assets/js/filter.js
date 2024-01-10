// console.log("salma");
document.addEventListener('DOMContentLoaded', function () 
{
    var wikiData;

    var categorySelect = document.getElementById('category');
    var tagSelect = document.getElementById('tag');
    var searchInput = document.getElementById('searchInput');

    categorySelect.addEventListener('change', fetchDataAndDisplay);
    tagSelect.addEventListener('change', fetchDataAndDisplay);
    searchInput.addEventListener('keyup', Search);

    fetchDataAndDisplay();

    function fetchDataAndDisplay() 
    {
        var category = categorySelect.value;
        var tag = tagSelect.value;

        console.log('Fetching data - category:', category, 'tag:', tag);

        fetch(`index.php?page=filter&category=${category}&tag=${tag}`)
            .then(response => response.json())
            .then(tickets => {
                ticketData = tickets;
                displayData(tickets);
            })
            .catch(error => console.error('Error', error));
    }

    function Search() 
    {
        const searchTerm = searchInput.value.trim().toLowerCase();
        const filteredWikis = wikiData.filter(wiki => wiki.titre.toLowerCase().includes(searchTerm));
        displayData(filteredWikis);
    }

    function displayData(wikis) 
    {
        console.log('Displaying data:', wikis);

        const rows = wikis.map((wiki) => {
            return (
                `
                <div class=" text-center  w-content ">
                <div class="max-w-sm border-2 bg-white px-6  pt-6 flex flex-col justify-between pb-2 rounded-xl shadow-lg transform transition duration-500">
                    <h3 class="mb-3 text-xl font-bold text-indigo-600">${wiki.titre}</h3>
                    <img class="w-full rounded-xl h-72 w-72" src="./assets/image/wikis/${wiki.photo}" />
                    <div class="">
                            <button class="mt-4 text-xl w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg">Voir plus -></button>
                    </div>
                </div>
                </div>

                `
            );
        });

        document.getElementById('wikiContainer').innerHTML = rows.join('');
    }
});
