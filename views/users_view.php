<?php
if(!isset($_SESSION['id_user'])){
    header("location:index.php?page=login");
}
?>
    
    <h1 class="text-4xl text-yellow-400 py-4 text-center font-bold">Ajouter des admins</h1>

    <!-- form pour add admin -->
    <form action="<?= PATH ?>index.php?page=users" method="post" enctype="multipart/form-data">
    <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
        <div>
            <div class="mb-5">
                <label for="username" class="block mb-2 font-bold text-gray-600 uppercase">username</label>
                <input type="text" id="username" name="username" placeholder="UserName." class="border border-gray-300 shadow p-3 w-full rounded " required>
            </div>
            <div class="mb-5">
                <label for="photo" class="block mb-2 font-bold text-gray-600 uppercase">photo</label>
                <input type="file" id="photo" name="photo" placeholder="photo." class="border border-gray-300 shadow p-3 w-full rounded " required>
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 font-bold text-gray-600 uppercase">Email</label>
                <input type="email" id="email" name="email" placeholder="Email." class="border border-gray-300 shadow p-3 w-full rounded " required>
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 font-bold text-gray-600 uppercase">password</label>
                <input type="password" id="password" name="password" placeholder="password." class="border border-gray-300 shadow p-3 w-full rounded " required>
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


    <!-- admin -->
    <div class="pl-80 flex">
        <h1 class="text-3xl">
            Admin
        </h1>
    </div>
    <div class="px-3 py-4 flex justify-center">
        <table class="w-2/3	 text-md bg-white shadow-md rounded mb-4">
            <tbody>
            <tr class="border-b">
            <th class="text-left p-3 px-5">Photo de profil</th>
                <th class="text-left p-3 px-5">User Name</th>
                <th class="text-left p-3 px-5">Email</th>
                <th></th>
            </tr>
            <?php
                if (!empty($users)) {
                foreach ($users as $user) {
                if($user->role===1){

            ?>
            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                <td class="p-3 px-5 "><img class="h-24 w-24" src="./assets/image/users/<?php echo $user->photo ;?>" alt=""></td>
                <td class="p-3 px-5"><?php echo $user->username ;?></td>
                <td class="p-3 px-5"><?php echo $user->email ;?></td>
                <td class="p-3 px-5 flex justify-end">
                <td class="p-3 px-5 flex justify-end">
                <form action="<?= PATH ?>index.php?page=users" method="post">
                    <input type="hidden" name="userId" value="<?php echo $user->id_user ; ?>">
                    <button type="submit" name="supprimer" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Supprimer</button>
                </form> 
                </td>
                </td>
            </tr>
            <?php
            }}
            }else{?>
                <td class="text-red-700 p-3 px-5"><?php echo 'Aucun Admin trouvé';?></td>
            <?php }
            ?>
            </tbody>
        </table>
    </div>
    <!--  -->

    <!-- user -->
    <div class="pl-80 flex">
        <h1 class="text-3xl">
            Utilisateur
        </h1>
    </div>
    <div class="px-3 py-4 flex justify-center">
        <table class="w-2/3	 text-md bg-white shadow-md rounded mb-4">
            <tbody>
            <tr class="border-b">
            <th class="text-left p-3 px-5">Photo de profil</th>
                <th class="text-left p-3 px-5">User Name</th>
                <th class="text-left p-3 px-5">Email</th>
                <th></th>
            </tr>
            <?php
                if (!empty($users)) {
                foreach ($users as $user) {
                if($user->role===0){
            ?>
            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                <td class="p-3 px-5 "><img class="h-24 w-24" src="./assets/image/users/<?php echo $user->photo ;?>" alt=""></td>
                <td class="p-3 px-5"><?php echo $user->username ;?></td>
                <td class="p-3 px-5"><?php echo $user->email ;?></td>
                <td class="p-3 px-5 flex justify-end">
                <td class="p-3 px-5 flex justify-end">

                <form action="<?= PATH ?>index.php?page=users" method="post">
                    <input type="hidden" name="userId" value="<?php echo $user->id_user ; ?>">
                    <button type="submit" name="supprimer" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Supprimer</button>
                </form> 
                </td>
                </td>
            </tr>
            <?php
                }
                }}else{?>
                <td class="text-red-700 p-3 px-5"><?php echo 'Aucun Utilisateur trouvé';?></td>
                <?php }
            ?>

            </tbody>
        </table>
    </div>
    <!--  -->

