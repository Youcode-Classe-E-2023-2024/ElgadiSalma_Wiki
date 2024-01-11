<?php
if(!isset($_SESSION['id_user'])){
    header("location:index.php?page=login");
}
?>

<!-- user wikis -->


  <?php
  if(isset($_SESSION['role']) && $_SESSION['role'] === 0)
  {
  ?>

<!-- add wiki -->

<div class="heading text-center font-bold text-2xl text-yellow-400">New Wiki</div>

  <form action="<?= PATH ?>index.php?page=wikis" method = "post" enctype="multipart/form-data">

    <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 gap-2 p-4 shadow-lg max-w-2xl">
      <?php
        if(!empty($title_err)){
        ?>
        <span class="text-red-700">*<?php echo $title_err; ?></span>
        <?php } ?>
      <input class="title bg-gray-100 border border-gray-300 p-2 outline-none" spellcheck="false" name="title" placeholder="Title" type="text" >
      
      <?php
        if(!empty($description_err)){
        ?>
        <span class="text-red-700">*<?php echo $description_err; ?></span>
        <?php } ?>
      <input class="description bg-gray-100 px-3 h-40 border border-gray-300 outline-none" name="description" placeholder="Description of your wiki" >
      
      <?php
        if(!empty($photo_err)){
        ?>
        <span class="text-red-700">*<?php echo $photo_err; ?></span>
        <?php } ?>
      <input class="title bg-gray-100 border p-3 border-gray-300 p-2 outline-none" spellcheck="false" name="photo" placeholder="photo" type="file" >
      
      <?php
        if(!empty($category_err)){
        ?>
        <span class="text-red-700">*<?php echo $category_err; ?></span>
        <?php } ?>
      <select name="category" id="category" class="title bg-gray-100 border p-3 border-gray-300 p-2 outline-none" required>
          <option value="all" selected disabled>Category</option>
          <?php
          // if (!empty($categories)) {
          foreach ($categories as $category) {
          ?>
          <option value="<?php echo $category->id_category ?>"><?php echo $category->name; ?></option>
          <?php }?>
      </select>
      
      <?php
        if(!empty($selectedTags_err)){
        ?>
        <span class="text-red-700">*<?php echo $selectedTags_err; ?></span>
        <?php } ?> 
      
      <div class="title bg-gray-100 border border-gray-300 p-1 outline-none">
        <input type="text"   placeholder="Search" class="bg-gray-100 rounded  focus:outline-none border-b w-full pb-2 py-2 px-3 placeholder-gray-500" style="width: 35rem;">
        
        <div class="absolute max-h-40  z-10 mt-2 bg-white border border-gray-300 rounded-md shadow-lg  hidden"  id="dropdownContent">
            <?php
            if (!empty($tags)) {
            foreach ($tags as $tag) {
            ?>
                <div class="title bg-gray-100 border p-2 border-gray-300 w-full outline-none">
                    <label><input type="checkbox" name="selected_tags[]" multiple value="<?php echo $tag->id_tag; ?>" class="mr-5"><?php echo $tag->name; ?></label>
                </div>
            <?php
            }
            } else {
                echo "tags indisponibles";
            }
            ?> 
          </div>
        <button type="button" onclick="toggleDropdown()">^_^</button>
      </div>
      
      <input type="hidden" name="myId" value="<?php echo$_SESSION['id_user']; ?>" >
      
      <!-- buttons -->
      <div class="buttons pt-5 gap-2 flex justify-end">
      <button type="submit" name="submit" class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Save</button>
        <a href="<?= PATH ?>index.php?page=wikis"><div class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Cancel</div></a>
      </div>
      </div>

    </form>
 


<!-- end add wiki -->



<!-- display my wikis -->

<div class="min-h-screen flex flex-col items-center">
<div class="heading text-center font-bold text-2xl pt-10 text-yellow-400">My Wikis</div>

<div class="flex text-center pl-36 gap-10 flex-wrap mt-10">

    <?php
    if (!empty($wikis)) {
    foreach ($wikis as $wiki) {
    ?>

    <div class="max-w-sm bg-white px-6 pt-6 flex flex-col justify-between pb-2 rounded-xl shadow-lg transform transition duration-500">
      <h3 class="mb-3 text-xl font-bold text-indigo-600"><?php echo $wiki->title ; ?></h3>
      <img class="w-full rounded-xl h-72 w-72" src="./assets/image/wikis/<?php echo $wiki->photo ; ?>" />
      <div class="mt-4 flex gap-2">
        <a href="<?= PATH ?>index.php?page=edit_wiki&id=<?php echo $wiki->id_wiki ; ?>" class="inline-block w-1/2 rounded-md bg-blue-300 px-6 py-2 font-semibold text-gray-100 shadow-md duration-75 hover:bg-green-300"><button type="submit" name="modifier" >Modifier</button></a>
        <form action="<?= PATH ?>index.php?page=wikis" method="post">
          <input type="hidden" name="wikiId" value="<?php echo $wiki->id_wiki ; ?>">
          <button type="submit" name="supprimer" class="inline-block rounded-md bg-blue-300 px-10 py-2 font-semibold text-red-100 shadow-md duration-75 hover:bg-red-300">Supprimer</button>
        </form>
      </div>
      <div class="">
        <div class="flex space-x-1 items-center">
          <button class="mt-2 text-xl w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg">Voir plus -></button>
        </div>
      </div>
    </div>

    <?php }}
    else{?>
      <div class="max-w-sm bg-white px-6 pt-6 pb-2 rounded-xl shadow-lg transform transition duration-500">
      <h3 class="mb-3 text-xl font-bold text-indigo-600">Aucune Wiki trouvée</h3>
      </div>
    <?php }
      ?>

    
  
</div>
</div>

<!--end display my wikis -->

<?php 
}
?>

  <!--end user-->



  <!--admin wikis-->

<?php
if(isset($_SESSION['role']) && $_SESSION['role'] === 1)
{
?>

<!-- display all wikis -->

<div class="min-h-screen flex flex-col items-center">
<div class="heading text-center font-bold text-2xl pt-10 text-yellow-400">All Wikis</div>

<div class="flex text-center pl-36 gap-10 flex-wrap mt-10">

    <?php
    if (!empty($wikis)) {
    foreach ($wikis as $wiki) {
    ?>

    <div class="max-w-sm bg-white px-6 pt-6 flex flex-col justify-between pb-2 rounded-xl shadow-lg transform transition duration-500">
      <h3 class="mb-3 text-xl font-bold text-indigo-600"><?php echo $wiki->title ; ?></h3>
      <img class="w-full rounded-xl h-72 w-72" src="./assets/image/wikis/<?php echo $wiki->photo ; ?>" />
      <div class="mt-4  gap-2">
        <form action="<?= PATH ?>index.php?page=wikis" method="post">
          <input type="hidden" name="wikiId" value="<?php echo $wiki->id_wiki ; ?>">
        <?php if($wiki->archive === 0){ ?>
          <button type="submit" id="archiverBtn" name="archiver" class="inline-block w-full rounded-md bg-blue-200 px-10 py-2 font-semibold text-black shadow-md duration-75 " onclick="toggleArchiver()">Archiver</button>
        <?php } ?>
        <?php if($wiki->archive === 1){ ?>
          <button type="submit" id="archiverBtn" name="desarchiver" class="inline-block w-full rounded-md bg-green-200 px-10 py-2 font-semibold text-black shadow-md duration-75 " onclick="toggleArchiver()">Désarchiver</button>
        <?php } ?>
        </form>
      </div>
      <div class="">
        <div class="flex space-x-1 items-center">
          <button class="mt-2 text-xl w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg">Voir plus -></button>
        </div>
      </div>
    </div>

    <?php }}
    else{?>
      <div class="max-w-sm bg-white px-6 pt-6 pb-2 rounded-xl shadow-lg transform transition duration-500">
      <h3 class="mb-3 text-xl font-bold text-indigo-600">Aucune Wiki trouvée</h3>
      </div>
    <?php }
      ?>

    
  
</div>
</div>

<!--end display all wikis -->

<?php 
}
?>
  
  <!--end admin-->



<script>
  function toggleDropdown()
  {
        var dropdown = document.getElementById('dropdownContent');
        dropdown.classList.toggle('hidden');
  }


  // function toggleArchiver() 
  // {
  //   var archiverBtn = document.getElementById('archiverBtn');

  //   if (archiverBtn.textContent === 'Archiver') {
  //       // Action à effectuer lors de l'archivage
  //       archiverBtn.textContent = 'Désarchiver';
  //       archiverBtn.name = 'desarchiver';
  //       archiverBtn.classList.remove('bg-blue-200');
  //       archiverBtn.classList.add('bg-green-200');
  //   } else {
  //       // Action à effectuer lors du désarchivage
  //       archiverBtn.textContent = 'Archiver';
  //       archiverBtn.name = 'archiver';
  //       archiverBtn.classList.remove('bg-green-200');
  //       archiverBtn.classList.add('bg-blue-200');
  //   }
  // }

</script>