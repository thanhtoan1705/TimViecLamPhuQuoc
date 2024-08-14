@extends('employer.layouts.master')
@section('title', 'Hẹn phỏng vấn')
@section('content')
    @push('css')
        <style>
            #calendar {
                max-width: 100%;
                margin: 0 auto;
            }

            .fc-highlight {
                background-color: #3C65F5 !important;
            }

            .modal-header,
            .modal-footer {
                background-color: white;
                color: black;
            }

            .calendar-toolbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 10px;
            }

            .calendar-toolbar .nav-buttons {
                display: flex;
                align-items: center;
            }

            .calendar-toolbar .nav-buttons span {
                margin: 0 5px;
                cursor: pointer;
            }

            .calendar-toolbar .view-buttons {
                display: flex;
                align-items: center;
            }

            .calendar-toolbar .view-buttons button {
                margin: 0 5px;
            }

            .current-date {
                font-weight: bold;
                margin: 0 10px;
            }
        </style>
    @endpush

    <div class="box-content">
        <div class="box-heading">
            <div class="box-title">
                <h3 class="mb-35">Hẹn phỏng vấn</h3>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        <li><a class='icon-home' href='index.html'>Quản trị</a></li>
                        <li><span>Hẹn phỏng vấn</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-12 col-xl-11 col-lg-11">
                <div class="section-box">
                    <div class="container">
                        <div class="panel-white mb-30">
                            <div class="box-padding">
                                <div class="calendar-toolbar">
                                    <div class="nav-buttons">
                                        <span id="prevMonth"><i class="bi bi-chevron-left"></i></span>
                                        <span id="currentDate" class="current-date"></span>
                                        <span id="nextMonth"><i class="bi bi-chevron-right"></i></span>
                                    </div>
                                    <div class="view-buttons">
                                        <button id="viewWeek" class="btn btn-primary"><i
                                                class="bi bi-calendar-week"></i>
                                            Tuần
                                        </button>
                                        <button id="viewMonth" class="btn btn-primary"><i
                                                class="bi bi-calendar-month"></i>
                                            Tháng
                                        </button>
                                    </div>
                                </div>
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-employer.footer></x-employer.footer>
    </div>

    <!-- Modal for event details -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Thêm thông tin phỏng vấn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        <div class="form-group">
                            <label for="interviewTitle">Tiêu đề phỏng vấn</label>
                            <input type="text" class="form-control" id="interviewTitle" required>
                        </div>
                        <div class="form-group">
                            <label for="interviewDate">Ngày phỏng vấn</label>
                            <input type="text" class="form-control" id="interviewDate" readonly>
                        </div>
                        <div class="form-group">
                            <label for="interviewTime">Giờ phỏng vấn</label>
                            <input type="text" class="form-control" id="interviewTime" readonly>
                        </div>
                        <input type="hidden" id="startTime">
                        <input type="hidden" id="endTime">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="saveEvent">Lưu</button>
                </div>
            </div>
        </div>
    </div>


    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.5/index.global.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.5/index.global.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.5/index.global.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.5/index.global.min.js"></script>

        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    selectable: true,
                    headerToolbar: false, // Hide default toolbar
                    views: {
                        dayGridMonth: {
                            buttonText: 'Tháng'
                        },
                        timeGridWeek: {
                            buttonText: 'Tuần'
                        }
                    },
                    select: function (info) {
                        // Set the selected time range in the hidden inputs
                        document.getElementById('startTime').value = info.startStr;
                        document.getElementById('endTime').value = info.endStr;

                        // Format date and time for display
                        var startDate = new Date(info.startStr);
                        var endDate = new Date(info.endStr);

                        document.getElementById('interviewDate').value = startDate.toLocaleDateString(
                            'vi-VN');
                        document.getElementById('interviewTime').value = startDate.toLocaleTimeString(
                            'vi-VN', {
                                hour: '2-digit',
                                minute: '2-digit'
                            }) + ' - ' + endDate.toLocaleTimeString('vi-VN', {
                            hour: '2-digit',
                            minute: '2-digit'
                        });

                        // Open the modal to input event details
                        var modal = new bootstrap.Modal(document.getElementById('eventModal'));
                        modal.show();
                    },
                    datesSet: function (info) {
                        // Update the current date display
                        var currentDate = document.getElementById('currentDate');
                        var start = new Date(info.view.currentStart);
                        var end = new Date(info.view.currentEnd);
                        currentDate.innerText = start.toLocaleDateString('vi-VN', {
                            month: 'long',
                            year: 'numeric'
                        });
                    }
                });
                calendar.render();

                // View buttons handlers
                document.getElementById('viewWeek').addEventListener('click', function () {
                    calendar.changeView('timeGridWeek');
                });
                document.getElementById('viewMonth').addEventListener('click', function () {
                    calendar.changeView('dayGridMonth');
                });

                // Navigation buttons handlers
                document.getElementById('prevMonth').addEventListener('click', function () {
                    calendar.prev();
                });
                document.getElementById('nextMonth').addEventListener('click', function () {
                    calendar.next();
                });

                // Save button handler
                document.getElementById('saveEvent').addEventListener('click', function () {
                    var title = document.getElementById('interviewTitle').value;
                    var startTime = document.getElementById('startTime').value;
                    var endTime = document.getElementById('endTime').value;

                    if (title) {
                        // Add event to the calendar
                        calendar.addEvent({
                            title: title,
                            start: startTime,
                            end: endTime,
                            allDay: false // Make sure the event is not an all-day event
                        });

                        // Hide the modal
                        var modal = bootstrap.Modal.getInstance(document.getElementById('eventModal'));
                        modal.hide();

                        // Reset the form
                        document.getElementById('eventForm').reset();
                    } else {
                        alert("Vui lòng nhập tiêu đề phỏng vấn");
                    }
                });
            });
        </script>
    @endpush

@endsection
