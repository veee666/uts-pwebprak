
function getMsg(selector) {
  return $(selector).attr('data-msg');
}

$("#addsubs").validate({
    rules: {
      nama_paket: "required",
      harga_paket: "required",
    },
    messages: {
      nama_paket: getMsg('#nama_paket'),
      harga_paket: getMsg('#harga_paket')
    },
    submitHandler: function (form) {
        $("#add").modal('show');
        $('#submit').click(function () {
                form.submit();
          });
    }
});

$("#editsubs").validate({
    rules: {
      nama_paket: "required",
      harga_paket: "required",
    },
    messages: {
      nama_paket: getMsg('#nama_paket'),
      harga_paket: getMsg('#harga_paket')
    },
    submitHandler: function (form) {
        $("#update").modal('show');
        $('#edit').click(function () {
                form.submit();
          });
    }
});

$("#addmember").validate({
    rules: {
      namaMember: "required",
      password: "required",
      noTelpMember: "required",
      tgl_lahir: "required",
      emailMember: "required",
      foto: "required",
    },
    messages: {
        namaMember: getMsg('#nama'),
        password: getMsg('#psw'),
        noTelpMember: getMsg('#noTlp'),
        tgl_lahir: getMsg('#tgl_lahir'),
        emailMember: getMsg('#email'),
        foto: getMsg('#foto'),
    },
    submitHandler: function (form) {
        $("#member").modal('show');
        $('#input').click(function () {
                form.submit();
          });
    }
});

$("#editmember").validate({
    rules: {
      namaMember: "required",
      password: "required",
      noTelpMember: "required",
      tgl_lahir: "required",
      emailMember: "required",
      foto: "required",
    },
    messages: {
        namaMember: getMsg('#nama'),
        password: getMsg('#psw'),
        noTelpMember: getMsg('#noTelp'),
        tgl_lahir: getMsg('#tgl_lahir'),
        emailMember: getMsg('#email'),
        foto: getMsg('#foto'),
    },
    submitHandler: function (form) {
        $("#memberedit").modal('show');
        $('#inputedit').click(function () {
                form.submit();
          });
    }
});


$(document).ready(function(){
    $('.deleteSubsBtn').click(function(e) {
        e.preventDefault();

        var subs = $(this).val();
        $('#id').val(subs);

        $('#delete').modal('show');
    });
});

$(document).ready(function(){
    $('.deleteMemberBtn').click(function(e) {
        e.preventDefault();

        var member = $(this).val();
        $('#member_id').val(member);

        $('#delete_member').modal('show');
    });
});



