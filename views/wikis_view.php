<?php
if(!isset($_SESSION['id_user'])){
    header("location:index.php?page=login");
}
?>

<!-- add wiki -->

<div class="heading text-center font-bold text-2xl text-yellow-400">New Wiki</div>

  <form action="<?= PATH ?>index.php?page=wikis" method = "post" enctype="multipart/form-data">

    <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 gap-2 p-4 shadow-lg max-w-2xl">
      <input class="title bg-gray-100 border border-gray-300 p-2 outline-none" spellcheck="false" name="title" placeholder="Title" type="text">
      <input class="description bg-gray-100 px-3 h-40 border border-gray-300 outline-none" name="description" placeholder="Description of your wiki"/>
      <input class="title bg-gray-100 border p-3 border-gray-300 p-2 outline-none" spellcheck="false" name="photo" placeholder="photo" type="file">

      <select name="category" id="category" class="title bg-gray-100 border p-3 border-gray-300 p-2 outline-none">
          <option value="all" selected disabled>Category</option>
          <?php
          // if (!empty($categories)) {
          foreach ($categories as $category) {
          ?>
          <option value="<?php echo $category->id_category ?>"><?php echo $category->name; ?></option>
          <?php }?>
      </select>

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
        <!-- <boutton type="submit" name="submit" class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Post</boutton> -->
        <button type="submit" name="submit" class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Modifier</button>

      <!-- buttons -->
      <div class="buttons pt-5 flex justify-end">
        <a href="<?= PATH ?>index.php?page=wikis"><div class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Cancel</div></a>
      </div>
    </form>
</div>

<!-- end add wiki -->



<!-- display my wikis -->

<div class="min-h-screen bg-gray-100 flex flex-col items-center">
<div class="heading text-center font-bold text-2xl pt-10 text-yellow-400">My Wikis</div>

<div class="flex pl-36 text-center gap-10 flex-wrap mt-10">

    <?php
    if (!empty($wikis)) {
    foreach ($wikis as $wiki) {
    ?>

    <div class="max-w-sm bg-white px-6 pt-6 pb-2 rounded-xl shadow-lg transform transition duration-500">
      <h3 class="mb-3 text-xl font-bold text-indigo-600"><?php echo $wiki->title ; ?></h3>
        <img class="w-full rounded-xl" src="./assets/image/users/<?php echo $wiki->photo ; ?>" />
      <h1 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer"><?php echo $wiki->description ; ?></h1>
      <div class="my-4">
        <div class="flex space-x-1 items-center">
        <button class="mt-4 text-xl w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg">Voir plus -></button>
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




<script>
  function toggleDropdown() {
        var dropdown = document.getElementById('dropdownContent');
        dropdown.classList.toggle('hidden');
    }
</script>