<?php get_header(); ?>

<!-- HERO OR PAGE BANNER IF NO HERO IMAGE UPLOADED -->
<?php

$hero_image = get_field('hero_image');

if (!empty($hero_image['url'])) {
    $hero_args = array(
        'image' => $hero_image['url'],
        'title' => get_field('hero_title'),
        'subtitle' => get_field('hero_subtitle'),
        'button' => get_field('hero_button'),
        'button_url' => get_field('hero_button_url'),
        'button_caption' => get_field('hero_button_caption')
    );

    get_template_part('template-parts/hero', null, $hero_args);
} else {
    get_template_part('template-parts/page-banner');
}
?>


<!-- INTRO -->
<section class="who container">
    <h2 class="text-center">There’s a lot of business behind small business…</h2>
    <div class="who-grid">
        <div class="who-text">
            <p>You’re making real decisions — hiring, pricing, whether to take on the next contract — on instinct,
                because the numbers aren’t telling you enough. You don’t need another bookkeeper. You need a financial
                partner who knows where you are, where you’re headed, and what your numbers need to do to get you there.
            </p>
        </div>
        <div class="who-image">
            <img src="<?php echo get_theme_file_uri('images/generic-bsn-owner.png'); ?>" alt="Generic business owner">
        </div>
    </div>
</section>


<!-- What we do -->
<section class="features container">
    <div class="services text-center">
        <h2>What We Do</h2>
        <p>We own your entire financial function — and then we do the part most firms skip: we tell you what the numbers
            mean.</p>
    </div>

    <div class="flex-container">
        <div class="card flex-item flex-card">
            <i class="fa fa-calculator"></i>
            <div class="flex-item-header text-center">
                <h3>Financial Operations</h3>
            </div>
            <p>Full-charge bookkeeping, payroll, accounts payable and receivable, reconciliations, and monthly financial
                statements that get explained, not just delivered. The foundation, running without drama.</p>
        </div>

        <div class="card flex-item flex-card">
            <i class="fa fa-money"></i>
            <div class="flex-item-header text-center">
                <h3>Financial Strategy</h3>
            </div>
            <p>Cash flow forecasting, KPI dashboards, profit and margin analysis, and decision support for pricing,
                hiring, and growth — plus a partner in the room when you’re facing a sale, merger, or funding raise. The
                part most firms skip.</p>
        </div>
        <div class="card flex-item flex-card">
            <i class="fa fa-laptop"></i>
            <div class="flex-item-header text-center">
                <h3>Built for the Hard Stuff</h3>
            </div>
            <p>We’re industry-agnostic, but we cut our teeth on the most complex books out there — government
                contractors (DCAA compliance, indirect rates), nonprofits, and trades. If we can handle those, yours are
                in good hands.</p>
        </div>
    </div>
    <div class="services text-center">
        <p>Also available as add-ons: web and IT support, tax preparation, audit and nonprofit audit support, FAR/DCAA
            compliance, 1099 filing, timesheet management, and medical billing.</p>
    </div>
</section>

<!-- Our Team -->
<section class="team container">
    <h2 class="text-center">Our team is your team</h2>
    <p class="text-center">Our staff is the best in the business. We may be a little biased, but we aren’t biased about
        how dedicated and passionate they are, which makes them all pretty special. Meet our team, we think you’ll find
        them to be pretty special too.</p>

    <?php get_template_part('template-parts/team-carousel') ?>

</section>

<!-- Testimonials -->
<section class="testimonials container">
    <h4>Testimonials</h4>
    <h2>What our clients say</h2>

    <div class="flex-container">
        <blockquote class="flex-item card">
            <p>“Exceptionally well run and staffed by top-notch providers. If you want a partner that’s honest, qualified, and actually fun to do business with, look no further.</p>
            <footer>
                <div class="test-name">
                    <p><strong>Paradime Solutions</strong></p>
                </div>
            </footer>
        </blockquote>

        <blockquote class="flex-item card">
            <p>“My bookkeeper reconciles every month for me, which frees me up to spend more time building my business.”
            </p>
            <footer>
                <div class="test-name">
                    <p><strong>Tracy Dombrowski</strong></p>
                </div>
            </footer>
        </blockquote>

        <blockquote class="flex-item card">
            <p>“Extremely professional. They take the little things off my plate so I can concentrate on the big
                picture.”
            </p>
            <footer>
                <div class="test-name">
                    <p><strong>Kathryn Fox</strong></p>
                </div>
    </div>
</section>

<!-- CTA -->
<section class="cta container">
    <div class="cta-inner">
        <h2>Your business is ready for this. So are we.</h2>
        <p>The next step is a conversation, not a commitment. Thirty minutes where we get to know your business and you
            ask every question on your mind. From there, we’ll tell you honestly where we think you are and whether
            we’re the right fit.</p>
            <a 
    href="<?php echo esc_url(nmca_setting('booking_url')); ?>" target="_blank" rel="noopener noreferrer"
            class="button">
            Book a Consultation
        </a>
    </div>
</section>

<?php get_footer(); ?>
