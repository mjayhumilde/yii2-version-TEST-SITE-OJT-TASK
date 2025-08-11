 <?php

    /** @var yii\web\View $this */

    use yii\helpers\Html;
    use yii\helpers\Url;

    $this->title = 'Login';
    $this->params['breadcrumbs'][] = $this->title;
    ?>
 <div class="container">
     <div class="min-vh-100 d-flex justify-content-center align-items-center">
         <div class="shadow-lg  p-5  text-muted"
             style="background-color: rgb(249, 249, 249); max-width: 900px;">
             <div class="w-100 px-2 px-md-5">
                 <div class="text-center mb-4">
                     <h4 class="text-black">Login</h4>
                 </div>

                 <div class="row row-cols-1 g-2 mb-2 ">
                     <div class="col">
                         <input type="email" placeholder="Your Email*" class="form-control p-2" />
                     </div>
                     <div class="col">
                         <input type="password" placeholder="Your Password*" class="form-control p-2" />
                     </div>
                 </div>
                 <a class="text-success fw-bold text-decoration-none">Forgot Password?</a>


                 <div class="text-center mt-4">
                     <a href="home.html">
                         <button class="btn btn-success px-5 py-2">Login</button>
                     </a>
                 </div>
             </div>
         </div>
     </div>
 </div>