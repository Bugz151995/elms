var sidebarBtn = document.getElementById('sidebarBtn');
var sidebarBtnIcon = document.getElementById('sidebarBtnIcon');

$('#sidebarBtn').click(function () {
    if ($('#sidebar').hasClass('closedSidebar')) {
        $('#sidebar').addClass('openedSidebar');
        $('#topbar').addClass('openedSidebar');
        $('#content').addClass('openedSidebar');
        $('#sidebar').removeClass('closedSidebar');
        $('#topbar').removeClass('closedSidebar');
        $('#content').removeClass('closedSidebar');
    } else {
        $('#sidebar').addClass('closedSidebar');
        $('#topbar').addClass('closedSidebar');
        $('#content').addClass('closedSidebar');
        $('#sidebar').removeClass('openedSidebar');
        $('#topbar').removeClass('openedSidebar');
        $('#content').removeClass('openedSidebar');
    }
});

function successToast(msg) {
    $.toast({
        heading: 'Success',
        icon: 'success',
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
(function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()