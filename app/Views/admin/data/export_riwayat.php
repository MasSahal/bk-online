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
        position: center;
        font-size: 10;
    }

    .table tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    thead {
        color: #fff;
        background: #222831;
    }

    .small {
        font-size: 8;
    }

    .medium {
        font-size: 10;
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
                <th>Nama</th>
                <th>Subjek</th>
                <th>Jenis</th>
                <th>Role</th>
                <th>Waktu</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody class="medium">
            <?php
            $i = 0;
            foreach ($riwayat as $r) : ?>
                <tr>
                    <td><?= $i += 1 ?></td>
                    <td><?= $r->nama ?></td>
                    <td><?= $r->subjek ?></td>
                    <td><?= $r->jenis ?></td>
                    <td><?= $r->role ?></td>
                    <td><?= $r->created_at ?></td>
                    <td><?= $r->catatan ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</center>
<br>
<small class="small em-1"><?= $tanggal; ?></small>