$(document).ready(function () {
    $('a.requestSendBy').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: $(this).attr('href'),
            method: $(this).data('method'),
            success: function (response) {
                return response ? location.reload() : '';
            }
        });
    });
    $('a#followUser, a#unfollowUser, a.wishlist').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: $(this).attr('href'),
            method: 'POST',
            data: {
                id: $(this).data('id')
            },
            success: function (response) {
                return response ? location.reload() : '';
            },
        });
    });
    $(document).on('click', 'a.rate-review', function (e) {
        e.preventDefault();
        let rateLink = $(this);
        let numbers = rateLink.find('span');
        let id = $(this).data('id');
        let href = $(this).attr('href');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: href,
            method: 'POST',
            data: {
                id: id
            },
            success: function (response) {
                if (response === '2') {
                    numbers = Number(numbers.html()) + 1;
                    rateLink.parent().append('<a href="' + href + '"\n' +
                        'data-id="' + id + '" class="rate-review color-red"><i\n' +
                        'class="fal fa-thumbs-down color-red"></i> Remove Like\n' +
                        '<span>' + numbers + '</span> </a>');
                } else if (response === '3') {
                    numbers = Number(numbers.html()) - 1;
                    rateLink.parent().append('<a href="' + href + '"\n' +
                        'data-id="' + id + '" class="rate-review"><i\n' +
                        'class="fal fa-thumbs-up"></i> Helpful Review\n' +
                        '<span>' + numbers + '</span> </a>');
                }
                return rateLink.remove();
            },
        });
    });
    $('a#logout').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: $(this).attr('href'),
            method: 'POST',
            data: {
                '_token': $(this).data('token'),
            },
            success: function (response) {
                return response ? location.reload() : '';
            },
        });
    });
    $('.soc-log input[name=method]').change(function (e) {
        if($(this).is(':checked')){
            $(this).parent().siblings('input[type=submit]').prop('disabled',false)
        }else {
            $(this).parent().next('input[type=submit]').prop('disabled',true)
        }
        let inputId = $(this).attr('id');
        $(this).next('label[for=' + inputId + '] ').css('opacity', '0.7');
    });


    function addWorkingHours(element) {
        var hours = 2;
        if (element.prop('checked')) {
            $(element).parent().after('<div class="custom-form">\n' +
                '                                <div class="col-sm-6">\n' +
                '                                    <label for="day-1"><i class="far fa-clock"></i>Day</label>\n' +
                '                                    <input type="text" name="working_hours[1][day]" id="day-1" placeholder="Day">\n' +
                '                                </div>\n' +
                '                                <div class="col-sm-6">\n' +
                '                                    <label for="hour-1"><i class="far fa-clock"></i>Hours</label>\n' +
                '                                    <input type="text" name="working_hours[1][hour]" id="hour-1" placeholder="Hours">\n' +
                '                                </div>\n' +
                '                                <a href="#" class="left-text color-blue" id="addWorkingHours">Add a new hour</a>\n' +
                '                            </div>');
            $('#addWorkingHours').click(function (event) {
                event.preventDefault();
                var newDayInput = $("<div class='col-sm-6'> " +
                    "<label for='" + hours + "'><i class='far fa-clock'></i>Hour</label>" +
                    "<input type='text' name='working_hours[" + hours + "][day]' id='" + hours + "' placeholder='Day'>" +
                    "</div>");
                var newHoursInput = $("<div class='col-sm-6'>" +
                    "<label for='hour-" + hours + "'><i class='far fa-clock'></i>Hours</label>" +
                    "<input type='text' name='working_hours[" + hours + "][hour]' placeholder='Hours'>" +
                    "</div>");
                $(this).before(newDayInput, newHoursInput);
                hours++;
            });
        } else {
            element.parent().parent().find('.custom-form').remove();
        }
    }

    var WorkingHoursSwitch = $('#working_hours');
    addWorkingHours(WorkingHoursSwitch);
    WorkingHoursSwitch.click(function () {
        addWorkingHours($(this));
    });


    function addPriceRange(element) {
        if (element.prop('checked')) {
            $(element).parent().after('                            <div class="custom-form">\n' +
                '                                <label for="priceRangeInput"><i class="fa fa-money-bill"></i>Price</label>\n' +
                '                                <input type="text" name="price_range" id="priceRangeInput">\n' +
                '                            </div>');
        } else {
            element.parent().parent().find('.custom-form').remove();
        }
    }

    var PriceRangeSwitch = $('#price_range');
    addPriceRange(PriceRangeSwitch);
    PriceRangeSwitch.click(function () {
        addPriceRange($(this));
    });


    var addFacilitiesBtn = $('#addFacilitiesBtn');
    addFacilitiesBtn.click(function (event) {
        event.preventDefault();
        let icon = $(this).parent().find('#facilities_icon').val();
        let text = $(this).parent().find('#facilities_text').val();
        if (icon && text) {
            $(this).parent().parent().find('ul').append('                        <li>\n' +
                '                            <input id="check-aaa5" type="checkbox" name="facilities[' + text + ']" value="' + icon + '" checked>\n' +
                '                            <label for="check-aaa5">' + text + '</label>\n' +
                '                        </li>');
        }
    });


    function addAccordionMenu(element) {
        let menus = 2;
        if (element.prop('checked')) {
            $(element).parent().after('                                    <div class="custom-form">\n' +
                '                                            <label for="accordion-title-1">Title 1:<i class="fa fa-text"></i></label>\n' +
                '                                            <input type="text" name="accordion[1][title]" id="accordion-title-1"/>\n' +
                '                                            <label for="accordion-content-1">Content 1:</label>\n' +
                '                                            <textarea class="bottom-space" name="accordion[1][content]" id="accordion-content-1" cols="30"\n' +
                '                                                      rows="10"></textarea>\n' +
                '                                    <a href="#" id="addAccordionMenu" class="left-text color-blue">Add New Menu</a>\n' +
                '                                    </div>');
            $('#addAccordionMenu').click(function (event) {
                event.preventDefault();
                var newTitleInput = $(
                    '                                            <label for="accordion-title-' + menus + '">Title ' + menus + ':<i class="fa fa-text"></i></label>\n' +
                    '                                            <input type="text" name="accordion[' + menus + '][title]" id="accordion-title-' + menus + '"/>\n');
                var newContentInput = $('                        <label for="accordion-content-' + menus + '">Content ' + menus + ':</label>\n' +
                    '                                            <textarea class="bottom-space" name="accordion[' + menus + '][content]" id="accordion-content-' + menus + '" cols="30"\n' +
                    '                                                      rows="10"></textarea>\n');
                $(this).before(newTitleInput, newContentInput);
                menus++;
            });
        } else {
            element.parent().parent().find('.custom-form').remove();
        }
    }

    var accordionMenu = $('#accordion_menu');
    addAccordionMenu(accordionMenu);
    accordionMenu.click(function () {
        addAccordionMenu($(this));
    });


    function addBookingForm(element) {
        let count = 2;
        if (element.prop('checked')) {
            $(element).parent().after('<div class="booking-options">' +
                '<label for="option1">Option 1</label>\n' +
                '<input type="text" id="option1" name="bookingOptions[]">' +
                '<a href="#" id="addBookingInput" class="left-text color-blue">Add New Option</a>\n' +
                '</div>'
            );
            $('#addBookingInput').click(function (event) {
                event.preventDefault();
                $(this).before('<label for="option' + count + '">Option ' + count + '</label>\n' +
                    '<input type="text" id="option' + count + '" name="bookingOptions[]">');
                count++;
            });
        } else {
            element.parent().parent().find('.booking-options').remove();
        }
    }

    var bookingSelect = $('#onBookingSelect');
    addBookingForm(bookingSelect);
    bookingSelect.click(function () {
        addBookingForm($(this));
    });

    $('#header_image_background_input').change(function (event) {
        var output = $('#header_image_background_image');
        output.parent().find('.fu-text').css('display', 'none');
        output.attr('src', URL.createObjectURL(event.target.files[0]));
    });
    $('#thumbnail_image_input').change(function (event) {
        var output = $('#thumbnail_image_img');
        output.parent().find('.fu-text').css('display', 'none');
        output.attr('src', URL.createObjectURL(event.target.files[0]));
    });
    $('#header_image_carousel_input').change(function (event) {
        let wrapper = $(this).parent();
        wrapper.find('.fu-text').css('display', 'none');
        for (let i = 0; i < event.target.files.length; i++) {
            $($.parseHTML('<img class="uploadMultiImagesOnline" />')).attr('src', URL.createObjectURL(event.target.files[i])).appendTo(wrapper);
        }
    });
    $('.rate-range').change(function () {
        let clean = Number($('.rate-range[name=clean]').val());
        let comfort = Number($('.rate-range[name=comfort]').val());
        let staff = Number($('.rate-range[name=staff]').val());
        let facility = Number($('.rate-range[name=facility]').val());
        let avg = (clean + comfort + staff + facility);
        avg = avg / 4;
        console.log(clean + ',' + comfort + ', ' + staff + ', ' + facility + ', ' + avg)
        $('.custom-form .review-total span input[name=rg_total]').val(avg);
    });

});
