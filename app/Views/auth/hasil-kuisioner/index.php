<?= $this->extend('layouts/app_auth') ?>

<?= $this->section('title') ?> <?= $title ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<p class="text-sm font-semibold text-gray-400 capitalize">data hasil kuisioner kepuasaan pelanggan.</p>

<div class="w-full px-6 py-8 mt-6 bg-white rounded-lg shadow">
    <div class="flex flex-col gap-1 lg:flex-row lg:justify-between lg:items-center">
        <label class="text-sm font-bold capitalize label">filter berdasarkan kategori, bulan & tahun.</label>
        <form class="flex flex-col w-full gap-1 md:flex-row lg:w-1/2 xl:max-w-lg" method="post" action="<?= site_url('hasil-kuisioner/showfilter') ?>">
            <?= csrf_field(); ?>
            <select id="kategori" name="kategori" class="m-0 text-sm font-semibold input" required>
                <option value="jasa">Jasa</option>
                <option value="produk">Produk</option>
            </select>
            <!-- <select id="bulan" name="bulan" class="m-0 text-sm font-semibold input" required>
                <?php foreach (bulan() as $i => $bulan) : ?>
                    <option value="<?= $i; ?>"><?= $bulan; ?></option>
                <?php endforeach; ?>
            </select> -->
            <select id="tahun" name="tahun" class="m-0 text-sm font-semibold input" required>
                <?php foreach (tahun() as $tahun) : ?>
                    <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="button" id="btnSubmit" class="text-sm font-bold button">
                Cari
            </button>
        </form>
    </div>

    <hr class="mt-3 mb-5 bg-gray-100">

    <div id="content"></div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $('#btnSubmit').click(function(e) {
        e.preventDefault();
        $('#content').empty();
        show();
    });

    function show() {
        var data = new FormData();
        data.append("tahun", $('#tahun').val())
        data.append("kategori", $('#kategori').val())

        $.ajax({
            url: `${window.origin}/hasil-kuisioner`,
            type: "POST",
            data: data,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    if (response.data.length == 0) {
                        $("#content").html(`<div class="py-2 text-sm font-bold text-center text-gray-600 capitalize">Maaf, Data tidak ditemukan!</div>`);
                    } else {
                        window.location.href = `${window.origin}/hasil-kuisioner/${response.kategori}/${response.tahun}`;
                    }
                } else {
                    notif("Whoops!", response.message, "error");
                }
            },
        });
    }
</script>
<?= $this->endSection() ?>