/**
 * Created by kilic on 23.07.2016.
 */
function returnError(msg) {
    sweetAlert(
        msg.baslik,
        msg.msg,
        'error'
    );
}

function returnSuccess(msg) {
    swal(
        msg.baslik,
        msg.msg,
        'success'
    );
}