<?php
if(!isset($_SESSION['id_user'])){
    header("location:index.php?page=login");
}
?>
    
    <div class="flex mx-auto items-center justify-center  shadow-lg mt-40 mx-8 ">
    <form class="w-full max-w-2xl bg-gray-100 rounded-lg px-4 pt-2" method="post" action="index.php?page=room">
        <div class="flex flex-wrap -mx-3 mb-6 justify-center ">
            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new room</h2>
        <div class="w-full md:w-full px-3 mb-2 mt-2">
            <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="title" placeholder='Type Title' required></textarea>
        </div>
        <div class="flex">
            <div class="w-full md:w-full px-3 mb-2 mt-2">
                <input type="text"   placeholder="Search" class="bg-gray-100 rounded border border-gray-400 focus:outline-none border-b w-full pb-2 py-2 px-3 font-medium placeholder-gray-700" style="width: 35rem;">
            <div class="absolute max-h-40  z-10 mt-2 bg-white border border-gray-300 rounded-md shadow-lg  hidden"  id="dropdownContent">
            <?php
            if (!empty($amis)) {
            foreach ($amis as $ami) {
            ?>
                <div class="p-2">
                    <label><input type="checkbox" name="selected_users[]" multiple value="<?php echo $ami['id_user']; ?>" class="mr-2"><?php echo $ami['username']; ?></label>
                </div>
            <?php
            }
            } else {
                echo "amis indisponibles";
            }
            ?>
            
            </div>
            </div>
            <button type="button" onclick="toggleDropdown()">^_^</button>
        </div>

        <div class="w-full md:w-full flex justify-center py-2 items-start md:w-full px-3">
            <div class="-mr-1">  
               <button type='submit' name="addRoom" class="bg-blue-300 text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">Add Room</button>
            </div>
        </div>
        
      </form>
   </div>

<script>
    const searchInput = document.getElementById('searchInput');
    const dropdownContent = document.getElementById('dropdownContent');
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    searchInput.addEventListener('input', filterOptions);

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSelection);
    });

    function filterOptions() {
        const searchTerm = searchInput.value.toLowerCase();

        Array.from(dropdownContent.children).forEach(option => {
            const optionText = option.textContent.toLowerCase();
            option.style.display = optionText.includes(searchTerm) ? 'block' : 'none';
        });
    }

    function updateSelection() {
        const selectedOptions = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

        // Display the selected options (customize based on your needs)
        console.log('Selected Options:', selectedOptions);
    }
    function toggleDropdown() {
        var dropdown = document.getElementById('dropdownContent');
        dropdown.classList.toggle('hidden');
    }
    function toggle() {
        var dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    }
</script>