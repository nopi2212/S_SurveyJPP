<?= $this->extend('layouts/app_auth') ?>

<?= $this->section('style') ?>
<style>
    .trumbowyg-box {
        margin-top: 6px;
        border-radius: 10px 10px 0 0;
    }

    .trumbowyg-button-pane {
        border-radius: 10px 10px 0 0;
    }

    .trumbowyg-editor-box {
        border-radius: 0 0 10px 10px;
        background-color: #fefefe;
    }

    .trumbowyg-editor {
        height: 16rem;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('title') ?> <?= $title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Card Section -->
<p class="text-sm font-semibold text-gray-400 capitalize">untuk mengatur isi konten dari halaman utama pada web</p>

<!-- Alert -->
<?php if (session()->has('message')) : ?>
    <?= $this->include('components/_alert') ?>
<?php endif; ?>

<div class="w-full py-5 mx-auto">
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7 dark:bg-slate-900">

        <form method="post" enctype="multipart/form-data" action="<?= site_url('halaman-utama/save') ?>">
            <?= csrf_field(); ?>

            <input type="hidden" name="IdHomePage" value="<?= ($home_page) ? $home_page->IdHomePage : '' ?>">

            <div class="mb-2">
                <label for="Head" class="text-sm label">Judul Halaman Utama</label>
                <input id="Head" name="Head" type="text" class="input" value="<?= ($home_page) ? $home_page->Head : '' ?>">
                <!-- Error -->
                <?php if ($validation->getError('Head')) : ?>
                    <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                        <?= $error = $validation->getError('Head'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-2">
                <label for="SubHead" class="text-sm label">Deskripsi Halaman Utama</label>
                <textarea name="SubHead" id="SubHead" class="input"><?= ($home_page) ? $home_page->SubHead : '' ?></textarea>
                <!-- Error -->
                <?php if ($validation->getError('SubHead')) : ?>
                    <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                        <?= $error = $validation->getError('SubHead'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-2">
                <label for="ImageHead" class="text-sm label">Gambar Halaman Utama - </label>
                <a href="<?= base_url('home_page/') ?><?= ($home_page) ? $home_page->ImageHead : '' ?>" target="_blank" class="inline-flex items-center gap-1 text-sm text-orange-500">Lihat Gambar <i class='bx bxs-download'></i></a>
                <input id="ImageHead" name="ImageHead" type="file" class="input">
                <!-- Error -->
                <?php if ($validation->getError('ImageHead')) : ?>
                    <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                        <?= $error = $validation->getError('ImageHead'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-2">
                <label for="About" class="text-sm label">Tentang Perusahaan</label>
                <textarea name="About" id="About" class="input"><?= ($home_page) ? $home_page->About : '' ?></textarea>
                <!-- Error -->
                <?php if ($validation->getError('About')) : ?>
                    <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                        <?= $error = $validation->getError('About'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-2">
                <label for="AboutImage" class="text-sm label">Gambar Perusahaan - </label>
                <a href="<?= base_url('home_page/') ?><?= ($home_page) ? $home_page->AboutImage : '' ?>" target="_blank" class="inline-flex items-center gap-1 text-sm text-orange-500">Lihat Gambar <i class='bx bxs-download'></i></a>
                <input id="AboutImage" name="AboutImage" type="file" class="input">
                <!-- Error -->
                <?php if ($validation->getError('AboutImage')) : ?>
                    <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                        <?= $error = $validation->getError('AboutImage'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-2">
                <label for="Email" class="text-sm label">Email Perusahaan</label>
                <input id="Email" name="Email" type="text" class="input" value="<?= ($home_page) ? $home_page->Email : '' ?>">
                <!-- Error -->
                <?php if ($validation->getError('Email')) : ?>
                    <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                        <?= $error = $validation->getError('Email'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-2">
                <label for="Instagram" class="text-sm label">Instagram Perusahaan</label>
                <input id="Instagram" name="Instagram" type="text" class="input" value="<?= ($home_page) ? $home_page->Instagram : '' ?>">
                <!-- Error -->
                <?php if ($validation->getError('Instagram')) : ?>
                    <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                        <?= $error = $validation->getError('Instagram'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-2">
                <label for="Katalog" class="text-sm label">Katalog Perusahaan - </label>
                <a href="<?= base_url('home_page/') ?><?= ($home_page) ? $home_page->Katalog : '' ?>" target="_blank" class="inline-flex items-center gap-1 text-sm text-orange-500">Lihat Katalog <i class='bx bxs-download'></i></a>
                <input id="Katalog" name="Katalog" type="file" class="input">
                <!-- Error -->
                <?php if ($validation->getError('Katalog')) : ?>
                    <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                        <?= $error = $validation->getError('Katalog'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="flex justify-end mt-5 gap-x-2">
                <button type="submit" class="text-sm button">
                    Simpan Data
                </button>
            </div>

        </form>
    </div>



</div>
<!-- End Card -->
</div>
<!-- End Card Section -->

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        $('#SubHead').trumbowyg({
            btns: [
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
            ]
        });
        $('#About').trumbowyg({
            btns: [
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
            ]
        });
    });
</script>
<?= $this->endSection() ?>