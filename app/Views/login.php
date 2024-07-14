<?= $this->extend('layouts/app_home') ?>

<?= $this->section('content') ?>
<section class="bg-white dark:bg-gray-900">
    <div class="flex justify-center h-screen">
        <div class="hidden bg-cover lg:block lg:w-3/5" style="background-image: url(/img/B3.jpg)">
            <div class="flex items-center h-full px-20 bg-gray-950 bg-opacity-70">
                <div>
                    <h2 class="text-2xl font-extrabold text-blue sm:text-3xl">SBU Jasa Pelayanan Pabrik</h2>

                    <p class="max-w-xl mt-3 text-gray-300">
                        SBU JPP merupakan Unit Pelayanan Pabrik yang melayani kebutuhan baik Internal maupun External PT Pupuk Kalimantan Timur.
                    </p>
                </div>
            </div>
        </div>

        <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
            <div class="flex-1">
                <div class="text-center">
                    <a href="/" class="flex justify-center mx-auto">
                        <img class="w-auto h-9 sm:h-12" src="<?= base_url('img/logo.png') ?>" alt="">
                    </a>

                    <p class="mt-3 font-medium text-gray-500 dark:text-gray-300">Login ke akun kamu</p>
                </div>

                <?php if (session()->has('suksess')) : ?>
                    <div id="dismiss-alert" class="p-4 mt-3 text-sm text-teal-800 transition duration-300 border border-teal-200 rounded-lg hs-removing:translate-x-5 hs-removing:opacity-0 bg-teal-50 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
                        <div class="flex items-center justify-center">
                            <div class="flex-shrink-0">
                                <i class='text-teal-800 bx-xs bx bx-check-double'></i>
                            </div>
                            <div class="ms-2">
                                <div class="text-sm font-medium">
                                    Registrasi berhasil ditambahkan.
                                </div>
                            </div>
                            <div class="ps-3 ms-auto">
                                <div class="-mx-1.5 -my-1.5">
                                    <button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="#dismiss-alert">
                                        <span class="sr-only">Dismiss</span>
                                        <i class='bx bx-x bx-xs'></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="mt-8">
                    <form method="POST" action="<?= site_url('login') ?>">
                        <?= csrf_field(); ?>
                        <div>
                            <label for="Username" class="block mb-2 label">Username</label>
                            <input type="text" name="Username" id="Username" placeholder="John Doe" class="input" />
                        </div>

                        <div class="mt-6">
                            <div class="flex justify-between mb-2">
                                <label for="Password" class="label">Password</label>
                                <!-- <a href="#" class="text-sm text-gray-400 focus:text-orange-500 hover:text-orange-500 hover:underline">Forgot password?</a> -->
                            </div>

                            <input type="password" name="Password" id="Password" placeholder="********" class="input" />
                        </div>

                        <div class="mt-6">
                            <button class="w-full px-4 py-2 font-semibold tracking-wide text-white transition-colors duration-300 transform bg-orange-500 rounded-lg hover:bg-orange-400 focus:outline-none focus:bg-orange-400 focus:ring focus:ring-orange-300 focus:ring-opacity-50">
                                Sign in
                            </button>
                        </div>

                    </form>

                    <p class="mt-6 text-sm font-bold text-center text-gray-400">Belum punya akun ? silahkan daftar. <a href="<?= site_url('register') ?>" class="text-orange-600">Klik untuk daftar</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?php if (session()->has('message')) : ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "error",
            title: "Username atau Password Salah!"
        });
    </script>
<?php endif; ?>
<?= $this->endSection() ?>