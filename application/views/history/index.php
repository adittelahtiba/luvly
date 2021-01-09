<div class="clearfix space40"></div>

<div class="account-wrap">

    <div class="container">

        <div class="row">

            <!-- HTML -->
            <div id="account-id">
                <div class="heading-sub text-left">
                    <h5>HISTORY</h5>
                </div>


            </div>
        </div>

        <div class="listuser">







            <div class="row heh">






                <div class="col-md-12">


                    <div class="form-group">

                        <table class="table table-striped text-center">
                            <tr>
                                <form action="<?= base_url('history/date'); ?>" method="post">
                                    <td><input class="form-control" type="date" name="date" id="date">
                                    <td><select class="form-control" id="optser">
                                            <option value="_">Server</option>
                                            <?php foreach ($select as $options) { ?>
                                                <option value="<?= $options['server']; ?>"><?= $options['server']; ?></option>
                                            <?php } ?>
                                        </select>
                                    <td><select class="form-control" id="opter">
                                            <option value="_">Error Type</option>
                                            <?php foreach ($err as $er) { ?>
                                                <option value="<?= $er['result']; ?>"><?= $er['result']; ?></option>
                                            <?php } ?>
                                        </select>
                                </form>
                        </table>


                    </div>
                </div>

                <div id="container">
                    <table class="table table-responsive table-striped">
                        <tr>
                            <th scope="col">Date
                            <th scope="col">Time
                            <th scope="col">Server
                            <th scope="col">Technisian Name
                            <th scope="col">Result
                            <th scope="col">Note
                                <?php if ($this->session->userdata('username')) {
                                    echo "<td>";
                                } ?>
                            <th scope="col">Verified
                        </tr>
                        <?php foreach ($histori as $his) {
                            echo "<tr class='bg-gray-400 text-dark'><td>" . $his['date'] . "<td>" . $his['time'] . "<td>" . $his['server'] . "<td>" . $his['name'] . "<td>" . $his['result'] . "<td>" . $his['note'];

                            if ($this->session->userdata('username')) {
                                echo "<td>";
                                if ($his['image']) {
                                    echo "<button  class='btn btn-user btn-block imej' data-image='" . $his['image'] . "'  data-toggle='modal' data-target='#image' ><span class='icon text-black'><i class='fa fa-photo'  data-target='#image'></i></span></button>";
                                } else {
                                    echo "<button  class='btn btn-user btn-block imej' data-image='" . $his['image'] . "'  data-toggle='modal' data-target='#image' disabled><span class='icon text-black'><i class='fa fa-photo'  data-target='#image'></i></span></button>";
                                }
                            } else {
                                echo "<i class='fas fa-x'></i>";
                            }
                            echo "<td>";
                            if ($his['verified'] == 'Y') {
                                echo "Yes";
                            } else {
                                echo "No";
                            }
                        } ?>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<br>
<br>
<br>
<br>
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