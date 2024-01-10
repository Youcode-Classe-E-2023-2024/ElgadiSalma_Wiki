<?php
if(!isset($_SESSION['id_user'])){
    header("location:index.php?page=login");
}
?>
<!-- user -->
<?php
if(isset($_SESSION['role']) && $_SESSION['role'] === 0)
{
?>


    <h1 class="text-4xl text-purple-500 pt-3 text-center font-bold">Toutes les wikis</h1>

    <form id="filterForm" method="GET" class="relative mt-6 max-w-2xl py-8 text-gray-900 mx-auto flex flex-col 	">
        
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="searchInput" class="bg-gray-50 border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
        </div>

        <div class="search">
            <div class="select">
                <select name="category" id="category">
                    <option value="all" selected>Category</option>
                    <?php
                    foreach ($categories as $category) : ?>
                        <option value="<?php echo $category->id_category ?>"><?php echo $category->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="select">

                <select name="tag" id="tag">
                    <option value="all" selected>Tag</option>
                    <?php
                    foreach ($tags as $tag) : ?>
                        <option value="<?php echo $tag->id_tag ?>"><?php echo $tag->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </form>


    <div id="wikiContainer" class="flex flex-wrap gap-5 justify-center">
    </div>

<!-- end user -->




<!-- admin -->
<?php
}
if(isset($_SESSION['role']) && $_SESSION['role'] === 1)
{
?>

    <h1 class="text-4xl text-purple-500 pt-3 text-center font-bold">Statistiques</h1>
    <div id="statistique">
        <!-- graphe -->
            <div class="pt-6 flex justify-center">
            <div class=" gap-10 flex flex-wrap w-full justify-center">
            <div class="w-1/3 py-6 px-6 1/3 rounded-xl border border-gray-200 bg-white">
                <h5 class="text-xl text-gray-700">Utilisateurs</h5>
                <canvas id="userChart" class="w-full" height="150"></canvas>
            </div>

            <div class="w-1/3 
            py-6 px-6 rounded-xl border border-gray-200 bg-white">
                <h5 class="text-xl text-gray-700">Products</h5>
                <canvas id="wikiChart" class="w-full" height="150"></canvas>
            </div>

        <!-- end graphe -->

            <div class=" w-2/3 py-6 px-6 rounded-xl flex flex-col gap-5 bg-gray-100 text-center border border-gray-200 bg-white">
                <div>
                    <h5 class="text-xl text-yellow-500 font-bold"><ins>Nombre d'utilisateurs :</ins></h5>
                    <h1 class="text-2xl text-gray-600"><?php echo $countUsers; ?> utilisateurs</h1>
                </div>
                <div>
                    <h5 class="text-xl text-yellow-500 font-bold"><ins>Nombre de Wikis :</ins></h5>
                    <h1 class="text-2xl text-gray-600"><?php echo $countWikis; ?> wikis</h1>
                </div>
                </div>
            </div>
            </div>

        <!-- Ajoutdu bouton d'exportation PDF -->
        <div class="flex justify-center pt-10 mt-6">
            <button id="exportToPDF" class="bg-purple-300 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Exporter en PDF</button>
        </div>
    </div>


<?php } ?>
<!-- end admin -->