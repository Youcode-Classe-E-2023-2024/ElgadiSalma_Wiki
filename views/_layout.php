<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= ucfirst($page) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <script src="<?= PATH ?>assets/js/main.js"></script>
    <link rel="stylesheet" href="<?= PATH ?>assets/css/style.css">
    
</head>
<body>

     <!-- user-->

    <?php
    // if(isset($_SESSION['id_user'])){

    if(isset($_SESSION['role']) && $_SESSION['role'] === 0)
    {
    ?>
<!-- component -->
    <div class="fixed w-full bg-white flex overflow-hidden" style="height: 200vh;"> 

    <!-- Sidebar -->
    <aside class="fixed h-full w-16 flex flex-col space-y-10 pt-20 items-center z-10	 justify-center bg-gray-800 text-white">

    <!-- Home -->
        <a href="<?= PATH ?>index.php?page=page1">
            <div class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
              </svg>
            </div>
        </a>
        
        <!-- friend -->
        <a href="index.php?page=friend">
           <div class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
        </div> 
        </a>

        <!-- Add friends -->
        <a href="<?= PATH ?>index.php?page=add_friend">
        <div class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
        </div> 
        </a>

        <!-- Add room -->
        <a href="<?= PATH ?>index.php?page=room">
          <div class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
              <img src="<?= PATH ?>assets/image/img/room.png" alt="">
            </div>  
        </a>
        

        <!-- Configuration -->
        <a href="#">
        <div class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
        </div>
        </a>
        

        <div class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
        
        <form action="index.php?page=page1" method="POST">
        <button type="submit" name="logout"><img src="<?= PATH ?>assets/image/img/logout.png" alt=""></button>
        </form>
        </div>

    </aside>

    <div class="w-full fixed h-full flex flex-col justify-between"  style="height: 200vh;">
    <!-- Header -->
    <header class="fixed h-16 w-full flex items-center justify-end px-5 space-x-10 bg-gray-800">
      <!-- Informação -->
      <div class="flex flex-shrink-0 items-center space-x-4 text-white">
        
        <!-- Texto -->
        <div class="flex flex-col items-end ">
          <!-- Nome -->
          <div class="text-md font-medium "><?php echo$_SESSION['username']; ?></div>
          <!-- Título -->
          <div class="text-sm font-regular">Utilisateur</div>
        </div>
        
        <!-- Foto -->
        <div class="h-10 w-10 rounded-full cursor-pointer bg-gray-200 border-2 border-blue-400"></div>
      </div>
    </header>
    

    
    <main class="max-w-full ml-34 h-full flex flex-col gap-5 py-24 relative overflow-y-hidden">
    <?php include_once 'views/' . $page . '_view.php'; ?>
    </main>
    </div>
    <?php 
    }
    ?>
     <!--end user-->


 <!-- admin-->
    <?php
    if(isset($_SESSION['role']) && $_SESSION['role'] === 1)
    {
    ?>
    <!-- component -->
    <div class="w-full bg-white flex overflow-hidden"> 

    <!-- Sidebar -->
    <aside class="fixed h-full w-16 flex flex-col space-y-10 pt-20 items-center z-10	 justify-center bg-gray-800 text-white">

    <!-- Home -->
        <a href="<?= PATH ?>index.php?page=page1">
            <div class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
              </svg>
            </div>
        </a>
        

        <!-- Add friends -->
        <a href="<?= PATH ?>index.php?page=users">
        <div class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
        </div> 
        </a>

        <!-- Add room -->
        <a href="<?= PATH ?>index.php?page=room">
          <div class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
              <img src="<?= PATH ?>assets/image/img/room.png" alt="">
            </div>  
        </a>
        

        <!-- Configuration -->
        <a href="#">
        <div class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M15 5V7M15 11V13M15 17V19M5 5C3.89543 5 3 5.89543 3 7V10C4.10457 10 5 10.8954 5 12C5 13.1046 4.10457 14 3 14V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V14C19.8954 14 19 13.1046 19 12C19 10.8954 19.8954 10 21 10V7C21 5.89543 20.1046 5 19 5H5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
      </svg>
        </div>
        </a>
        

        <div class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
        
        <form action="index.php?page=page1" method="POST">
        <button type="submit" name="logout"><img src="<?= PATH ?>assets/image/img/logout.png" alt=""></button>
        </form>
        </div>

    </aside>

    <div class="w-full h-full flex flex-col justify-between">
    <!-- Header -->
    <header class="fixed z-96 h-16 w-full flex items-center justify-end px-5 space-x-10 bg-gray-800">
      <!-- Informação -->
      <div class="flex flex-shrink-0 items-center space-x-4 text-white">
        
        <!-- Texto -->
        <div class="flex flex-col items-end ">
          <!-- Nome -->
          <div class="text-md font-medium "><?php echo$_SESSION['username']; ?></div>
          <!-- Título -->
          <div class="text-sm font-regular">Admin</div>
        </div>
        
        <!-- Foto -->
        <div class="h-10 w-10 rounded-full cursor-pointer border-2 border-blue-400"><img src="./assets/image/users/<?php echo $_SESSION ['photo']; ?>"></div>
      </div>
    </header>
    </div>
    </div>

    <main class=" max-w-full ml-34 h-full flex flex-col gap-5 py-24 overflow-y-hidden">
    <?php include_once 'views/' . $page . '_view.php'; ?>
    </main>
    <?php  
    } 
    ?>
     <!-- end admin-->



    <?php
        if(!isset($_SESSION['id_user']))
        {
    ?>

    <main>
        <?php include_once 'views/' . $page . '_view.php'; ?>
    </main>

    <?php 
    }
    ?>
    </div>

</body>
</html>