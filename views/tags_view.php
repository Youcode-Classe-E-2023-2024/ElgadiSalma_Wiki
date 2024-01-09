<?php
if(!isset($_SESSION['id_user'])){
    header("location:index.php?page=login");
}
?>
    
    <h1 class="text-4xl text-yellow-400 py-4 text-center font-bold">Ajouter des tags</h1>

    <!-- form pour add tags -->
    <form action="<?= PATH ?>index.php?page=tags" method="post">
    <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
        <div>
            <div class="mb-5">
                <label for="Tag name" class="block mb-2 font-bold text-gray-600 uppercase">Tag name</label>
                <input type="text" id="name" name="name" placeholder="Tag name." class="border border-gray-300 shadow p-3 w-full rounded " required>
            </div>
        </div>
        <div class="flex justify-between">
            <button type="submit" name="submit" class="flex justify-center w-1/3 bg-green-500 text-white font-bold p-4 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                Save
            </button>
        </div>
    </div>
    </form>

    <!--  -->


    <!-- display tags -->
    <h1 class="text-4xl text-yellow-400 py-4 text-center font-bold">Tags disponibles</h1>
        
    <div class="flex justify-center text-center gap-10 flex-wrap mt-10">
        <?php
        if (!empty($tags)) {
        foreach ($tags as $tag) {
        ?>
    <div class="w-full max-w-sm overflow-hidden rounded-lg border-2 bg-white shadow-md duration-300 hover:scale-105 hover:shadow-xl"> 
        <form action="<?= PATH ?>index.php?page=tags" method="post"> 
        <input name="name" class="mt-2 text-center text-2xl font-bold text-gray-500" value="<?php echo $tag['name'] ;?>"/>
        <p class="my-4 text-center text-sm text-gray-500">Disponible depuis : 12/12/2222</p>
        <div class="space-x-4 bg-gray-100 py-4 flex justify-center text-center">

        <input type="hidden" name="tagId" value="<?php echo $tag['id_tag'] ; ?>">
        <button type="submit" name="modifier" class="inline-block rounded-md bg-green-500 px-6 py-2 font-semibold text-green-100 shadow-md duration-75 hover:bg-green-400">Modifier</button>
        </form> 

        <form action="<?= PATH ?>index.php?page=tags" method="post">
        <input type="hidden" name="tagId" value="<?php echo $tag['id_tag'] ; ?>">
        <button type="submit" name="supprimer" class="inline-block rounded-md bg-red-500 px-10 py-2 font-semibold text-red-100 shadow-md duration-75 hover:bg-red-400">Supprimer</button>
        </form> 

        </div>
    </div>

        <?php }}
        else{?>
            <div class="flex justify-center w-full h-24 gap-10 flex-wrap mt-10">
            <div class="w-full max-w-sm overflow-hidden rounded-lg border-2 bg-white shadow-md duration-300 hover:scale-105 hover:shadow-xl">
            <h4 class="text-center text-red-500 text-xl font-bold pt-8">Aucun tag trouvé</h4>
            </div>
            </div>
        <?php }
         ?>

    <!-- <div class="w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-md duration-300 hover:scale-105 hover:shadow-xl">  
        <h1 class="mt-2 text-center text-2xl font-bold text-gray-500">Success</h1>
        <p class="my-4 text-center text-sm text-gray-500">Woah, successfully completed 3/5 Tasks</p>
        <div class="space-x-4 bg-gray-100 py-4 text-center">
        <button class="inline-block rounded-md bg-red-500 px-10 py-2 font-semibold text-red-100 shadow-md duration-75 hover:bg-red-400">Cancel</button>
        <button class="inline-block rounded-md bg-green-500 px-6 py-2 font-semibold text-green-100 shadow-md duration-75 hover:bg-green-400">Dashboard</button>
        </div>
    </div>

    <div class="w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-md duration-300 hover:scale-105 hover:shadow-xl">  
        <h1 class="mt-2 text-center text-2xl font-bold text-gray-500">Success</h1>
        <p class="my-4 text-center text-sm text-gray-500">Woah, successfully completed 3/5 Tasks</p>
        <div class="space-x-4 bg-gray-100 py-4 text-center">
        <button class="inline-block rounded-md bg-red-500 px-10 py-2 font-semibold text-red-100 shadow-md duration-75 hover:bg-red-400">Cancel</button>
        <button class="inline-block rounded-md bg-green-500 px-6 py-2 font-semibold text-green-100 shadow-md duration-75 hover:bg-green-400">Dashboard</button>
        </div>
    </div>

    <div class="w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-md duration-300 hover:scale-105 hover:shadow-xl">  
        <h1 class="mt-2 text-center text-2xl font-bold text-gray-500">Success</h1>
        <p class="my-4 text-center text-sm text-gray-500">Woah, successfully completed 3/5 Tasks</p>
        <div class="space-x-4 bg-gray-100 py-4 text-center">
        <button class="inline-block rounded-md bg-red-500 px-10 py-2 font-semibold text-red-100 shadow-md duration-75 hover:bg-red-400">Cancel</button>
        <button class="inline-block rounded-md bg-green-500 px-6 py-2 font-semibold text-green-100 shadow-md duration-75 hover:bg-green-400">Dashboard</button>
        </div>
    </div>

    <div class="w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-md duration-300 hover:scale-105 hover:shadow-xl">  
        <h1 class="mt-2 text-center text-2xl font-bold text-gray-500">Success</h1>
        <p class="my-4 text-center text-sm text-gray-500">Woah, successfully completed 3/5 Tasks</p>
        <div class="space-x-4 bg-gray-100 py-4 text-center">
        <button class="inline-block rounded-md bg-red-500 px-10 py-2 font-semibold text-red-100 shadow-md duration-75 hover:bg-red-400">Cancel</button>
        <button class="inline-block rounded-md bg-green-500 px-6 py-2 font-semibold text-green-100 shadow-md duration-75 hover:bg-green-400">Dashboard</button>
        </div>
    </div>

    <div class="w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-md duration-300 hover:scale-105 hover:shadow-xl">  
        <h1 class="mt-2 text-center text-2xl font-bold text-gray-500">Success</h1>
        <p class="my-4 text-center text-sm text-gray-500">Woah, successfully completed 3/5 Tasks</p>
        <div class="space-x-4 bg-gray-100 py-4 text-center">
        <button class="inline-block rounded-md bg-red-500 px-10 py-2 font-semibold text-red-100 shadow-md duration-75 hover:bg-red-400">Cancel</button>
        <button class="inline-block rounded-md bg-green-500 px-6 py-2 font-semibold text-green-100 shadow-md duration-75 hover:bg-green-400">Dashboard</button>
        </div>
    </div> -->
    </div>
    <!--  -->
