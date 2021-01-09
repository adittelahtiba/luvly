$(document).ready(function () {
    console.log('luvly js aktif');


    $('.imej').on('click', function () {
        const image = $(this).data('image');
        console.log(image);
        $('.imej').attr('src', 'http://localhost/luvly/assets/img/' + image);
    });

    $('.server').on('click', function () {
        console.log('luvly tblll aktif');
        const control = $(this).data('control');
        const server = $(this).data('server');

        console.log(server);
        console.log(control);

        $('#hapus').attr('disabled', false);
        $('#tambah').attr('disabled', false);
        $('#edan').attr('href', 'http://localhost/luvly/control/editserver/' + control);
        $('#editserver').attr('disabled', false);


        $('#' + control).attr('class', 'danger');
        var control2 = control;
        $('.server').on('click', function () {
            $('#' + control2).attr('class', 'gradient');
            control2 = null;
        });



        $('.hapus').on('click', function () {
            $('#mdltittle2').html('');
            $('#bodymdl2').html('Do You Want To Delete?');
            $('#hps2').attr('href', 'http://localhost/luvly/control/hapus/' + control);
        });

        $('.tambah').on('click', function () {
            $('#frmtambah').attr('action', 'http://localhost/luvly/control/tambahdata/' + control);
            $('#id').val(control);
            $('#err').on('click', function () {
                $('.eroi').attr('hidden', false);
            });
            $('#err2').on('click', function () {
                $('.eroi').attr('hidden', true);
            });
        });
    });

    $('.hpsuser').on('click', function () {
        const nip = $(this).data('nip');
        $('#mdltittle3').html('');
        $('#bodymdl3').html('Do You Want To Delete?');
        $('#hps3').attr('href', 'http://localhost/luvly/setting/deleteuser/' + nip);
    });

    var date = document.getElementById('date');
    var optser = document.getElementById('optser');
    var opter = document.getElementById('opter');
    var container = document.getElementById('container');

    if (date.value == '') {
        console.log('tesnul');
    }
    date.addEventListener('keyup', function () {
        var xhr = new XMLHttpRequest()

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                container.innerHTML = xhr.responseText;
            }
        }

        xhr.open('GET', 'http://localhost/luvly/history/getcontrol/' + date.value + '/' + optser.value.replace(/\s/g, "") + '/' + opter.value.replace(/\s/g, ""), true);
        xhr.send();
    });
    date.addEventListener('input', function () {
        var xhr = new XMLHttpRequest()
        console.log(date.value);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                container.innerHTML = xhr.responseText;
            }
        }

        xhr.open('GET', 'http://localhost/luvly/history/getcontrol/' + date.value + '/' + optser.value.replace(/\s/g, "") + '/' + opter.value.replace(/\s/g, ""), true);
        xhr.send();
    });
    date.addEventListener('change', function () {
        var xhr = new XMLHttpRequest()
        console.log('close');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                container.innerHTML = xhr.responseText;
            }
        }

        if (date.value == '') {
            console.log('tesnul');
            xhr.open('GET', 'http://localhost/luvly/history/getcontrol/_/' + optser.value.replace(/\s/g, "") + '/' + opter.value.replace(/\s/g, ""), true);
        } else {
            xhr.open('GET', 'http://localhost/luvly/history/getcontrol/' + date.value + '/' + optser.value.replace(/\s/g, "") + '/' + opter.value.replace(/\s/g, ""), true);
        }
        xhr.send();
    });

    optser.addEventListener('input', function () {
        var xhr = new XMLHttpRequest()

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                container.innerHTML = xhr.responseText;
            }
        }
        if (date.value == '') {
            console.log('tesnul');
            xhr.open('GET', 'http://localhost/luvly/history/getcontrol/_/' + optser.value.replace(/\s/g, "") + '/' + opter.value.replace(/\s/g, ""), true);
        } else {
            xhr.open('GET', 'http://localhost/luvly/history/getcontrol/' + date.value + '/' + optser.value.replace(/\s/g, "") + '/' + opter.value.replace(/\s/g, ""), true);
        }
        xhr.send();
    });

    opter.addEventListener('input', function () {
        var xhr = new XMLHttpRequest()

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                container.innerHTML = xhr.responseText;
            }
        }

        if (date.value == '') {
            console.log('tesnul');
            xhr.open('GET', 'http://localhost/luvly/history/getcontrol/_/' + optser.value.replace(/\s/g, "") + '/' + opter.value.replace(/\s/g, ""), true);
        } else {
            xhr.open('GET', 'http://localhost/luvly/history/getcontrol/' + date.value + '/' + optser.value.replace(/\s/g, "") + '/' + opter.value.replace(/\s/g, ""), true);
        }
        xhr.send();
    });

});