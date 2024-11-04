<?php
   session_start();

   $fb = new Facebook\Facebook([
      'app_id' => $app_id,
      'app_secret' => $app_secret,
      'default_graph_version' => 'v13.0',
   ]);

   $helper = $fb->getRedirectLoginHelper();
   $accessToken = $helper->getAccessToken();

   if ($accessToken) {
      // User is logged in, handle their data
      $user = $fb->get('/me', ['fields' => 'id,name,email']);
      $_SESSION['user_data'] = $user;
      header('Location: profile.php');
   } else {
      // User is not logged in, redirect to login page
      $loginUrl = $helper->getLoginUrl(['scope' => 'public_profile,email']);
      header('Location: ' . $loginUrl);
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/1cf483120b.js" crossorigin="anonymous"></script>
    <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0&appId=YOUR_APP_ID&autoLogApp=true" async defer></script>
    
    <script src="main.js" defer></script>
    <!--by including axios as CDN we don't have to include import in our main.js-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> <!-- Include Axios -->
    <script src="https://www.gstatic.com/firebasejs/8.2.8/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.8/firebase-auth.js" id="signInWithEmailAndPassword"></script>   
    <title>Login Form</title>
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
              
              <form class="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                
                    
                    
                    <div class="login__field"> 
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="User name / Email" name="username" required>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" name="username" required>
                    </div>
                    <button class="button login__submit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
                <div class="social-login">
                    <h3>log in via</h3>
                    <div class="social-icons">
                      <a href="https://www.instagram.com/accounts/login/" class="social-login__icon fab fa-instagram"></a>
                        <a href="https://www.facebook.com/login/" class="social-login__icon fab fa-facebook"></a>
                        <a href="https://twitter.com/login" class="social-login__icon fab fa-twitter"></a>
                        <a href="https://reddit.com/login" class="social-login__icon fab fa-reddit"></a>
                    </div>
                </div>
            </div>
            
            
            
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
    

<!--browser-sync-->
    <script id="__bs_script__">//<![CDATA[
        (function() {
          try {
            var script = document.createElement('script');
            if ('async') {
              script.async = true;
            }
            script.src = 'http://HOST:3002/browser-sync/browser-sync-client.js?v=3.0.2'.replace("HOST", location.hostname);
            if (document.body) {
              document.body.appendChild(script);
            } else if (document.head) {
              document.head.appendChild(script);
            }
          } catch (e) {
            console.error("Browsersync: could not append script tag", e);
          }
        })()
      //]]></script>
</body>


</html>