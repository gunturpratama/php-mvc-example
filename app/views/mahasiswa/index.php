<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>


    <div class="row mb-3">

        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data
            </button>

        </div>

    </div>

    <div class="row mb-3">

        <div class="col-lg-6">
            <form action="<?= BASEURL ?>/mahasiswa/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Mahasiswa"
                        aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword" id="keyword"
                        autocomplete="off">
                    <div class="input-group-append ml-3">
                        <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                    </div>
                </div>
            </form>
        </div>

    </div>


    <div class="row">


        <div class="col-6">




            <h3 class="text-uppercase"><?= $data['title']; ?></h3>
            <ul class="list-group">
                <?php foreach($data['mhs'] as $mhs) :?>
                <li class="list-group-item">
                    <?= $mhs['nama']; ?>
                    <a href="<?= BASEURL; ?>mahasiswa/hapus/<?= $mhs['id']; ?>"
                        class="badge badge-danger float-right ml-2" onclick="return confirm('yakin?')">delete</a>
                    <a href="<?= BASEURL; ?>mahasiswa/ubah/<?= $mhs['id']; ?>" data-toggle="modal"
                        data-target="#formModal" class="badge badge-success float-right ml-2 tampilModalUbah"
                        data-id="<?= $mhs['id']; ?>">edit</a>
                    <a href="<?= BASEURL; ?>mahasiswa/detail/<?= $mhs['id']; ?>"
                        class="badge badge-primary float-right ml-2">detail</a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>




<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fromModalLable">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>mahasiswa/tambah" method="post">
                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="enter name">
                    </div>
                    <div class="form-group">
                        <label for="nama">nrp</label>
                        <input type="number" class="form-control" id="nrp" name="nrp" placeholder="enter nrp">
                    </div>
                    <div class="form-group">
                        <label for="nama">email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="enter email">
                    </div>

                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="teknik informatika">Teknik Informatika</option>
                            <option value="sistem komputer">Sistem Komputer</option>
                            <option value="manajemen">Manajemen</option>
                            <option value="teknik mesin">Teknik Mesin</option>
                        </select>
                    </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>