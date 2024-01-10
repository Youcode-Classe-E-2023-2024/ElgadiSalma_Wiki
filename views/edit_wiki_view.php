<?php
if(!isset($_SESSION['id_user'])){
    header("location:index.php?page=login");
}

?>

<div class="heading text-center font-bold text-2xl pt-10 text-yellow-400">Edit Wiki</div>

<div class="flex items-center justify-center p-12">
<div class="w-2/3">
  <div class="mx-auto w-full max-w-[550px]">
    <form action="<?= PATH ?>index.php?page=edit_wiki&id=<?php $id ?>" method="POST" enctype="multipart/form-data">
      <div class="-mx-3 flex flex-wrap">
        <?php
        foreach ($wiki as $wikis) {
        ?>

        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
            <label for="titre" class="mb-3 block text-base font-medium text-[#07074D]" >
              Titre 
            </label>
            <input type="text" name="title" placeholder="Titre" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" value="<?php echo $wikis->title ?>">
          </div>
        </div>
        
        <div class="w-full px-3 sm:w-1/2">
        <div class="mb-5">
        <label for="Photo" class="mb-3 block text-base font-medium text-[#07074D]" >
              Photo 
            </label>
            <input type="file" name="photo" placeholder="Photo" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" value="<?php echo $wikis->photo ?>">
          </div>
        </div>
        </div>

      <div class="mb-5">
        <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]" >
        Description
        </label>
        <input
          type="text"
          name="description"
          placeholder="Description"
          class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          value="<?php echo $wikis->description ?>"
        />
      </div>

      <!-- <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
            <label
              for="tag"
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
            Ajouter Tag
            </label>
            <input type="text" placeholder="Tags" class="w-full rounded-md border-2 border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" onclick="toggleDropdown()">
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
        </div>
          </div>


        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5 ">
            <label
              for="text"
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
              Category
            </label>
            <div class="border-2 rounded-md">
            <select name="category" id="category" class="w-full rounded-md border-2 border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
                <option value="all" selected disabled>Category</option>
                <?php
                // if (!empty($categories)) {
                foreach ($categories as $category) {
                ?>
                <option value="<?php echo $category->id_category ?>"><?php echo $category->name; ?></option>
                <?php }?>
            </select>
          </div>
          </div>
        </div>
      </div> -->
      <!-- </div>
      <div> -->
        <?php
        if(!empty($title_err)){
            echo $title_err;
        }
        if(!empty($description_err)){
            echo $description_err;
        }
        if(!empty($photo_err)){
            echo $photo_err;
        }
        ?>
        <button type="submit" name="submit" class="hover:shadow-form rounded-md bg-purple-500 py-3 px-8 text-center text-base font-semibold text-white outline-none">
          Submit
        </button>
        <?php }
        ?>
      </div>
    </form>
  </div>
  </div>
  
  
  
<script>
function toggleDropdown() {
    var dropdown = document.getElementById('dropdownContent');
    dropdown.classList.toggle('hidden');
}
</script>
