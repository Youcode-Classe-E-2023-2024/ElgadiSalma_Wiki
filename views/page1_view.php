<?php
if(!isset($_SESSION['id_user'])){
    header("location:index.php?page=login");
}
?>

<h1 class="text-4xl text-yellow-400  text-center font-bold">Your rooms</h1>
<!-- Container -->
  <!-- <div class="h-full  mx-24 flex flex-wrap items-start justify-center rounded-tl grid-flow-col auto-cols-max gap-4 ">
    
    <div class="w-96 h-60 rounded-lg flex-shrink-0 flex flex-col justify-around flex-grow bg-gray-400">
      <div class="mt-8 flex justify-center">
        <div>
            <p class="text-center text-4xl font-bold text-yellow-200 text-[#FE5401]">hhhhhhhhhhhh</p>
        </div>  
      </div>

      <div class="flex justify-center">
        <a href="index.php?page=chat&id=smiyt lpage m3a id" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Entrer
            <svg class="-mr-1 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>
      
    </div>

      <p class="text-center text-2xl font-extrabold text-[#FE5401]">Aucune room trouve</p>
    
  </div> -->