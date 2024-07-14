<?= $this->extend('layouts/app_home') ?>

<?= $this->section('content') ?>
<header class="bg-white">
    <nav class="bg-white shadow-sm">
        <div class="container flex flex-col items-center p-6 mx-auto">
            <a href="#" class="mx-auto ">
                <img class="w-auto duration-150 ease-in-out scale-100 h-9 md:h-12 hover:scale-105" src="<?= base_url('img/logo.png') ?>" alt="">
            </a>
        </div>
    </nav>

    <div class="container flex flex-col px-6 py-12 mx-auto space-y-6 lg:h-[32rem] lg:py-16 lg:flex-row lg:items-center">
        <div class="flex flex-col items-center w-full mx-auto lg:flex-row-reverse lg:max-w-5xl">

            <div class="flex items-center justify-center w-full h-full mb-6 md:w-3/4" data-aos="zoom-in" data-aos-duration="1400">
                <img class="w-10/12 transition duration-300 ease-in-out scale-100 h-80 drop-shadow-xl hover:scale-105 hover:-rotate-1 lg:-rotate-2 hover:lg:rotate-0 hover:lg:scale-110" src="<?= base_url('home_page/') ?><?= ($home_page) ? $home_page->ImageHead : '' ?>" alt="">
            </div>

            <div class="max-w-sm lg:mx-12 lg:order-2" data-aos="fade-up" data-aos-duration="1400">
                <h1 class="text-3xl font-extrabold text-orange-600 dark:text-white md:text-4xl lg:text-[2.5rem]"><?= ($home_page) ? $home_page->Head : '' ?></h1>
                <p class="mt-4 text-gray-600 dark:text-gray-300">
                    <?= ($home_page) ? $home_page->SubHead : '' ?>
                </p>
                <div class="flex flex-col gap-2 mt-6 md:flex-row md:mt-10">
                    <?php if (session()->get('Role') == 'customer') : ?>
                        <button x-on:click="openSurvey = true" class="px-6 py-2.5 text-sm font-semibold text-center text-white capitalize bg-orange-600 rounded-lg hover:bg-orange-500 lg:mx-0 lg:w-auto focus:outline-none">Survei Kepuasan Pelanggan</button>
                    <?php endif; ?>
                    <a target="_blank" href="<?= base_url('home_page/') ?><?= ($home_page) ? $home_page->Katalog : '' ?>" class="px-6 py-2.5 text-sm font-semibold text-center text-white capitalize bg-blue-700 rounded-lg hover:bg-blue-600 lg:mx-0 lg:w-auto focus:outline-none">Unduh Katalog</a>
                </div>
            </div>
        </div>

    </div>
</header>

<main>
    <section class="w-full py-16 mx-auto bg-orange-100 lg:py-16">
        <div class="container max-w-lg px-6 mx-auto lg:max-w-5xl lg:flex lg:flex-row-reverse lg:items-center">
            <div class="leading-relaxed lg:w-full lg:px-4" data-aos="fade-down" data-aos-duration="1400">
                <h3 class="text-2xl font-extrabold text-orange-600 md:text-2xl lg:text-3xl">Tentang</h3>
                <p class="mt-2 text-gray-800">Aplikasi survey online membantu kami untuk meningkatkan pelayanan agar lebih baik.</p>

                <hr class="my-6 border-orange-200" />

                <p class="mt-6 text-gray-800 ">
                    <?= ($home_page) ? $home_page->About : '' ?>
                </p>

                <div class="mt-3 text-gray-800">
                    <p>Salam,</p>
                    <p><strong>SBU Jasa Pelayanan Pabrik</strong></p>
                </div>
            </div>

            <div class="mt-8 lg:w-[48%] lg:px-4 lg:mt-0" data-aos="zoom-in" data-aos-duration="1400">
                <a href="<?= base_url('home_page/') ?><?= ($home_page) ? $home_page->AboutImage : '' ?>" target="_blank" rel="noopener noreferrer">
                    <img class="object-cover object-left w-full transition duration-300 ease-in-out scale-95 drop-shadow-xl lg:object-top rounded-xl h-96 hover:scale-100 hover:rotate-1 lg:-rotate-2 hover:lg:rotate-0" src="<?= base_url('home_page/') ?><?= ($home_page) ? $home_page->AboutImage : '' ?>" alt="">
                </a>
            </div>
        </div>
    </section>

    <section>
        <div class="container px-6 py-8 mx-auto">
            <div class="flex flex-col items-center text-center">
                <a href="#" data-aos="fade-up" data-aos-duration="1500" data-aos-anchor-placement="top-bottom">
                    <img class="w-auto h-7" src="<?= base_url('img/logo.png') ?>" alt="">
                </a>

                <div class="flex flex-col gap-1 mt-6">
                    <p class="max-w-md mx-auto text-gray-500 capitalize dark:text-gray-400">Kami mengutamakan kualitas dan ketepatan waktu.</p>
                    <p class="flex items-center max-w-md gap-1 mx-auto mt-4 text-gray-500 capitalize dark:text-gray-400"><i class='bx bxs-envelope'></i> <?= ($home_page) ? $home_page->Email : '' ?></p>
                    <p class="flex items-center max-w-md gap-1 mx-auto text-gray-500 capitalize dark:text-gray-400"><i class='bx bxl-instagram-alt'></i> @<?= ($home_page) ? $home_page->Instagram : '' ?></p>
                </div>
            </div>
    </section>
</main>

<footer class="py-4 bg-orange-600">
    <div class="container px-6 mx-auto">
        <div class="flex items-center justify-between ">
            <p class="text-sm font-bold text-gray-100">SBU Jasa Pelayanan Pabrik.</p>
            <a href="<?= site_url('login') ?>" class="px-3 py-1 font-bold text-orange-600 bg-white rounded-md">Masuk</a>
        </div>
    </div>
</footer>

<!-- Modal Survey -->
<?= $this->include('components/_modals') ?>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    AOS.init();
</script>
<?php if (session()->has('success')) : ?>
    <script>
        const Toast1 = Swal.mixin({
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
        Toast1.fire({
            icon: "success",
            title: "Data Survei Berhasil Dikirim!"
        });
    </script>
<?php endif; ?>

<?php if (session()->has('error')) : ?>
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
            title: "Data Survei Gagal Dikirim. Silahkan Isi Semua Survei!"
        });
    </script>
<?php endif; ?>
<?php session()->remove(['error', 'success']); ?>
<?= $this->endSection() ?>