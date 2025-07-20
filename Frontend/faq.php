<!DOCTYPE html>
<html lang="en">

<?php
include('header.php');
include('db_connect.php');
?>

<!-- FAQ Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">FAQ</h6>
            <h1 class="mb-5">Frequently Asked Questions</h1>
        </div>
        <div class="accordion" id="faqAccordion">
            <!-- Question 1 -->
            <div class="accordion-item wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="accordion-header" id="faqHeadingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="false" aria-controls="faqCollapseOne">
                        What are the available courses at Brissbella Academy?
                    </button>
                </h2>
                <div id="faqCollapseOne" class="accordion-collapse collapse" aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        We offer a range of beauty and hair courses including Basic Beauty, Advanced Beauty, Basic Hair Styling, Advanced Hair Styling, Bridal Makeup Artistry, and Bridal Hair Styling.
                    </div>
                </div>
            </div>

            <!-- Question 2 -->
            <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                <h2 class="accordion-header" id="faqHeadingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                        How do I register for a course?
                    </button>
                </h2>
                <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        You can register through our online registration portal or visit our office at Kattiya Junction, Nugegoda. Call us at +94 77 662 0717 for assistance.
                    </div>
                </div>
            </div>

            <!-- Question 3 -->
            <div class="accordion-item wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="accordion-header" id="faqHeadingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">
                        Do you provide certifications after course completion?
                    </button>
                </h2>
                <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, all our courses are certified by Brissbella Academy and recognized in the industry. International certificates are also available for select courses.
                    </div>
                </div>
            </div>

            <!-- Question 4 -->
            <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
                <h2 class="accordion-header" id="faqHeadingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFour" aria-expanded="false" aria-controls="faqCollapseFour">
                        What payment methods are accepted?
                    </button>
                </h2>
                <div id="faqCollapseFour" class="accordion-collapse collapse" aria-labelledby="faqHeadingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        We accept cash, credit/debit cards, bank transfers, and online payments via PayPal.
                    </div>
                </div>
            </div>

            <!-- Question 5 -->
            <div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
                <h2 class="accordion-header" id="faqHeadingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFive" aria-expanded="false" aria-controls="faqCollapseFive">
                        Is there any dress code for practical sessions?
                    </button>
                </h2>
                <div id="faqCollapseFive" class="accordion-collapse collapse" aria-labelledby="faqHeadingFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, students are required to wear the Brissbella uniform during practical classes to maintain hygiene and professionalism.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQ End -->

</body>
</html>

<?php include('footer.php'); ?>
