@extends('layout.backend.main')

@section('css')
    <style>
        /* নেগেটিভ মার্জিন সরিয়ে স্বাভাবিক স্পেসিং দেওয়া হয়েছে */
        .homeContents {
            padding: 20px 0;
        }

        #clock {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 0;
        }

        #day {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.8);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .clock-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .avatar-img {
            height: 120px !important;
            width: 120px !important;
            object-fit: cover;
            border: 4px solid rgba(255,255,255,0.3);
            border-radius: 50%;
        }

        .stats-card {
            transition: transform 0.3s ease;
            border: none;
        }

        .stats-card:hover {
            transform: translateY(-5px);
        }

        .widget-icon {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 1.5rem;
        }
    </style>
@endsection

@section('page_content')
    <div class="container-fluid homeContents">
        <div class="row align-items-center mb-4 g-3">
            <div class="col-md-7">
                <div class="bg-white p-3 rounded shadow-sm border-start border-info border-5">
                    <h4 class="mb-0 text-dark fw-bold">Welcome back, {{ Auth::user()->name }}!</h4>
                </div>
            </div>

            <div class="col-md-3 text-center">
                <div class="clock-box">
                    <div id="clock">00:00:00 am</div>
                    <div id="day">Loading...</div>
                </div>
            </div>

            <div class="col-md-2 text-center">
                <button id="clockButton" class="btn btn-warning btn-lg w-100 py-3 fw-bold shadow-sm" onclick="clockIn()">
                    <i class="fas fa-sign-in-alt me-2"></i>Clock In
                </button>
                <button id="clockOutButton" class="btn btn-danger btn-lg w-100 py-3 fw-bold shadow-sm" onclick="clockOut()" style="display:none;">
                    <i class="fas fa-sign-out-alt me-2"></i>Clock Out
                </button>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-xl-3 col-md-6">
                <div class="card text-center stats-card bg-primary text-white shadow">
                    <div class="card-body p-4">
                        <img src="{{asset('assets')}}/img/pollob.png" class="avatar-img mb-3 shadow">
                        <h5 class="fw-bold mb-0">Pollob Ahmed Sagor</h5>
                        <p class="small opacity-75">Chief Executive Officer</p>
                        <div class="mt-3">
                            <span class="badge bg-light text-primary px-3 py-2">#EMP0000002</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card stats-card shadow-sm h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-muted small text-uppercase fw-bold mb-1">Total Task</h6>
                            <h2 class="mb-0 fw-bold">12</h2>
                            <p class="text-success small mb-0 mt-2"><i class="fas fa-arrow-up"></i> 15% from last month</p>
                        </div>
                        <div class="widget-icon bg-danger text-white">
                            <i class="fas fa-tasks"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card stats-card shadow-sm h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-muted small text-uppercase fw-bold mb-1">Total Project</h6>
                            <h2 class="mb-0 fw-bold">05</h2>
                            <p class="text-success small mb-0 mt-2"><i class="fas fa-arrow-up"></i> 2 new this week</p>
                        </div>
                        <div class="widget-icon bg-primary text-white">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card stats-card shadow-sm h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-muted small text-uppercase fw-bold mb-1">Total Leave</h6>
                            <h2 class="mb-0 fw-bold">12</h2>
                            <p class="text-muted small mb-0 mt-2">Remaining: 08 days</p>
                        </div>
                        <div class="widget-icon bg-success text-white">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Clock Functionality
        function updateTime() {
            const now = new Date();
            const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

            let hours = now.getHours();
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12 || 12;

            document.getElementById('day').textContent = days[now.getDay()];
            document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds} ${ampm}`;
        }

        setInterval(updateTime, 1000);
        updateTime();

        // LocalStorage logic and AJAX
        $(function() {
            // Case-sensitive issues fixed: using all lowercase for status
            let status = localStorage.getItem('EmpStatus');

            if (!status) {
                localStorage.setItem('EmpStatus', "clockout");
                status = "clockout";
            }

            if (status.toLowerCase() === "clockin") {
                $('#clockButton').hide();
                $('#clockOutButton').show();
            } else {
                $('#clockButton').show();
                $('#clockOutButton').hide();
            }
        });

        function clockIn() {
            $.ajax({
                url: '/hrm_attendance_list/clock-in',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    employee_id: {{ Auth::user()->id }},
                },
                success: function(response) {
                    localStorage.setItem('EmpStatus', "clockin");
                    $('#clockOutButton').show();
                    $('#clockButton').hide();
                    toastr.success('Clocked In successfully'); // If you use Toastr
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                }
            });
        }

        function clockOut() {
            $.ajax({
                url: '/hrm_attendance_list/clock-out',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    employee_id: {{ Auth::user()->id }},
                },
                success: function(response) {
                    localStorage.setItem('EmpStatus', "clockout");
                    $('#clockButton').show();
                    $('#clockOutButton').hide();
                    toastr.info('Clocked Out successfully');
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                }
            });
        }
    </script>
@endsection
