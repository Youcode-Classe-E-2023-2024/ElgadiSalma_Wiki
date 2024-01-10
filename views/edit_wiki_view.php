<?php
if(!isset($_SESSION['id_user'])){
    header("location:index.php?page=login");
}

?>

<div class="heading text-center font-bold text-2xl pt-10 text-yellow-400">Edit Wiki</div>

<div class="flex items-center justify-center p-12">
<div class="w-2/3">
  <div class="mx-auto w-full max-w-[550px]">
    <?php
    foreach ($wiki as $wikis) {
    ?>
    <form action="<?= PATH ?>index.php?page=edit_wiki&id=<?php echo $wikis->id_wiki ?>" method="POST" enctype="multipart/form-data">
      <div class="-mx-3 flex flex-wrap">
        <input type="hidden" name="id" value="<?php echo $wikis->id_wiki ?>">
        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
            <label for="titre" class="mb-3 block text-base font-medium text-[#07074D]" >
              Titre 
            </label>
            <input type="text" name="title" placeholder="Titre" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" value="<?php echo $wikis->title ?>">
        <?php
        if(!empty($title_err)){
        ?>
        <span class="text-red-700">*<?php echo $title_err; ?></span>
        <?php } ?>
        </div>
        </div>
        
        <div class="w-full px-3 sm:w-1/2">
        <div class="mb-5">
        <label for="Photo" class="mb-3 block text-base font-medium text-[#07074D]" >
              Photo 
            </label>
            <input type="file" name="photo" placeholder="Photo" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" value="<?php echo $wikis->photo ?>">
        <?php
        if(!empty($photo_err)){
        ?>
        <span class="text-red-700">*<?php echo $photo_err; ?></span>
        <?php } ?>
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
        <?php
        if(!empty($description_err)){
        ?>
        <span class="text-red-700">*<?php echo $description_err; ?></span>
        <?php } ?>
        </div>

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
