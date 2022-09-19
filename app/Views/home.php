<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
    <?= $this->include('components/topbar') ?>
    <?= $this->include('components/sidebar') ?>
</header>
<main id="content">
    <div class="container">
        <?= $this->include('components/breadcrumb') ?>

        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4 g-4 mb-5">
            <div class="col d-flex flex-column">
                <div id="btnGroup1" class="btn w-100 p-3">
                    <div class="float-start text-start fs-4">
                        <h3 class="m-0"><?= $total_students ?></h3>
                        <h5 class="m-0 fs-6">Total Students</h5>
                    </div>
                    <img src="<?= base_url() ?>/assets/students.png" class="float-end dash-bg" alt="">
                </div>
                <a href="<?= base_url() ?>/registered_users" id="btnGroup1Info" class="btn"><span class="small ps-3 pe-3 bg-light rounded-pill text-dark">More Info <i class="fas fa-fw fa-circle-arrow-right"></i></span></a>
            </div>
            <div class="col d-flex flex-column">
                <div id="btnGroup2" class="btn w-100 p-3">
                    <div class="float-start text-start fs-4">
                        <h3 class="m-0"><?= $total_books ?></h3>
                        <h5 class="m-0 fs-6">Total Books</h5>
                    </div>
                    <img src="<?= base_url() ?>/assets/books.png" class="float-end dash-bg" alt="">
                </div>
                <a href="<?= base_url() ?>/registered_books" id="btnGroup2Info" class="btn"><span class="small ps-3 pe-3 bg-light rounded-pill text-dark">More Info <i class="fas fa-fw fa-circle-arrow-right"></i></span></a>
            </div>
            <div class="col d-flex flex-column">
                <div id="btnGroup3" class="btn w-100 p-3">
                    <div class="float-start text-start fs-4">
                        <h3 class="m-0"><?= $total_bbooks ?></h3>
                        <h5 class="m-0 fs-6">Borrowed Books Today</h5>
                    </div>
                    <img src="<?= base_url() ?>/assets/borrowed.png" class="float-end dash-bg" alt="">
                </div>
                <a href="<?= base_url() ?>/borrowed_books" id="btnGroup3Info" class="btn"><span class="small ps-3 pe-3 bg-light rounded-pill text-dark">More Info <i class="fas fa-fw fa-circle-arrow-right"></i></span></a>
            </div>
            <div class="col d-flex flex-column">
                <div id="btnGroup4" class="btn w-100 p-3">
                    <div class="float-start text-start fs-4">
                        <h3 class="m-0"><?= $total_rbooks ?></h3>
                        <h5 class="m-0 fs-6">Returned Books Today</h5>
                    </div>
                    <img src="<?= base_url() ?>/assets/return.png" class="float-end dash-bg" alt="">
                </div>
                <a href="<?= base_url() ?>/returned_books" id="btnGroup4Info" class="btn"><span class="small ps-3 pe-3 bg-light rounded-pill text-dark">More Info <i class="fas fa-fw fa-circle-arrow-right"></i></span></a>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-12 col-xl-8">
                <canvas id="myChart" width="100%" height="50%" class="shadow p-5 rounded rounded-3"></canvas>
            </div>
            <div class="col-12 col-xl-4">
                <div class="shadow p-5 rounded rounded-3">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Student's Name</th>
                                <th># of times visited</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($student_ranks)) :
                                foreach ($student_ranks as $key => $student) :
                            ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php
                                endforeach;
                            else :
                                ?>
                                <tr>
                                    <td valign="top" colspan="3" class="dataTables_empty"></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    datasets: [{
                            label: 'Borrowed Books',
                            data: [12, 19],
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.2)'
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)'
                            ],
                            borderWidth: 1
                        },
                        {
                            label: 'Returned Books',
                            data: [12, 19],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</main>

<?= $this->endSection() ?>