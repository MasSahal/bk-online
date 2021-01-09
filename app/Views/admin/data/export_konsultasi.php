<style>
    * {
        font-family: helvetica, Arial, Segoe UI, Segoe UI Emoji;
    }

    .table-bordered {
        border: 1px solid black;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid black;
    }

    table {
        background-color: #fafafa;
        /* position: center; */
        font-size: 9;
    }

    .table tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.15);
    }

    thead {
        color: #fff;
        background: #222831;
    }

    .small {
        font-size: 8;
    }

    .em-1 {
        margin-top: 1em;
    }
</style>
<center>
    <h2 class='text-center mb-4 mt-2'><?= $judul; ?></h2>
    <table class="table table-bordered" border="1" cellspacing="0" cellpadding="3" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Subjek</th>
                <!-- <th>Lampiran</th> -->
                <th>Status</th>
                <th>Deskripsi</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($konsultasi as $r) : ?>
                <tr>
                    <td><?= $i += 1 ?></td>
                    <td><?= $r->nis_siswa ?></td>
                    <td><?= $r->nama ?></td>
                    <td><?= $r->subjek ?></td>
                    <!-- <td><?= $r->lampiran ?></td> -->
                    <td><?= $r->status ?></td>
                    <td><?= $r->deskripsi ?></td>
                    <td><?= $r->created_at ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</center>
<br>
<small class="small em-1"><?= $tanggal; ?></small>