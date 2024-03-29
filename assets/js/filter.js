// console.log("salma");
document.addEventListener('DOMContentLoaded', function () 
{
    var wikiData;

    var categorySelect = document.getElementById('category');
    var tagSelect = document.getElementById('tag');
    const searchInput = document.getElementById('searchInput');


    categorySelect.addEventListener('change', fetchDataAndDisplay);
    tagSelect.addEventListener('change', fetchDataAndDisplay);

    fetchDataAndDisplay();

    function fetchDataAndDisplay() 
    {
        var category = categorySelect.value;
        var tag = tagSelect.value;

        console.log('Fetching data - category:', category, 'tag:', tag);

        fetch(`index.php?page=filter&category=${category}&tag=${tag}`)
            .then(response => response.json())
            .then(wikis => {
                wikiData = wikis; 
                displayData(wikis);
            })
            .catch(error => console.error('Error', error));
    }

    searchInput.addEventListener('keyup', function () 
    {
        const searchTerm = searchInput.value.trim().toLowerCase();
        console.log(wikiData)
        const filteredWikis = wikiData.filter(wiki => wiki.title.toLowerCase().includes(searchTerm));
    
        displayData(filteredWikis);
    });
    

    function displayData(wikis) 
    {
        console.log('Displaying data:', wikis);

        const rows = wikis.map((wiki) => {
            return (
                `
                <div class=" text-center  w-content ">
                <div class="max-w-sm border-2 bg-white px-6  pt-6 flex flex-col justify-between pb-2 rounded-xl shadow-lg transform transition duration-500">
                    <h3 class="mb-3 text-xl font-bold text-indigo-600">${wiki.title}</h3>
                    <img class="w-full rounded-xl h-72 w-72" src="./assets/image/wikis/${wiki.photo}" />
                    <a href="index.php?page=details_wiki&id=${wiki.id_wiki}">
                    <div class="">
                        <div class="flex space-x-1 items-center">
                        <button class="mt-2 text-xl w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg">Voir plus -></button>
                        </div>
                    </div>
                    </a>
                </div>
                </div>

                `
            );
        });

        document.getElementById('wikiContainer').innerHTML = rows.join('');
    }
});
