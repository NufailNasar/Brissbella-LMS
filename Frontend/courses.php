<!DOCTYPE html>
<html lang="en">

<?php
include('header.php');
include('db_connect.php');
?>



<!-- Categories Start -->
<div class="container-xxl py-5 category">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Categories</h6>
            <h1 class="mb-5">Course Categories</h1>
        </div>
        <div class="row g-3">
            <div class="col-lg-7 col-md-6">
                <div class="row g-3">
                    <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                        <a class="position-relative d-block overflow-hidden" href="#">
                            <img class="img-fluid" src="img/cat-1.jpg" alt="Beauty Therapy">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                <h5 class="m-0">Beauty Therapy</h5>
                                <small class="text-primary">12 Courses</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                        <a class="position-relative d-block overflow-hidden" href="#">
                            <img class="img-fluid" src="img/cat-2.jpg" alt="Hair Styling">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                <h5 class="m-0">Hair Styling</h5>
                                <small class="text-primary">10 Courses</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                        <a class="position-relative d-block overflow-hidden" href="#">
                            <img class="img-fluid" src="img/cat-3.jpg" alt="Bridal Artistry">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                <h5 class="m-0">Bridal Artistry</h5>
                                <small class="text-primary">6 Courses</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                <a class="position-relative d-block h-100 overflow-hidden" href="#">
                    <img class="img-fluid position-absolute w-100 h-100" src="img/cat-4.jpg" alt="Makeup Artistry" style="object-fit: cover;">
                    <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                        <h5 class="m-0">Makeup Artistry</h5>
                        <small class="text-primary">8 Courses</small>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Categories End -->


<!-- Courses Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
            <h1 class="mb-5">Our featured Programs</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <!-- Repeat for each course below -->

            <!-- Course 1 -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="img/advance-beauty.jpg" alt="Advance Beauty Course">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">Rs. 45,000</h3>
                        <h5 class="mb-4">Advance Beauty Course</h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>40 Students</small>
                    </div>
                </div>
            </div>

            

            <!-- Course 3 -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="img/basic-beauty.jpg" alt="Basic Beauty Course">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="btn btn-sm btn-primary px-3 border-end">Read More</a>
                            <a href="#" class="btn btn-sm btn-primary px-3">Join Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">Rs. 25,000</h3>
                        <h5 class="mb-4">Basic Beauty Course</h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>50 Students</small>
                    </div>
                </div>
            </div>

            <!-- Course 4 -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="img/basic-hair.jpeg" alt="Basic Hair Styling">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="btn btn-sm btn-primary px-3 border-end">Read More</a>
                            <a href="#" class="btn btn-sm btn-primary px-3">Join Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">Rs. 20,000</h3>
                        <h5 class="mb-4">Basic Hair Styling</h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>42 Students</small>
                    </div>
                </div>
            </div>

            <!-- Course 2 -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="img/advanced-hair.jpg" alt="Advanced Hair Styling">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="btn btn-sm btn-primary px-3 border-end">Read More</a>
                            <a href="#" class="btn btn-sm btn-primary px-3">Join Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">Rs. 40,000</h3>
                        <h5 class="mb-4">Advanced Hair Styling</h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>36 Students</small>
                    </div>
                </div>
            </div>

            <!-- Course 5 -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="img/bridal-hair.jpg" alt="Bridal Hair Styling">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="btn btn-sm btn-primary px-3 border-end">Read More</a>
                            <a href="#" class="btn btn-sm btn-primary px-3">Join Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">Rs. 38,000</h3>
                        <h5 class="mb-4">Bridal Hair Styling</h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>33 Students</small>
                    </div>
                </div>
            </div>

            <!-- Course 6 -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="img/bridal-makeup.jpg" alt="Bridal Makeup Artistry">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="btn btn-sm btn-primary px-3 border-end">Read More</a>
                            <a href="#" class="btn btn-sm btn-primary px-3">Join Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">Rs. 42,000</h3>
                        <h5 class="mb-4">Bridal Makeup Artistry</h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>47 Students</small>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Courses End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
            <h1 class="mb-5">What Our Students Say</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <!-- Testimonial 1 -->
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Dilani Perera</h5>
                <p>Advanced Hair Styling Graduate</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Brissbella Academy gave me the confidence and skills to launch my own salon. The hands-on learning and expert instructors made all the difference.</p>
                </div>
            </div>
            <!-- Testimonial 2 -->
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Shehani Fernando</h5>
                <p>Bridal Makeup Student</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">I loved every session at Brissbella. Their bridal artistry course helped me master the techniques to serve premium clients with confidence.</p>
                </div>
            </div>
            <!-- Testimonial 3 -->
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Nuwani Jayasinghe</h5>
                <p>Basic Beauty Therapy</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">I joined with zero experience and walked out confident to work in the beauty industry. Truly grateful for the support and knowledge I gained here.</p>
                </div>
            </div>
            <!-- Testimonial 4 -->
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-4.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Ayesh Madushanka</h5>
                <p>Basic Hair Styling</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">From beginner to professional in just a few months. Brissbella’s structured modules and friendly atmosphere were amazing!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
</body>

</html>

<?php include('footer.php'); ?>