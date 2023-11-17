var tipo_evento = document.getElementById('tipo_evento');
var select = document.getElementById("horarios");
const eventModal = document.getElementById('eventModal');

tipo_evento.addEventListener('change', () => {
    var selectedOption = tipo_evento.options[tipo_evento.selectedIndex];
    var selectedValue = selectedOption.value;
    var el_allday = document.getElementById('flexSwitchCheckAllDay');

    if (selectedValue === 'feriado') {
        el_allday.removeAttribute('disabled');
    } else if (selectedValue === 'outro') {
        el_allday.removeAttribute('disabled');
        select.removeAttribute('disabled');
    } else {
        el_allday.setAttribute('disabled', 'disabled');
        select.removeAttribute('disabled');
    }
});

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'timeGridWeek,timeGridDay,listWeek,dayGridMonth'
        },
        locale: 'pt-br',
        buttonText: {
            today: 'Hoje',
            month: 'Mês',
            week: 'Semana',
            day: 'Dia',
            list: 'Lista'
        },
        themeSystem: 'bootstrap5',
        locale: 'pt-br',
        initialView: 'timeGridWeek',
        slotLabelFormat: {
            hour: '2-digit',
            minute: '2-digit',
            omitZeroMinute: false,
            meridiem: 'short'
        },
        slotMinTime: '08:00:00',
        slotMaxTime: '22:50:00',
        slotDuration: '00:15:00',
        slotLabelInterval: '00:15',
        eventTimeFormat: {
            hour: 'numeric',
            minute: '2-digit',
            meridiem: false
        },
        allDayText: 'dia todo',
        nowIndicator: true,
        selectable: true,
        businessHours: {
            // days of week. an array of zero-based day of week integers (0=Sunday)
            daysOfWeek: [1, 2, 3, 4, 5, 6], // Monday - Thursday

            startTime: '08:00', // a start time (10am in this example)
            endTime: '22:50', // an end time (6pm in this example)
        },
        selectConstraint: "businessHours",
        events: 'http://127.0.0.1:8000/api/agendamentos',
        eventClick: function (info) {

            const xmas95 = new Date(info.event.startStr);

            const allDay = info.event.allDay ? 'sim' : 'não';

            $('#event_title').html(info.event.title)
            $('#event_start').html(moment(xmas95).format('DD/MM/YYYY HH:mm'))
            $('#event_description').html(info.event.extendedProps.description)
            $('#event_type').html(info.event.extendedProps.type)
            $('#ask_all_day').html(allDay)
            $('#eventModal').modal('show');
            $('#editaAgendamento').attr('href', '/agendamento/' + info.event.id + '/edit');
            $('#deletaAgendamento').attr('href', '/agendamento/' + info.event.id + '/delete');
        }
    });
    calendar.render();

    popularHorarios();
});

// Função para preencher o select com horários de 15 em 15 minutos
function popularHorarios() {

    // Configurando o horário inicial e final
    var horarioInicial = new Date();
    horarioInicial.setHours(8, 0); // 8:00

    var horarioFinal = new Date();
    horarioFinal.setHours(22, 45); // 22:45

    // Preenchendo as opções
    while (horarioInicial <= horarioFinal) {
        var option = document.createElement("option");
        var hora = horarioInicial.getHours();
        var minutos = horarioInicial.getMinutes();

        // Formatando a hora para exibição
        var horaFormatada = hora.toString().padStart(2, '0');
        var minutosFormatados = minutos.toString().padStart(2, '0');

        option.text = horaFormatada + ":" + minutosFormatados;
        option.value = horaFormatada + ":" + minutosFormatados;

        select.add(option);

        // Adicionando 15 minutos ao horário atual
        horarioInicial.setMinutes(horarioInicial.getMinutes() + 15);
    }
}
