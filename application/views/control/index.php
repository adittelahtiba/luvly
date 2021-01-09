<div class="clearfix space40"></div>

<div class="account-wrap">

    <div class="container">

        <div class="row">

            <!-- HTML -->
            <div id="account-id">
                <div class="heading-sub text-left">
                    <h5>CONTROL</h5>
                </div>
                <?= $this->session->flashdata('message'); ?>

            </div>
        </div>

        <table class="table table-responsive table-striped">
            <?php
            foreach ($control as $ctrl) {
                $i++;
                echo "<tr  class='' id='" . $ctrl['id'] . "'><td width=20%><button class='btn btn-secondary btn-user btn-block server' data-control=" . $ctrl['id'] . " data-server=" . $ctrl['server'] . ">";
                echo $ctrl['server'];
                echo "</button><td>";

                if ($ctrl['name']) {
                    if ($this->session->userdata('nip')) {
                        echo "<button class='btn btn-secondary btn-user btn-block server' data-control=" . $ctrl['id'] . " data-server=" . $ctrl['server'] . ">" . $ctrl['control'];
                        echo "</button>";
                    }
                    if ($this->session->userdata('username')) {
                        echo " <span class='icon text-white-50'>";
                        if (!$ctrl['image']) {
                            echo "<button class='btn btn-secondary btn-user btn-block server' data-control=" . $ctrl['id'] . " data-server=" . $ctrl['server'] . ">" . $ctrl['control'];
                            echo "</button><td width=3%><button  class='btn btn-secondary btn-user btn-block' disabled><span class='icon text-white-50'><i class='fa fa-image'  data-target='#image'></i></span></button></td>";
                        } else {
                            echo "<button class='btn btn-secondary btn-user btn-block server' data-control=" . $ctrl['id'] . " data-server=" . $ctrl['server'] . ">" . $ctrl['control'];
                            echo "</button><td><button  class='btn btn-user btn-block imej' data-image='" . $ctrl['image'] . "'  data-toggle='modal' data-target='#image' ><span class='icon text-black'><i class='fa fa-photo'  data-target='#image'></i></span></button></td>";
                        }
                    }
                } else {
                    if ($this->session->userdata('username')) {
                        echo "<button class='btn btn-secondary btn-user btn-block server' data-control=" . $ctrl['id'] . " data-server=" . $ctrl['server'] . ">...</button><td></button><button  class='btn btn-secondary btn-user btn-block' disabled><span class='icon text-white-50'><i class='fa fa-image'  data-target='#image'></i></span></button></td>";
                    } else {
                        echo "<button class='btn btn-secondary btn-user btn-block server' data-control=" . $ctrl['id'] . " data-server=" . $ctrl['server'] . ">...</button>";
                    }
                }
                echo "<td width=10%>";
                if ($ctrl['verified'] == 'Y') { ?>
                    <a href="<?php if ($this->session->userdata('username')) {
                                    echo base_url('control/unverified/') . $ctrl['id'];
                                } else {
                                    echo "#";
                                } ?>" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fa fa-check"></i>
                        </span>
                        <span class="text">Verified</span>
                    </a>
                    </a>
                <?php } else { ?>
                    <a href="<?php if ($this->session->userdata('username')) {
                                    echo base_url('control/verified/') . $ctrl['id'];
                                } else {
                                    echo "#";
                                }  ?>" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-"></i>
                        </span>
                        <span class="text">Unverified</span>
                    </a>
                <?php }
                echo "</td>";
            }
            ?>
        </table>
        <br>
        <!-- gue -->
        <?php
        if ($menu == 1) {
            ?>
            <a href="<?= base_url('setting/addserver'); ?>"><button class="btn btn-success">Add Server</button></a>

        <?php
        } elseif ($menu == 2) { ?>
            <button type="button" id="hapus" class="btn btn-danger hapus" data-toggle="modal" data-target="#exampleModal2" disabled>Delete</button>
        <?php
        } elseif ($menu == 3) { ?>
            <a href="" id="edan"><button type="submit" class="btn btn-success editserver" id="editserver" data-toggle="modal" disabled>Edit Server</button></a>
        <?php
        } else {
            if (!$this->session->userdata('username')) {
                ?>
                <button id="tambah" class="btn btn-danger tambah" data-toggle="modal" data-target="#exampleModal" disabled>Edit Server</button>
            <?php
            }
        }
        if ($this->session->userdata('username')) { ?>
            <p align="right">
                <a href="<?php if ($i <= 9) {
                                echo "#";
                            } else {
                                echo base_url('control/index');
                            } ?>/<?= $i - 18; ?>/<?= $menu; ?>">
                    <button class="btn btn-black  text-light" style="background-color: #080745;" <?php if ($i <= 9) echo "disabled"; ?>>Prev</button>
                </a>
                <a href="<?php if ($i == $batas) {
                                echo "#";
                            } else {
                                echo base_url('control/index');
                            } ?>/<?= $i; ?>/<?= $menu; ?>">
                    <button class="btn btn-black  text-light" style="background-color: #080745;" <?php if ($i == $batas) echo "disabled"; ?>>Next</button>
                </a>
            </p>
        <?php } else { ?>
            <p align="right">
                <a href="<?php if ($i <= 9) {
                                echo "#";
                            } else {
                                echo base_url('control/user');
                            } ?>/<?= $i - 18; ?>/<?= $menu; ?>">
                    <button class="btn btn-black  text-light" style="background-color: #080745;" <?php if ($i <= 9) echo "disabled"; ?>>Prev</button>
                </a>
                <a href="<?php if ($i == $batas) {
                                echo "#";
                            } else {
                                echo base_url('control/user');
                            } ?>/<?= $i; ?>/<?= $menu; ?>">
                    <button class="btn btn-black  text-light" style="background-color: #080745;" <?php if ($i == $batas) echo "disabled"; ?>>Next</button>
                </a>
            </p>
        <?php } ?>
    </div>
    <!-- gue lagi -->

    <br>
    <br>
    <br>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a href="" id="hps2"><button type="submit" class="btn btn-primary" style="background-color: #080745;">YES</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <button type="button" class="danger close" data-dismiss="modal">&times;
        </button>
        <img id="imej" class="imej" src="http://localhost/luvly/assets/img/bukti.png" width=600px>
        <center>
            <button class="btn btn-danger" type="button" data-dismiss="modal">&times;</button></center>
    </div>
</div>




<!-- Modal ieu-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdltittle">Edit Server</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="bodymdl">
                <form action="" method="post" enctype="multipart/form-data" id="frmtambah">
                    <div class="container">

                        <input type="text" name="id" id="id" value="" hidden>


                        <div class="form-group row">
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                Technisian Name

                                <input class="form-control form-control-user" type="text" name="nama" value="" placeholder="Technisian Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                Date


                                <input class="form-control form-control-user" type="date" name="date" value="" placeholder="Date of Control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                Time

                                <input class="form-control form-control-user" type="time" name="time" value="" placeholder="Time of Control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Result
                                <div class="clearfix space10"></div>

                                <input type="radio" name="result" value="Functionate" id="err2">Functionate<br>
                                <input type="radio" name="result" value="Error" id="err">Error


                                <div class="col-sm-12 eroi" hidden>
                                    <!-- <input type="radio" name="result" data-ero="Hardware" value="Functionate Error"> Functionate<br> -->
                                    <input type="radio" name="result" data-ero="Software" value="Hardware Error"> Hardware<br>
                                    <input type="radio" name="result" data-ero="Software" value="Software Error"> Software
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                Note

                                <input class="form-control form-control-user" type="text" name="note" value="" placeholder="Note">
                                <input type="file" name="image">
                            </div>
                        </div>
                        </input>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="" id="hps"><button type="submit" class="btn btn-primary" style="background-color: #080745;">Save</button></a>
                </form>
            </div>
        </div>
    </div>
</div>