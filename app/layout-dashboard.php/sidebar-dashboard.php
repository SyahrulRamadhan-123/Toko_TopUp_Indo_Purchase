<?php
$page = $_GET['page'] ?? '';

$isMenuOpenGame = in_array($page, ['data_rekapan', 'data_riwayat', 'input_item_game', 'kelola_data_game']);
$isMenuOpenTransaksi = in_array($page, ['data_riwayat', 'data_rekapan']);
?>


<div class="accordion" id="induk">
                <!-- Menu Data Game -->
                <div class="accordion-item bg-success">
                    <h2 class="accordion-header" id="h2-accordion">
                        <button class="accordion-button <?= $isMenuOpenGame ? '' : 'collapsed' ?>" type="button"
                            aria-expanded="<?= $isMenuOpenGame ? 'true' : 'false' ?>" data-bs-toggle="collapse"
                            data-bs-target="#target-collapse" aria-controls="target-collapse" id="accordion-color-button">
                            Data Game
                        </button>
                    </h2>
                    <div id="target-collapse"
                        class="accordion-collapse collapse <?= $isMenuOpenGame ? 'show' : '' ?>"
                        aria-labelledby="h2-accordion" data-bs-parent="#induk">
                        <div class="accordion-body" id="accordion-bg-solid">
                            <ul class="list-unstyled">
                                <li><a href="?page=input_item_game">Input Item Game</a></li>
                                <li><a href="?page=kelola_data_game">Kelola Data Game</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Menu Data Transaksi -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="h2-accordion-2">
                        <button class="accordion-button <?= $isMenuOpenTransaksi ? '' : 'collapsed' ?>" type="button"
                            aria-expanded="<?= $isMenuOpenTransaksi ? 'true' : 'false' ?>" data-bs-toggle="collapse"
                            data-bs-target="#target-collapse-2" aria-controls="target-collapse-2">
                            Data Transaksi
                        </button>
                    </h2>
                    <div id="target-collapse-2"
                        class="accordion-collapse collapse <?= $isMenuOpenTransaksi ? 'show' : '' ?>"
                        aria-labelledby="h2-accordion-2" data-bs-parent="#induk">
                        <div class="accordion-body">
                            <ul class="list-unstyled">
                                <li><a href="#">Data Riwayat Transaksi</a></li>
                                <li><a href="#">Data Rekapan</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
</div>