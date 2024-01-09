<?php
if(!isset($_SESSION['id_user'])){
    header("location:index.php?page=login");
}
?>

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
        <button type="submit" name="submit" class="inline-block rounded-md bg-green-500 px-6 py-2 font-semibold text-green-100 shadow-md duration-75 hover:bg-green-400">Modifier</button>

      <!-- buttons -->
      <div class="buttons pt-5 flex justify-end">
        <a href="<?= PATH ?>index.php?page=wikis"><div class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Cancel</div></a>
      </div>
    </form>
</div>



<script>
  function toggleDropdown() {
        var dropdown = document.getElementById('dropdownContent');
        dropdown.classList.toggle('hidden');
    }
</script>