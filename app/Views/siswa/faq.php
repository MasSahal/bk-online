<?= $this->extend("siswa/template") ?>

<?= $this->section("content"); ?>
<!-- Start Sale Statistic area-->
<div class="sale-statistic-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box-content notika-shadow mg-tb-30">
                    <div class="accordion-stn sm-res-mg-t-30">
                        <div class="panel-group" data-collapse-color="nk-blue" id="accordionBlue" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-collapse notika-accrodion-cus">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordionBlue" href="#accordionBlue-one" aria-expanded="true">
                                            FAQ - Aplikasi Bk-Online
                                        </a>
                                    </h4>
                                </div>
                                <div id="accordionBlue-one" class="collapse animated flipInX in" role="tabpanel">
                                    <div class="panel-body">
                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry cry then richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf msr noontemporem, sunt aliqua put a bird on it squid single-origin coffee nullassumendan shoreditch et.</p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $i = 0;
                            foreach ($faq as $r) { ?>

                                <div class="panel panel-collapse notika-accrodion-cus">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionBlue" href="#accordion<?= $r->id ?>" aria-expanded="false">
                                                <?= $r->pertanyaan ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="accordion<?= $r->id ?>" class="collapse animated flipInX" role="tabpanel">
                                        <div class="panel-body">
                                            <p><?= str_replace(" ", "&nbsp;", $r->jawaban) ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Sale Statistic area-->
<?= $this->endSection(""); ?>