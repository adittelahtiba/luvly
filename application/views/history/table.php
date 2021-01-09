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