<div class="modal fade modal modal-primary" id='myModal7<?php echo $id_vaga ?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" title="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h6 style="color:#235C26"> <i class='fa fa-check-square'></i> - Prorrogar: <?php echo $id_vaga ?></h6>
            </div>
            <div class="modal-body text-center">
                <p style="font-size: 16px; color:#000"><strong><i>DESEJA REALMENTE PRORROGAR ESSA VAGA POR MAIS 15 DIAS?</i></strong></p>
                <hr>
                <p style="font-size: 14px; color:#000"><i>Ao confirmar a vaga será prorrogada por mais 15 dias.</i></p>
                <hr>
                <form action="./data/update/prorrogar_vaga.php" method="post">
                    <div class="form-group">
                    </div>
                    <input type="hidden" value="<?php echo $id_vaga ?>" name="id">

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success btn-simple" value="Sim"></button>
                        <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Não</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--  End Modal -->
</div>