<?php

include './header.php';

$data_faq = $koneksi->query("SELECT * FROM faq");
$num_rows = $koneksi->query("SELECT * FROM faq")->fetch_row();
echo $num_rows;

?>
<div class="container hero" style="height: 100vh;">
    <div class="row my-5 d-flex justify-content-center">
        <div class="col-lg-10">
            <div class="row d-flex justify-content-center">
                <div class="mb-3">
                    <div class="mb-5">
                        <h2 class="card-title text-center" style="
                    font-family: 'DM Sans', sans-serif;
                    font-weight: bolder;
                  ">
                            FREQUENTLY ASKED QUESTION
                        </h2>
                        <h4 class="text-center mb-5 mt-2">Pertanyaan yang sering ditanyakan</h4>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center" style="font-family: 'Open Sans', sans-serif; font-weight: 600">
                <?php if ($num_rows > 0) : ?>
                    <?php foreach ($data_faq as $key => $faq) : ?>
                        <div class="col-12 mb-3">
                            <button class="form-select text-start col-lg-12" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?= $key; ?>" aria-expanded="false" aria-controls="collapseExample<?= $key; ?>">
                                <?= $faq['pertanyaan']; ?>
                            </button>
                            <div class="collapse" id="collapseExample<?= $key; ?>">
                                <div class="card card-body">
                                    <?= $faq['jawaban']; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <h3 class="text-center"><i>Belum ada FAQ</i></h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>