 <?php

    /** @var yii\web\View $this */

    use yii\helpers\Html;
    use yii\helpers\Url;

    $this->title = 'Register';
    $this->params['breadcrumbs'][] = $this->title;
    ?>

 <div class="container">
     <div class="min-vh-100 d-flex justify-content-center align-items-center py-5">
         <div class="shadow-lg p-4 p-md-5 text-muted w-100"
             style="background-color: rgb(249, 249, 249); max-width: 900px;">
             <div class="px-5">
                 <div class="text-center mb-5">
                     <h4 class="text-black">Register</h4>
                 </div>

                 <div class="row g-3 mb-2">
                     <div class="col-md-6">
                         <input type="text" placeholder="First Name*" class="form-control p-2" />
                     </div>
                     <div class="col-md-6">
                         <input type="text" placeholder="Last Name*" class="form-control p-2" />
                     </div>
                 </div>


                 <div class="row g-3 mb-2">
                     <div class="col-md-6">
                         <input type="text" placeholder="Your Email*" class="form-control p-2" />
                     </div>
                     <div class="col-md-6">
                         <input type="text" placeholder="Your Phone*" class="form-control p-2" />
                     </div>
                 </div>


                 <div class="row g-3 mb-2">
                     <div class="col-md-6">
                         <input type="text" placeholder="Username*" class="form-control p-2" />
                     </div>
                     <div class="col-md-6">
                         <input type="text" placeholder="Address*" class="form-control p-2" />
                     </div>
                 </div>

                 <div class="row g-3 mb-2">
                     <div class="col-md-6">
                         <input type="password" placeholder="Password*" class="form-control p-2" />
                     </div>
                     <div class="col-md-6">
                         <input type="password" placeholder="Confirm Password*" class="form-control p-2" />
                     </div>
                 </div>


                 <div class="d-flex gap-3 mb-4">
                     <div class="form-check">
                         <input type="radio" name="gender" id="male" class="form-check-input" />
                         <label for="male" class="form-check-label">Male</label>
                     </div>
                     <div class="form-check">
                         <input type="radio" name="gender" id="female" class="form-check-input" />
                         <label for="female" class="form-check-label">Female</label>
                     </div>
                 </div>


                 <div class="text-center">
                     <a href="home.html">
                         <button class="btn btn-success px-5 py-2">Register</button>
                     </a>
                 </div>
             </div>
         </div>
     </div>
 </div>