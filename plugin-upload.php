<?php 

/* 

* Plugin Name: Upload Arquivo 

* Plugin URI: http://exemplo.com 

* Description:  

  

*/      

if (! defined ( 'ABSPATH' )){​​​​​ 

     exit ; 

}​​​​​ 

if (!  function_exists ( 'upload_arquivo' )){​​​​​ 

  function   upload_arquivo (){​​​​​ 

         add_menu_page ( 'Forms' , 'Upload Arquivo' , 'manage_options' , 'Ale-admin-menu' , 'upload_arquivo_main' , 'dashicons-cart' , 1 ); 

    }​​​​​ 

     add_action ( 'admin_menu' , 'upload_arquivo' ); 

     function   upload_arquivo_main (){​​​​​ 

     echo ' 

    <form method="post" enctype="multipart/form-data" > 

        <input type="file" name="file" required /> 

        <input type="submit" name="upload_file" value="enviar"> 

    </form> 

    <style>#wpbody-content{​​​​​background:#fff;}​​​​​ </style> 

    ' ; 

  

     if  (  isset ( $_POST [ 'upload_file' ]) ) {​​​​​ 

         $upload_dir  =  wp_upload_dir (); 

         

         if  ( !  empty (  $upload_dir [ 'basedir' ] ) ) {​​​​​ 

         $user_dirname  =  $upload_dir [ 'basedir' ] . '/product-images' ; 

         if  ( !  file_exists (  $user_dirname  ) ) {​​​​​ 

         wp_mkdir_p (  $user_dirname  ); 

        }​​​​​ 

         

         $filename  =  wp_unique_filename (  $user_dirname ,  $_FILES [ 'file' ][ 'name' ] ); 

         move_uploaded_file ( $_FILES [ 'file' ][ 'tmp_name' ],  $user_dirname   . '/' .   $filename ); 

         

        }​​​​​ 

         unset ( $_POST [ "upload_file" ]); 

         ? > 

        < div   id = "mostrar" >   <?php   echo   $user_dirname   . '/' .   $filename    ? > </ div > 

        <?php 

      }​​​​​ 

    }​​​​​ 

}​​​​​ 

  ? >