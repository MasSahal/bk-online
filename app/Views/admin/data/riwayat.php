<div class="table-responsive" id="print">
    <?= $judul; ?>
    <table class="table table-striped table-hover" id="data-table-basic">
        <thead style="color:#fff;background:#bbbbbb">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Subjek</th>
                <th>Waktu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($riwayat as $r) : ?>
                <tr>
                    <td><?= $i += 1 ?></td>
                    <td><?= $r->nama ?></td>
                    <td><?= get_small_char($r->subjek, 50) ?> ...</td>
                    <td><?= date('d-m-Y H-i-s', strtotime($r->created_at)) ?></td>
                    <td>
                        <button type="button" class="badge badge-default" data-toggle="modal" data-target="#detail_<?= $r->id ?>"><i class="fa fa-eye"></i></button>
                    </td>
                </tr>

                <!-- modal detail Riwayat Kejadian -->
                <div class="modal fade" id="detail_<?= $r->id ?>" role="dialog">
                    <div class="modal-dialog modals-default">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="view-mail-hd">
                                    <div class="view-mail-hrd">
                                        <h4><?= $r->subjek ?></h4>
                                    </div>
                                    <!-- <div class="view-ml-rl">
                                                            <p><?= get_small_char($r->subjek, 50) ?></p>
                                                        </div> -->
                                </div>
                                <hr>
                                <p><?= $r->nama ?> : <?= $r->created_at ?></p>
                                <p><?= $r->catatan ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<div class="pt-3 material-design-btn">
    <button type="button" class="btn btn-warning notika-btn-warning" data-toggle="modal" data-target="#reset">Bersihkan</button>
    <button type="button" class="btn notika-btn-teal export_pdf">Export</button>
    <button type="button" class="btn notika-btn-indigo" onclick="print_data('print')">Print</button>
</div>