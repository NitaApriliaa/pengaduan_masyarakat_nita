<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
    Petugas
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-gradient-dark">
                <a href="" data-petugas="add" class="btn btn-outline-light" data-target="#fPetugas" data-toggle="modal"><i class="fas fa-fw fa-solid fa-user-plus"></i>Tambah data</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="petugas">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama petugas</th>
                            <th>Username</th>
                            <th>Telp</th>                         
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <body>
                        <?php
                        $no = 0;
                        foreach ($petugas as $row) {
                            $no++;
                            $data = $row['id_petugas'] ."," .$row['nama_petugas'] . "," . $row['username'] . "," . $row['telp'] . "," . $row['level'] . "," . base_url('petugas/edit/' . $row['id_petugas']);
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['nama_petugas'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['telp'] ?></td>
                                <td><?= $row['level'] ?></td>
                                <td>
                                    <a href="" data-petugas="<?= $data ?>" data-target="#fPetugas" data-toggle="modal" class="btn btn-dark"><i class="fas fa-edit"></i>Edit</a>
                                    <a href="petugas/delete/<?=$row['id_petugas'] ?>" onclick="return confirm('Yakin mau hapus?')" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </body>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="fPetugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModelLabel">Input data Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editPetugas" action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" name="nama_petugas" class="form-control" id="nama_petugas">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="telp">telp</label>
                        <input type="number" name="telp" class="form-control" id="telp">
                    </div>

                    <div class="form-group">
                        <label for="level">level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">Pilih hak akses</option>
                            <option value="admin">admin</option>
                            <option value="petugas">petugas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ubahpassword">ubah password</label>
                        <input type="checkbox" name="ubahpassword" class="form-control" aria-label="mau ubah password" id="ubahpassword">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        //  alert(data);
        $("#fPetugas").on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var data = button.data('petugas');
            if (data != "add") {
                // alert(data);
                const barisdata = data.split(",");
                $('#nama_petugas').val(barisdata[1]);
                $('#username').val(barisdata[2]);
                $('#telp').val(barisdata[3]);
                $('#level').val(barisdata[4]).change();
                $('#editPetugas').attr('action', barisdata[5]);
                $('#ubahpassword').show();
            } else {
                $('#nama_petugas').val('');
                $('#username').val('');
                $('#telp').val('');
                $('#level').val('').change();
                $('#editPetugas').attr('action', 'petugas');
                // $('#ubahpassword').hide();
            }
        });
    })
</script>
<?= $this->endSection() ?>