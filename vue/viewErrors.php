<?php
if(!empty($errors)){
    echo '<div  class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert" > <p class="error-messege" >';
    foreach ($errors as $error)
        echo $error . '<br>';
    echo  '</p></div>';
}