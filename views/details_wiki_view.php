<?php
if(!isset($_SESSION['id_user'])){
    header("location:index.php?page=login");
}

?>

<main class="mt-5 justify-center">
    <?php
    foreach ($wiki as $wikis) {
    ?>
    <div class="flex flex-wrap w-full gap-10 justify-center">
        <div class="flex w-2/3 justify-between">
            <?php
            foreach ($users as $user) {
            ?>
            <div class="flex gap-2 ">
                <img src="<?= PATH ?>assets/image/users/<?php echo $user->photo ?>"
                    class="h-10 w-10 rounded-full object-cover" />
                <div>
                    <p class="font-semibold text-gray-800 text-sm"> <?php echo $user->username ?> </p>
                    <?php $formattedDate = date("d/m/Y", strtotime($wikis->created_at));?>
                    <p class="font-semibold text-gray-400 text-xs"> <?php echo $formattedDate ?> </p>
                </div>
            </div>
            <?php }
            ?>
            <?php
            foreach ($categories as $category) {
            ?>
            <div class="">
                <a href="#" class="px-4 py-1 bg-purple-400 text-white inline-flex items-center justify-center "><?php echo $category->name ?></a>   
            </div>
            <?php }
            ?>
        </div>

        <img class="w-2/3 h-80" src="<?= PATH ?>assets/image/wikis/<?php echo $wikis->photo ?>" />

        <div class="w-2/3 flex flex-col gap-5 text-gray-700">
            <div class="flex gap-2 justify_end">
            <?php
            foreach ($tags as $tag) {
            ?>
                <a href="#" class="px-4 py-1 bg-gray-800 rounded-2xl text-white inline-flex items-center justify-center "><?php echo $tag->name ?></a>   
            <?php }
            ?>
            </div>
            <h2 class="text-3xl font-semibold text-yellow-500"><?php echo $wikis->title ?></h2>
        </div>

        <div class="flex flex-col w-full items-center justify-center">
        <div class="text-gray-600 w-2/3 text-lg  ">
            <p class=""><?php echo $wikis->description ?></p>
        </div>
        </div>
    </div>
      <?php }
        ?>
    </main>
