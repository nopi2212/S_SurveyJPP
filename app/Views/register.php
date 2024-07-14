<?= $this->extend('layouts/app_home') ?>

<?= $this->section('content') ?>
<section class="bg-white dark:bg-gray-900">
    <div class="flex justify-center h-screen">
        <div class="hidden bg-cover lg:block lg:w-3/5" style="background-image: url(/img/B3.jpg)">
            <div class="flex items-center h-full px-20 bg-gray-950 bg-opacity-70">
                <div>
                    <h2 class="text-2xl font-extrabold text-white sm:text-3xl">SBU Jasa Pelayanan Pabrik</h2>

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

                    <p class="mt-3 font-medium text-gray-500 dark:text-gray-300">Daftar untuk melakukan survei.</p>
                </div>

                <div class="mt-8">
                    <form method="POST" action="<?= site_url('register') ?>">
                        <?= csrf_field(); ?>
                        <div>
                            <label for="FullName" class="block mb-2 label">Nama Lengkap</label>
                            <input type="text" name="FullName" id="FullName" placeholder="John Doe" class="input" />
                        </div>

                        <div class="mt-6">
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
                            <label for="Role" class="block mb-2 label">Role</label>
                            <input id="Role" autofocus name="Role" type="text" class="bg-gray-200 input" value="Customer" readonly>
                        </div>


                        <div class="mt-6">
                            <button class="w-full px-4 py-2 font-semibold tracking-wide text-white transition-colors duration-300 transform bg-orange-500 rounded-lg hover:bg-orange-400 focus:outline-none focus:bg-orange-400 focus:ring focus:ring-orange-300 focus:ring-opacity-50">
                                Sign up
                            </button>
                        </div>

                    </form>

                    <p class="mt-6 text-sm font-bold text-center text-gray-400">Sudah punya akun ? silahkan masuk. <a href="<?= site_url('login') ?>" class="text-orange-600">Klik untuk masuk</a></p>
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