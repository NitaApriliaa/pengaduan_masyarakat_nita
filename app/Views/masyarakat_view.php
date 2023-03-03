<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
  Masyarakat
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-gradient-success">
                <a href="#" data-masyarakat="add" class="btn btn-outline-light" data-target="#fmasyarakat" data-toggle="modal"><i class="fas fa-fw fa-solid fa-user-plus"></i>Tambah data</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="masyarakat">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Telp</th>                         
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <body>
                        <?php
                        $no = 0;
                        foreach ($masyarakat as $row) {
                            $no++;
                            $data = $row['nik'] . "," . $row['nama'] . "," . $row['username'] . "," . $row['password'] . "," . $row['telp'] . "," . base_url('/masyarakat/edit/' . $row['id_masyarakat']);
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['nik'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['telp'] ?></td>
                                <td>
                                    <a href="" data-masyarakat="<?= $data ?>" data-target="#fmasyarakat" data-toggle="modal" class="btn btn-success"><i class="fas fa-edit"></i>Edit</a>
                                    <a href="/masyarakat/delete/<?=$row['id_masyarakat'] ?>" onclick="return confirm('Yakin mau hapus?')" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
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
<div class="modal fade" id="fmasyarakat" tabindex="-1" aria-labelledby="modalMasyarakatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModelLabel">Input Data Masyarakat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editMasyarakat" action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama </label>
                        <input type="text" name="nama" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="text" name="nik" class="form-control" id="nik">
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
                        <input type="text" name="telp" class="form-control" id="telp">
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
<?= $this->Section('script') ?>
<script>
   $(document).ready(function() {
        $("#fmasyarakat").on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var data = button.data('masyarakat');
            if (data!= "add") {
                const barisdata = data.split(",");
                $('#nik').val(barisdata[0]);
                $('#nama').val(barisdata[1]);
                $('#username').val(barisdata[2]);
                $('#password').val(barisdata[3]);
                $('#telp').val(barisdata[4]);
                $('#editMasyarakat').attr('action', barisdata[5]);
                // $('#ubahpassword').show();
            }else {
                $('#nik').val('');
                $('#nama').val('');
                $('#username').val('').change();
                $('#password').val('');
                $('#telp').val('');
                $('#editMasyarakat').attr('action', 'masyarakat');
                // $('#ubahpassword').hide();
            }
        });
    })
</script>
<?= $this->endSection() ?>