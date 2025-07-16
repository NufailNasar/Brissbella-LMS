<!DOCTYPE html>
<html lang="en">

<?php
include('header.php');
include('connection.php'); // Ensure DB connection is established
?>


    <!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="img/about.webp" alt="Brissbella LMS" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                <h1 class="mb-4">Welcome to Brissbella Academy LMS</h1>
                <p class="mb-4">Brissbella Academy LMS is a modern, web-based learning platform designed to simplify online education. Built with the MERN stack, it allows students, instructors, and administrators to collaborate and manage academic workflows efficiently.</p>
                <p class="mb-4">From course enrollment to assignment submission, our system ensures a seamless and secure experience for all users. Features include real-time notifications, and responsive design across all devices.</p>
                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Role-Based Access</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Assignment Management</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Secure Payment Integration</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Responsive Interface</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Student Performance Tracking</p>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="#">Explore More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-chalkboard-teacher text-primary mb-4"></i>
                        <h5 class="mb-3">Expert Instructors</h5>
                        <p>Our platform hosts experienced instructors who deliver high-quality course content and provide guidance throughout your learning journey.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-laptop text-primary mb-4"></i>
                        <h5 class="mb-3">Interactive LMS</h5>
                        <p>Brissbella Academy offers a modern Learning Management System with seamless navigation, course tracking, and assignment submissions.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-user-shield text-primary mb-4"></i>
                        <h5 class="mb-3">Role-Based Access</h5>
                        <p>Secure role-based access for students, instructors, and admins to ensure personalized learning and efficient management.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                        <h5 class="mb-3">AI Chatbot Support</h5>
                        <p>24/7 virtual assistant to help with queries, course navigation, and instant information support within the LMS platform.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

   <!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Instructors</h6>
            <h1 class="mb-5">Expert Instructors</h1>
        </div>
        <div class="row g-4">
            <!-- Instructor 1 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/team-1.jpg" alt="Ms. Shani Fernando">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Ms. Shani Fernando</h5>
                        <small>Bridal Makeup & Hair Expert</small>
                    </div>
                </div>
            </div>
            <!-- Instructor 2 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/team-2.jpg" alt="Mr. Ayesh Rajapaksha">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Mr. Ayesh Rajapaksha</h5>
                        <small>Beauty Therapy Specialist</small>
                    </div>
                </div>
            </div>
            <!-- Instructor 3 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/team-3.jpg" alt="Ms. Dulani Perera">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Ms. Dulani Perera</h5>
                        <small>Advanced Hair Styling Instructor</small>
                    </div>
                </div>
            </div>
            <!-- Instructor 4 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/team-4.jpg" alt="Ms. Kaveesha Silva">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Ms. Kaveesha Silva</h5>
                        <small>Basic Beauty & Hair Lecturer</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

</body>

</html>

<?php include('footer.php'); ?>