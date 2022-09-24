function qrScanner() {
    var resultContainer = document.getElementById('qr-reader-results');
    var lastResult, countResults = 0;
    
    function onScanSuccess(decodedText, decodedResult) {
        if (decodedText !== lastResult) {
            ++countResults;
            lastResult = decodedText;
            // Handle on success condition with the decoded message.
            console.log(`Scan result ${decodedText}`, decodedResult);
        }
    }
    
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess);
}

/**
 * refine thihs code lateer
 */
$('#sidebarBtn').click(function () {
    var isClosed = $('#sidebar').css('left') === "-280px" ? true : false;
    if (isClosed) {
        $('#sidebar').addClass('opened');
        $('#topbar').addClass('opened');
        $('#content').addClass('opened');
        $('#sidebar').removeClass('closed');
        $('#topbar').removeClass('closed');
        $('#content').removeClass('closed');
    } else {
        $('#sidebar').addClass('closed');
        $('#topbar').addClass('closed');
        $('#content').addClass('closed');
        $('#sidebar').removeClass('opened');
        $('#topbar').removeClass('opened');
        $('#content').removeClass('opened');
    }
});

/**
 * topbar
 */
$(window).scroll(function () {
    var scrollPosition = $(window).scrollTop();
    console.log(scrollPosition);
    scrollPosition > 0 ? $('#topbar').toggleClass('shadow') : $('#topbar').removeClass('shadow');
});

function successToast(msg) {
    $.toast({
        heading: 'Success',
        icon: 'success',
        text: msg,
        showHideTransition: 'slide', // It can be plain, fade or slide
        bgColor: '#198754', // Background color for toast
        textColor: '#eee', // text color
        hideAfter: 5000, // `false` to make it sticky or time in miliseconds to hide after
        stack: 5, // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
        textAlign: 'left', // Alignment of text i.e. left, right, center
        position: 'bottom-left' // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
    })
}

function warningToast(msg) {
    $.toast({
        heading: 'Warning',
        icon: 'warning',
        text: msg,
        showHideTransition: 'slide', // It can be plain, fade or slide
        bgColor: '#fd7e14', // Background color for toast
        textColor: '#eee', // text color
        hideAfter: 5000, // `false` to make it sticky or time in miliseconds to hide after
        stack: 5, // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
        textAlign: 'left', // Alignment of text i.e. left, right, center
        position: 'bottom-left' // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
    })
}

function errorToast(msg) {
    $.toast({
        heading: 'Error',
        icon: 'error',
        text: msg,
        showHideTransition: 'slide', // It can be plain, fade or slide
        bgColor: 'red', // Background color for toast
        textColor: '#eee', // text color
        hideAfter: 5000, // `false` to make it sticky or time in miliseconds to hide after
        stack: 5, // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
        textAlign: 'left', // Alignment of text i.e. left, right, center
        position: 'bottom-left' // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
    })
}

function infoToast(msg) {
    $.toast({
        heading: 'Information',
        icon: 'info',
        text: msg,
        showHideTransition: 'slide', // It can be plain, fade or slide
        bgColor: 'blue', // Background color for toast
        textColor: '#eee', // text color
        hideAfter: 5000, // `false` to make it sticky or time in miliseconds to hide after
        stack: 5, // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
        textAlign: 'left', // Alignment of text i.e. left, right, center
        position: 'bottom-left' // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
    })
}
// TODO: toggle functionality on sidebar toggle button

/**
 * @param int id
 * @param string placeHolderText
 * @param string strArray
 * 
 * @return [type]
 */
function autocompleteInit(id, placeHolderText, strArray) {
    const autoCompleteJS = new autoComplete({
        selector: id,
        placeHolder: placeHolderText,
        data: {
            src: [strArray],
            cache: true,
        },
        resultsList: {
            element: (list, data) => {
                if (!data.results.length) {
                    // Create "No Results" message element
                    const message = document.createElement("div");
                    // Add class to the created element
                    message.setAttribute("class", "no_result");
                    // Add message text content
                    message.innerHTML = `<span>Found No Results for "${data.query}"</span>`;
                    // Append message element to the results list
                    list.prepend(message);
                }
            },
            noResults: true,
        },
        resultItem: {
            highlight: true,
        },
        events: {
            input: {
                selection: (event) => {
                    const selection = event.detail.selection.value;
                    autoCompleteJS.input.value = selection;
                }
            }
        }
    });
}

// data tables initialization
$(document).ready(function () {
    $('#table').DataTable({
        responsive: true
    });
});

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()