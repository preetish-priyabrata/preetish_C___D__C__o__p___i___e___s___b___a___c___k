$(document).ready(function() {
    // The pattern of times that accepts moments between 09:00 to 17:59
    var TIME_PATTERN = /^(09|1[0-7]{1}):[0-5]{1}[0-9]{1}$/;

    $('#meetingForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            startTime: {
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'The start time is required'
                    },
                    regexp: {
                        regexp: TIME_PATTERN,
                        message: 'The start time must be between 09:00 and 17:59'
                    },
                    callback: {
                        message: 'The start time must be earlier then the end one',
                        callback: function(value, validator, $field) {
                            var endTime = validator.getFieldElements('endTime').val();
                            if (endTime === '' || !TIME_PATTERN.test(endTime)) {
                                return true;
                            }
                            var startHour    = parseInt(value.split(':')[0], 10),
                                startMinutes = parseInt(value.split(':')[1], 10),
                                endHour      = parseInt(endTime.split(':')[0], 10),
                                endMinutes   = parseInt(endTime.split(':')[1], 10);

                            if (startHour < endHour || (startHour == endHour && startMinutes < endMinutes)) {
                                // The end time is also valid
                                // So, we need to update its status
                                validator.updateStatus('endTime', validator.STATUS_VALID, 'callback');
                                return true;
                            }

                            return false;
                        }
                    }
                }
            },
            endTime: {
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'The end time is required'
                    },
                    regexp: {
                        regexp: TIME_PATTERN,
                        message: 'The end time must be between 09:00 and 17:59'
                    },
                    callback: {
                        message: 'The end time must be later then the start one',
                        callback: function(value, validator, $field) {
                            var startTime = validator.getFieldElements('startTime').val();
                            if (startTime == '' || !TIME_PATTERN.test(startTime)) {
                                return true;
                            }
                            var startHour    = parseInt(startTime.split(':')[0], 10),
                                startMinutes = parseInt(startTime.split(':')[1], 10),
                                endHour      = parseInt(value.split(':')[0], 10),
                                endMinutes   = parseInt(value.split(':')[1], 10);

                            if (endHour > startHour || (endHour == startHour && endMinutes > startMinutes)) {
                                // The start time is also valid
                                // So, we need to update its status
                                validator.updateStatus('startTime', validator.STATUS_VALID, 'callback');
                                return true;
                            }

                            return false;
                        }
                    }
                }
            }
        }
    });
});
</script>