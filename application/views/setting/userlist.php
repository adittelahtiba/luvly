<div class="clearfix space40"></div>




<div class="account-wrap">


  <div class="container">


    <div class="row">

      <!-- HTML -->
      <div id="account-id">
        <div class="heading-sub text-left">
          <h5>USER LIST</h5>
        </div>

        <?= $this->session->flashdata('message'); ?>
      </div>
    </div>




    <div class="listuser">






      <div class="row">

        <div class="col-md-5  text-left">


          <table class="table table-striped">
            <?php
            foreach ($userlist as $ulis) {
              $i++;
              echo "<tr><td><button class='btn btn-secondary btn-user btn-block hpsuser' data-nip=" . $ulis['nip'] . "  data-toggle='modal' data-target='#modaldelete'>" . $ulis['nama'] . "</button>";
            }
            ?>
            </button>
            </td>
            </tr>


          </table>
          <a href="<?php if ($i <= 9) {
                      echo "#";
                    } else {
                      echo base_url('setting/userlist');
                    }  ?>/<?= $i - 18; ?>"><button class="btn btn-black" style="background-color: #080745;" <?php if ($i <= 9) echo "disabled"; ?>>Prev</button></a>
          <a href="<?php if ($i == $batas) {
                      echo "#";
                    } else {
                      echo base_url('setting/userlist');
                    }  ?>/<?= $i; ?>"><button class="btn btn-black" style="background-color: #080745;" <?php if ($i == $batas) echo "disabled"; ?>>Next</button></a>




        </div>



      </div>





    </div>




  </div>


















</div>
</div>




</div>
</div>
</div>
<div class="clearfix space50"></div>





<!-- Modal -->

<div id="modaldelete" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;
        </button>
        <h4 class="modal-title text-center">Do you want to delete ?</h4>
      </div>
      <div class="modal-footer">
        <div class="buttons-set text-center">
          <button class="btn btn-danger" type="button" data-dismiss="modal">CANCEL</button>
          <a href="" id="hps3"><button type="submit" class="btn btn-primary" style="background-color: #080745;">YES</button></a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>