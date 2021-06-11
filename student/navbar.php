
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;900&family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet">

<style>html, body {
      margin: 0;
      padding: 0;
      width: 100%;
}

body {
      font-family: "Helvetica Neue",sans-serif;
      font-weight: lighter;
}

header {
      width: 100%;
      height: 35vh;
      background: linear-gradient(to right, #ff9966 , #ff5e62);
      background-size: cover;
}

.content {
      width: 94%;
      margin: 4em auto;
      font-size: 20px;
      line-height: 30px;
      text-align: justify;
}

.logo {
      line-height: 60px;
      position: fixed;
      float: left;
      margin: 16px 46px;
      color: #fff;
      font-weight: bold;
      font-size: 20px;
      letter-spacing: 2px;
}

.manipal-logo{
      height:50%;
      width:50%;
}

nav {
      position: fixed;
      width: 100%;
      line-height: 60px;
      z-index: 2;
}

nav ul {
      line-height: 60px;
      list-style: none;
      background: rgba(0, 0, 0, 0);
      overflow: hidden;
      color: #fff;
      padding: 0;
      text-align: right;
      margin: 0;
      padding-right: 40px;
      transition: 1s;
}

nav.black ul {
      background: linear-gradient(to right, #ff9966 , #ff5e62);
      opacity: 0.9;
}



nav ul li {
      display: inline-block;
      padding: 16px 40px;;
      position: relative;
}

nav ul li a {
      text-decoration: none;
      color: #fff;
      font-size: 16px;
      font-weight:700;
}

nav ul li a:hover{
      color:black;
}

.lor-status-nav{
 background-color:white;
 height:15px;
 width:15px;
 display:flex;
 justify-content:center;
 align-items:center;
 color:black;
 border-radius:50%;
 position: absolute;
 right:30px;
 top: 20px;
 font-weight:600;
 font-family: 'Montserrat', sans-serif;
 font-size:12px;
 animation: blink 1s ease infinite;
}

.notification:hover .lor-status-nav{
      animation:none;
      
}



@keyframes blink {
      100%{
            opacity: 0.2;
      }
}


.menu-icon {
      line-height: 60px;
      width: 100%;
      background: #000;
      text-align: right;
      box-sizing: border-box;
      padding: 15px 24px;
      cursor: pointer;
      color: #fff;
      display: none;
}

.main-nav-heading{
            text-align: center;
            color: #fff;
            padding-top:17.5vh;
            
      }

.nav-manipal{
      font-family: 'Montserrat', sans-serif;
      font-weight:700;
      font-size:3rem;
      line-height: 1.5;
      background: -webkit-linear-gradient(#C9D6FF, #EAEAEA);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
}




@media(max-width: 786px) {

      .logo {
            position: fixed;
            top: 0;
            margin-top: 16px;
      }

      nav ul {
            max-height: 0px;
            background: #000;
            overflow: scroll;
      }

      nav.black ul {
            background: #000;
      }

      .showing {
            max-height: 34em;
      }

      nav ul li {
            box-sizing: border-box;
            width: 100%;
            padding: 24px;
            text-align: center;
      }

      .menu-icon {
            display: block;
      }

      

}


</style>


<div class="wrapper">
         <header>
            <nav>
               <div class="menu-icon">
                  <i class="fa fa-bars fa-2x"></i>
               </div>
               <div class="logo">
                  <img class="manipal-logo" src="./img/logo.png" alt="">
               </div>
               <div class="menu">
                  <ul>
                     <li><a href="index.php">Home</a></li>
                     <li><a  href="lor-page.php"> Request LOR</a></li>
                     <li class="notification" ><div class="lor-status-nav">2</div> <a href="lor_status.php"> Check LOR Status</a></li>
                     <li><a href="#">Contact</a></li>
                     <li><a href="../logout.php">Logout</a></li>
                  </ul>
               </div>
            </nav>
            <div class="main-nav-heading" ><h1 class="nav-manipal">Manipal University</h1></div>
            
         </header>
         
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <script>$(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
      });

      // Scrolling Effect

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
            }

            else {
                  $('nav').removeClass('black');
            }
      })</script>




