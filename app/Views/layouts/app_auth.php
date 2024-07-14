<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('layouts/_header') ?>
    <?= $this->renderSection('style') ?>
</head>

<body class="bg-gray-50 dark:bg-slate-900">

    <!-- ========== HEADER ========== -->
    <!-- Navbar -->
    <?= $this->include('layouts/_navbar') ?>
    <!-- End Navbar -->
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Sidebar -->
    <?= $this->include('layouts/_sidebar') ?>
    <!-- End Sidebar -->

    <!-- Content -->
    <div class="w-full px-4 pt-10 sm:px-6 md:px-8 lg:ps-72">

        <p class="flex items-center gap-2 text-lg font-bold text-orange-500"><?= $this->renderSection('title') ?></p>

        <?= $this->renderSection('content') ?>

    </div>
    <!-- End Content -->
    <!-- ========== END MAIN CONTENT ========== -->


    <?= $this->include('layouts/_script') ?>

    <?= $this->renderSection('script') ?>

</body>

</html>