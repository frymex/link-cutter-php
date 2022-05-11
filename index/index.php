<?php
  include('geo/get_country_code.php') ;
   if ($country_сode === 'RU') {
      die('Not available');
   }
   if ($country_сode === 'BY') {
      die('Not available');
   }
?>


<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>czqv</title>
      <meta name="google" content="notranslate">
      <meta name="theme-color" content="#303030">
      <meta name="yandex" content="notranslate">
      <meta name="bing" content="notranslate">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta meta name="viewport" content="width=device-width, user-scalable=no" />
      <link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <style type="text/css">
         @import url('css2.css');
         body, input{
         background-color: #303030;
         color: rgb(214,214,214);
         font-family: 'Comfortaa', cursive;

         }
         img.a {
        position: absolute;
    top: 25%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%)
}
.footer {
  text-align: center;
  margin-top: 10px;
  background: #00000040;
  border-radius: 20px;
  padding: 20px;
  box-shadow: 0 0 5px #00000020;
  font-family: Mont;
}
      </style>
   </head>
   <body class="notranslate" id='*'>
      <nav class="navbar navbar-dark" style="background: rgb(45,45,45);">
         <div class="container-fluid">
            <a class="navbar-brand" id="tat" style="cursor: pointer;">czqv</a>
            <ul class="nav justify-content-end">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" id="gh" style="cursor: pointer;">GitHub</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" id="jav" style="cursor: pointer;">API Docs</a>
               </li>

            </ul>
         </div>
      </nav>
            <div id="p">

      <center>

         <div class="px-4 py-5 my-5 text-center">
            <h1  style="">URL shortener <h1 style="color: rgb(214,214,214);"></h1></h1>
            <div class="col-lg-6 mx-auto ">
               <form class="p-5 rounded-3 form" method="post">
                  <div class="mb-3">
                     <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
                     <input type="url" style="background: #303030;color: white;" autocomplete="off" class="form-control" id="url"  name="url" placeholder="Введите URL" required>
                     <div class="invalid-feedback">
                        !-! Server by t.me/frymex !-!
                     </div>
                  </div>
                  <button type="submit" class="w-100 btn btn-lg btn-outline-primary"  >Отправить</button>
               </form>
            
            <code style="background: #404040;color: #e677e4;">
            <?php
               if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               	$db_name = 'db_name';
               	$db_user = 'db_user';
               	$db_host = 'db_host';
               	$db_password = 'db_password';
                  $url_ = 'url/';
               
               
               	$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
               
               	if (!$conn) {
               
               	    die("fail connect to database");
               
               	};
               
               	$sql = "SELECT link_id FROM links1 WHERE to_url = ".$_POST['url'];
               	$result = mysqli_query($conn, $sql);
               
               	function gen_password($length = 6)
               			{				
               				$chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP'; 
               				$size = strlen($chars) - 1; 
               				$password = ''; 
               				while($length--) {
               					$password .= $chars[random_int(0, $size)]; 
               				}
               				return $password;
               			};
               
               		$ip = $_SERVER['REMOTE_ADDR'];
               		$url = $_POST['url'];
               		$hash = gen_password(5);
               
               		$sql = "INSERT INTO links1
               		VALUES ('".$hash."', '".$url."', '".$ip."');";	
               
               		if (mysqli_query($conn, $sql)) {
               
               			echo $url_.$hash;
               			mysqli_close($conn);
               
               
               		} else {
               echo "Error: " . "<br>" . mysqli_error($conn);
               };
            
               
               
               
               
               	};
               
               ?>
            </code>
         </div>
         </div>
      </center>
   </div>
   <div id="error-not-founded" style="display: none;">
      <div class="px-4 py-5 my-5 text-center" style="top: 50%; left: 50%; right: 50%;">
      <center>
         <span><img oncontextmenu="return false;" ondrag="return false;" ondrop="return false;" width="200" height="200" loop="1" autoplay="true" class=""  src="019.gif" alt="No Info"><br><br></span>
         <span><code class="" style="color: rgb(214,214,214);top: 50%; left: 50%; right: 50%;">Мы не нашли информацию по <br> поводу этой страницы :/</code></span>
      </center>
   </div>

   </div>


      <script src="popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
      <script type="text/javascript">
         document.getElementById('jav').onclick = function(){
            document.getElementById('p').style.display = 'none';
            document.getElementById('error-not-founded').style.display = 'block';

         };
         document.getElementById('tat').onclick = function(){
            document.getElementById('error-not-founded').style.display = 'none';
            document.getElementById('p').style.display = 'block';
            

         };

         document.getElementById('gh').onclick = function(){
            window.open('https://github.com/frymex', 'GitHub');
         }

         document.getElementById('url').onchange = function(){


            if(this.value.includes('https://') != true) {
                if(this.value.includes('http://') != true) {
                  var url = 'https://' + this.value
                  this.value = url
                }
            }
         }

          if(this.value == 'https://') {
               document.getElementById('url').value = ''
            }



      </script>

   </body>
</html>