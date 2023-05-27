<div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
        <img src="img/product1.png" class="max-w-sm rounded-lg md:ml-20 md:-mt-10" />
        <div>
        <h1 class="text-5xl font-bold text-primary">Healthy food to <br> live a healthier life <br> in the future</h1>
        <p class="py-6">Enjoy a healty life by eating healty foods <br> that have extraordinary flavors that make your life healthier <br> for today and in the future</p>
        <?php if($session->has('logged_in') == TRUE){ ?>
            <a href="<?= base_url()?>dashboard" class="btn bg-slate-800 text-white hover:bg-white hover:text-primary mb-10">Get Started</a>
        <?php } else { ?>
            <a href="<?= base_url()?>login" class="btn bg-slate-800 text-white hover:bg-white hover:text-primary mb-10">Get Started</a>
        <?php } ?>
        </div>
    </div>
</div>