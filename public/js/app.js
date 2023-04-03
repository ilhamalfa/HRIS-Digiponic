$(function () {
    $("input[name='status_pernikahan']").click(function () {
        if ($("#Menikah").is(":checked") || $("#Cerai").is(":checked")) {
            $("#jumlah_anak").removeAttr("disabled");
            $("#jumlah_anak").focus();
        } else {
            $("#jumlah_anak").attr("disabled", "disabled");
        }
    });
});

document.getElementById('checkBox').onchange = function() {
    document.getElementById('berakhir').disabled = !this.checked;
};