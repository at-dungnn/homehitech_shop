$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    error: function(response){       
        // window.location.href = '/';
        console.log(response);
    }
});

$(document).ready(function() {
    try {
        refreshToken();

        $(document).ajaxStart(function () {
          callWaiting();
        });

        $(document).ajaxStop(function () {
           closeWaiting();
        });
    } catch (e) {
        console.log(e.message);
    }
});

/**
 * refreshToken
 *
 * @author      :   VietPro - create
 */
function refreshToken(){
    try {
        setInterval(function(){ 
            $.ajax({
            type        :   'POST',
            url         :   '/refresh-token',
            dataType    :   'json',
            async       :   false,
            success: function(res) {

                if (res.response == 'true') {
                    
                    $('meta[name="csrf-token"]').attr('content',res.data);
                };
            },
            
        });
        }, ( SESSION_LIFE_TIME - 0.5)*60*1000);//milisecond -- 60 minutes
    } catch (e) {
        alert('refreshToken:' + e.message);
    }
}

/**
 * callWaiting
 *
 * @author      :   VietPro - create
 */
function  callWaiting(){
    $.blockUI({
        message: '<i class="fa fa-spinner" style="font-size: 30px;"></i>',
        overlayCSS: {
            backgroundColor: '#1b2024',
            opacity: 0.5,
            zIndex: 1200,
            cursor: 'default'
        },
        css: {
            border: 0,
            color: '#fff',
            padding: 0,
            zIndex: 1201,
            backgroundColor: 'transparent'
        }
    });
}

/**
 * closeWaiting
 *
 * @author      :   VietPro - create
 */
function closeWaiting() {
    $.unblockUI({});
}


/**
 * showNotification
 *
 * @author      :   VietPro - create
 */
function showNotification(msg,type){           
            $.notify({
                // options
                icon: 'fa fa-bell',
                message: msg
            },{
                // settings
                element: 'body',
                position: null,
                type: type,
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>' 
            });
        }