<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<h1>Devstagram</h1>

<p>Devstagram en una plataforma inspirada en la red solcial Instagram, donde personas que se dediquen al desarrollo de sofware pueden compartir publicaiones diarias.</p>

<hr>
<hr>
User para pruebas:
correo@correo.com
correo3@correo.com
prueba@gmail.com

password: 123456
<hr>
<hr>

<h2>La aplicación Web posee las siguentes características:</h2>

<ul>
  <li>
    Panel de autenticación para el Login:
    <img src="./readmeFiles/login.jpg" alt="login" >
  </li>

  <hr>

  <li>
    Panel para crear cuenta:
    <img src="./readmeFiles/register.jpg" alt="register" >
  </li>
  
  <hr>

  <li>
    Página de inicio donde se muentran las publicaiones de las personas que sigues:
    <br>
    <img src="./readmeFiles/home.jpg" alt="home" >
  </li>

  <hr>

  <li>
    Página para creación de tus publicaciones:
    <img src="./readmeFiles/create.jpg" alt="create" >
    
    Para este apartado se utilizó la librería de Dropzone, la cual permite realizar la subida de archivos de manera más interactiva y visual.
    
  </li>

  <hr>

  <li>
    Página de perfil personal:
    <img src="./readmeFiles/profile.jpg" alt="profile" >
    
    En este apartado la persona puede agregar una foto de perfil y ver todas las publicaiones que ha realizado

  </li>

  <hr>

  <li>
    Página para editar perfil personal:
    <img src="./readmeFiles/edit.jpg" alt="edit" >
    
    En este apartado la persona puede agregar una foto de perfil, cambiar el password e email
  </li>

  <hr>

  <li>
    Página para ver una publicación:
    <img src="./readmeFiles/post.jpg" alt="post" >

    En este apartado, las personas pueden a detalla la publicación seleccionada, además, pueden agragar comentarios y dar likes, teniendo validaciones para que solo las personas autenticadas puedan hacerlo.
    
    A los autores de los comentarios les aparecerá la opción de eliminar sus comentarios.

    Para estos apartados se hizo uso de LiveWire para realizar las peticiones y actualizacion de los valores en tiempo real y sin necesidad de recargar la página.
  </li>
  
</ul>

<hr>
<hr>

<h2>Base de datos:</h2>

<p>La base de datos utilizada fue SQL y se usa el ORM Eloquent de Laravel para interactuar esta</p>

<p>A continuación el diagrama de realacines de las tablas utilizadas para la aplicación:</p>


<img src="./readmeFiles/ER diagram.jpg">





<hr>
<hr>
<hr>


en el futuro pienso seguir agregando nuevas características, como  verificacion de email, buscadores y notificaciones push