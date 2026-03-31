<?php get_header(); ?>

        <section class="hero" role="banner" aria-label="Hero">
        <div class="hero-overlay"></div>
        <div class="hero-content text-center">
            <h1>Welcome to VersaTel Solutions</h1>
            <p>We provide accounting, bookkeeping, payroll, website, and IT services focused on growth management to small and medium-sized businesses in the DC area and nationwide.</p>
            <button onclick="window.location.href='<?php echo site_url('/contact'); ?>';">Reach Out</button>
        </div>
    </section>


    <section class="who container">
        <h2 class="text-center">There’s a lot of business behind small business…</h2>
        <div class="who-grid">
            <div class="who-text">
                <p>You started with a passion. It turned into a business. Now, both have turned into a job. Your company can’t scale until it can run on its own without you. Our Bookkeepers and Accountants are focused on growth management, providing the services you need in order to scale successfully. Your business is our business!</p>
                <p>Reach out to us if you are looking for:</p>
                <ul>
                    <li>Full-charge bookeepers</li>
                    <li>Payroll and account specialists</li>
                    <li>Marketing and communications consultants</li>
                    <li>Website and IT developers</li>
                </ul>
            </div>
            <div class="who-image">
                <img src="<?php echo get_theme_file_uri('images\headshots\sevana-stone.png'); ?>" alt="Sevana Stone">
            </div>
        </div>
    </section>



    <section class="features container">
        <div class="services text-center">
            <h2>Services</h2>
            <p>You started with a passion. It turned into a business. Now, both have turned into a job. Your company can’t scale until it can run on its own without you. Our Bookkeepers, Accountants, and Business Specialists are focused on growth management, providing the services you need in order to scale successfully. Your business is our business!</p>
        </div>
        <div class="flex-container">
            <article class="card dark-border flex-item flex-card">
                <i class="fa fa-calculator"></i>
                <div class="flex-item-header text-center">
                    <h3>Full-Charge Bookkeeping &amp; Accounting</h3>
                </div>
                    <p>Knowing your company’s financials are crucial to your growth, which is why our team and catalog of services grow with you to give you the support you need as you scale.</p>
            </article>
            <article class="card flex-item flex-card">
                <i class="fa fa-money"></i>
                <div class="flex-item-header text-center">
                    <h3>Payroll</h3>
                </div>
                    <p>Whether you have 1 or 100 employees, payroll is important to your growth. Having a specialist on your team gives you that support and scales along with you!</p>
            </article>
            <article class="card flex-item flex-card">
                <i class="fa fa-laptop"></i>
                <div class="flex-item-header text-center">
                    <h3>Website &amp; IT Development</h3>
                </div>
                    <p>All companies reach a point where they need either an update, or a full on overhaul to their technology and websites. Our Specialists will consult you on the best plans for your website, platforms, and software as you recalibrate your growth!</p>
            </article>
        </div>
    </section>

    <section class="team container">
        <h2 class="text-center">Our team is your team</h2>
        <p class="text-center">Our staff is the best in the business. We may be a little biased, but we aren’t biased about how dedicated and passionate they are, which makes them all pretty special. Meet our team, we think you’ll find them to be pretty special too.</p>

        <?php get_template_part('template-parts/team-carousel') ?>

    </section>

    <section class="testimonials container">
        <h4>Testimonials</h4>
        <h2>What our clients say</h2>

        <div class="flex-container">
            <blockquote class="flex-item card">
                <p>"I really like their work, I guess now they have got a new lifetime customer. From now on, every construction project that I do will only be via their construction company."</p>
                <footer>
                    <img src="https://staging.versatelsolutions.com/wp-content/uploads/2025/09/Albert-Flores.jpg" alt="">
                    <div class="test-name">
                        <strong>Maria Swartzki</strong>
                        <span>Manager, R &amp; B Group</span>
                    </div>
                </footer>
            </blockquote>

            <blockquote class="flex-item card">
                <p>"I really like their work, I guess now they have got a new lifetime customer. From now on, every construction project that I do will only be via their construction company."</p>
                <footer>
                    <img src="https://staging.versatelsolutions.com/wp-content/uploads/2025/09/Robert-Fox.jpg" alt="">
                    <div class="test-name">
                        <strong>Teresa Henry</strong>
                        <span>Manager, R &amp; B Group</span>
                    </div>
                </footer>
            </blockquote>

            <blockquote class="flex-item card">
                <p>"I really like their work, I guess now they have got a new lifetime customer. From now on, every construction project that I do will only be via their construction company."</p>
                <footer>
                    <img src="https://staging.versatelsolutions.com/wp-content/uploads/2025/09/Jessica-Alba.jpg" alt="">
                    <div class="test-name">
                        <strong>Teresa Henry</strong>
                        <span>Manager, R &amp; B Group</span>
                    </div>
        </div>
    </section>

    <section class="cta container">
        <div class="cta-inner">
            <h2>Expand your services (and your client list) with VersaTel Solutions</h2>
            <p>Your client can't get to the next step with you without strong support and guidance. Let us help your client as your third-party option to give them the tools they need to get to the next step with you.</p>
            <button onclick="window.location.href='<?php echo site_url('/contact'); ?>';" >Reach Out</button>
        </div>
    </section>

<?php get_footer(); ?>