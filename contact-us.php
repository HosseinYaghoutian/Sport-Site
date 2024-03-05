<?php
/*
  Template Name: تماس با ما
*/
?>

    <?php get_header(); ?>  
    <?php get_template_part('body-header'); ?>
    
        <main>
            <container class="container">
                <section class="about-contact-us" id="about-contact-us">

                    <img class="about-contact-us__img" data-wow-offset="100" src="<?php echo get_theme_file_uri("assets/media/img/contact-us/contact-us__img.svg")?>" alt="about-contact-us__img">

                    <article class="about-contact-us__text">

                        <h1 class="about-contact-us__title">
                            عضویت در گروه
                        </h1>

                        <p class="about-contact-us__content">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال
                        </p>
                        
                    </article>

                    <p class="about-contact-us__x">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال
                    </p>

                </section>

                

                <section class="form-contact-us">
                    <?php echo do_shortcode("[gravityform id='2' title='true' description='true']"); ?>

                    <!--
                        <div class="input-group">
                            <div>
                                <input type="text" class="form-control username" placeholder="اسم خودتون رو وارد کنید" aria-label="username">
                            </div>

                            <div>
                                <input type="text" class="form-control phone-number" placeholder="شماره تماستون رو وارد کنید" aria-label="phone-number">
                            </div>

                            <div>
                                <input type="text" class="form-control startup-name" placeholder="اسم استارت‌آپتون رو وارد کنید" aria-label="startup-name">
                            </div>

                            <div>
                                <input type="text" class="form-control linkedin-url" placeholder="آدرس لینکدین‌تون رو وارد کنید" aria-label="linkedin-url">
                            </div>

                            <div>
                                <textarea class="form-control" placeholder="ما چرا باید شما رو قبول کنیم" aria-label="textarea"></textarea>
                            </div>
                        </div>

                        <div class="btn-container">
                            <button type="button" class="register-form-button">ثبت نظر</button>
                        </div>
                    -->
                </section>
            </container>
        </main>
    
    <?php get_template_part('body-footer'); ?>
    <?php get_footer(); ?>