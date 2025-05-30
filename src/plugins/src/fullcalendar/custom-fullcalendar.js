document.addEventListener('DOMContentLoaded', function() {

    // Date variable
    var newDate = new Date();

    /** 
     * 
     * @getDynamicMonth() fn. is used to validate 2 digit number and act accordingly 
     * 
    */    
    function getDynamicMonth() {
        getMonthValue = newDate.getMonth();
        _getUpdatedMonthValue = getMonthValue + 1;
        if (_getUpdatedMonthValue < 10) {
            return `0${_getUpdatedMonthValue}`;
        } else {
            return `${_getUpdatedMonthValue}`;
        }
    }

    // Modal Elements
    var getModalTitleEl = document.querySelector('#event-title');
    var getModalStartDateEl = document.querySelector('#event-start-date');
    var getModalEndDateEl = document.querySelector('#event-end-date');
    var getModalAddBtnEl = document.querySelector('.btn-add-event');
    var getModalUpdateBtnEl = document.querySelector('.btn-update-event');
    var calendarsEvents = {
        Work: 'primary',
        Personal: 'success',
        Important: 'danger',
        Travel: 'warning',
    }

    // Calendar Elements and options
    var calendarEl = document.querySelector('.calendar');

    var checkWidowWidth = function() {
        if (window.innerWidth <= 1199) {
            return true;
        } else {
            return false;
        }
    }
    
    var calendarHeaderToolbar = {
        left: 'prev next addEventButton',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
    }
    // Calcola il prossimo lunedì
    let dayOfWeek = newDate.getDay();
    let diffToMonday = (dayOfWeek === 0 ? -6 : 1) - dayOfWeek; // Se è domenica, sottrae 6 giorni
    newDate.setDate(newDate.getDate() + diffToMonday);

    function getDateForDay(dayOffset) {
        let date = new Date(newDate);
        date.setDate(newDate.getDate() + dayOffset);
        let month = String(date.getMonth() + 1).padStart(2, '0'); // Mese con zero iniziale
        let day = String(date.getDate()).padStart(2, '0'); // Giorno con zero iniziale
        return `${date.getFullYear()}-${month}-${day}`;
    }

    var calendarEventsList = [
        // Ogni Lunedì
        {
            id: '1',
            title: 'Gold Gun GANG',
            start: `${getDateForDay(0)}`,
            end: `${getDateForDay(0)}`,
        },
        // Ogni Martedì
        {
            id: '2',
            title: 'Lucky Last Loot',
            color: 'red',
            start: `${getDateForDay(1)}`,
            end: `${getDateForDay(1)}`,
        },
        // Ogni Mercoledì
        {
            id: '3',
            title: 'Classic Caotic Crew',
            color: 'blue',
            start: `${getDateForDay(2)}`,
            end: `${getDateForDay(2)}`,
        },
        {
            id: '4',
            title: 'Heresy Heroes',
            color: 'green',
            start: `${getDateForDay(2)}`,
            end: `${getDateForDay(2)}`,
        },
    ];



    // Calendar Select fn.
    var calendarSelect = function(info) {
        getModalAddBtnEl.style.display = 'block';
        getModalUpdateBtnEl.style.display = 'none';
        myModal.show()
        getModalStartDateEl.value = info.startStr;
        getModalEndDateEl.value = info.endStr;
    }

    // Calendar AddEvent fn.
    var calendarAddEvent = function() {
        var currentDate = new Date();
        var dd = String(currentDate.getDate()).padStart(2, '0');
        var mm = String(currentDate.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = currentDate.getFullYear();
        var combineDate = `${yyyy}-${mm}-${dd}T00:00:00`;
        getModalAddBtnEl.style.display = 'block';
        getModalUpdateBtnEl.style.display = 'none';        
        myModal.show();
        getModalStartDateEl.value = combineDate;
    }

    // Calendar eventClick fn.
    var calendarEventClick = function(info) {
        var eventObj = info.event;

        if (eventObj.url) {
          window.open(eventObj.url);
  
          info.jsEvent.preventDefault(); // prevents browser from following link in current tab.
        } else {
            var getModalEventId = eventObj._def.publicId; 
            var getModalEventLevel = eventObj._def.extendedProps['calendar'];
            var getModalCheckedRadioBtnEl = document.querySelector(`input[value="${getModalEventLevel}"]`);

            getModalTitleEl.value = eventObj.title;
            getModalCheckedRadioBtnEl.checked = true;
            getModalUpdateBtnEl.setAttribute('data-fc-event-public-id', getModalEventId)
            getModalAddBtnEl.style.display = 'none';
            getModalUpdateBtnEl.style.display = 'block';
            myModal.show();
        }
    }
    

    // Activate Calender    
    var calendar = new FullCalendar.Calendar(calendarEl, {
        selectable: true,
        height: checkWidowWidth() ? 900 : 1052,
        initialView: checkWidowWidth() ? 'listWeek' : 'dayGridMonth',
        initialDate: `${newDate.getFullYear()}-${getDynamicMonth()}-07`,
        headerToolbar: calendarHeaderToolbar,
        events: calendarEventsList,
        select: calendarSelect,
        unselect: function() {
            console.log('unselected')
        },
        customButtons: {
            addEventButton: {
                text: 'Add Event',
                click: calendarAddEvent
            }
        },
        eventClassNames: function ({ event: calendarEvent }) {
            const getColorValue = calendarsEvents[calendarEvent._def.extendedProps.calendar];
            return [
              // Background Color
              'event-fc-color fc-bg-' + getColorValue
            ];
        },
        
        eventClick: calendarEventClick,
        windowResize: function(arg) {
            if (checkWidowWidth()) {
                calendar.changeView('listWeek');
                calendar.setOption('height', 900);
            } else {
                calendar.changeView('dayGridMonth');
                calendar.setOption('height', 1052);
            }
        }

    });

    // Add Event
    getModalAddBtnEl.addEventListener('click', function() {

        var getModalCheckedRadioBtnEl = document.querySelector('input[name="event-level"]:checked');
        
        var getTitleValue = getModalTitleEl.value;
        var setModalStartDateValue = getModalStartDateEl.value;
        var setModalEndDateValue = getModalEndDateEl.value;
        var getModalCheckedRadioBtnValue = (getModalCheckedRadioBtnEl !== null) ? getModalCheckedRadioBtnEl.value : '';

        calendar.addEvent({
            id: uuidv4(),
            title: getTitleValue,
            start: setModalStartDateValue,
            end: setModalEndDateValue,
            allDay: true,
            extendedProps: { calendar: getModalCheckedRadioBtnValue }
        })
        myModal.hide()
    })



    // Update Event
    getModalUpdateBtnEl.addEventListener('click', function() {
        var getPublicID = this.dataset.fcEventPublicId;
        var getTitleUpdatedValue = getModalTitleEl.value;
        var getEvent = calendar.getEventById(getPublicID);
        var getModalUpdatedCheckedRadioBtnEl = document.querySelector('input[name="event-level"]:checked');

        var getModalUpdatedCheckedRadioBtnValue = (getModalUpdatedCheckedRadioBtnEl !== null) ? getModalUpdatedCheckedRadioBtnEl.value : '';
        
        getEvent.setProp('title', getTitleUpdatedValue);
        getEvent.setExtendedProp('calendar', getModalUpdatedCheckedRadioBtnValue);
        myModal.hide()
    })
    
    // Calendar Renderation
    calendar.render();
    
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'))
    var modalToggle = document.querySelector('.fc-addEventButton-button ')

    document.getElementById('exampleModal').addEventListener('hidden.bs.modal', function (event) {
        getModalTitleEl.value = '';
        getModalStartDateEl.value = '';
        getModalEndDateEl.value = '';
        var getModalIfCheckedRadioBtnEl = document.querySelector('input[name="event-level"]:checked');
        if (getModalIfCheckedRadioBtnEl !== null) { getModalIfCheckedRadioBtnEl.checked = false; }
    })
});