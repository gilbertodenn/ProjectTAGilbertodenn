@extends('layouts.app')
@push('styles')
    <style>
        div.dataTables_wrapper div.dataTables_paginate {
            text-align: center !important;
            float: none !important;
            margin-top: 1rem;
        }
    </style>
    <!-- CSS -->
<style>
.step-circle {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  border: 2px solid #ccc;
  color: #999;
  font-weight: bold;
  transition: all 0.3s ease;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #f8f9fa;
}

.step-circle.active {
  border-color: #0d6efd;
  color: #0d6efd;
  background-color: white;
}

.step-circle.completed {
  background-color: #0d6efd;
  color: white;
  border-color: #0d6efd;
}

.progress-line-container {
  width: 50px;
  height: 4px;
  background-color: #dee2e6;
  overflow: hidden;
  border-radius: 2px;
  position: relative;
}

.progress-line {
  width: 0%;
  height: 100%;
  background-color: #0d6efd;
  transition: width 0.6s ease;
}
</style>


@endpush
@section('content')
    <div class="body-wrapper-inner">
        <div class="container-fluid">
            <!--  Row 1 -->
            <div class="row">

                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 450px;">
                            <h1>Grafik Conversation Chat</h1>
                            <div style="height: 300px; width: 100%;">
                                <canvas id="areaLineChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 450px;">
                            <h1>Word Cloud</h1>
                            <div style="width: 100%; height: 300px;">
                                <canvas id="wordCanvas" style="width: 100%; height: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h1>Record List Chat</h1>

                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    + Upload Knowledge
                                </button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="emailTable" class="table ">
                                <thead style="background-color: #bbcaf5;">
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>From</th>
                                        <th>Topic</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2025-06-01</td>
                                        <td>alice@example.com</td>
                                        <td>Monthly Report Submission</td>
                                        <td>
                                            <a href="" title="View">
                                                <i class="bi bi-eye text-primary me-2" style="cursor: pointer;"></i>
                                            </a>
                                            <a href="" title="Delete" onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash text-danger" style="cursor: pointer;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>2025-05-30</td>
                                        <td>bob@example.com</td>
                                        <td>Team Meeting Schedule</td>
                                        <td>
                                            <a href="" title="View">
                                                <i class="bi bi-eye text-primary me-2" style="cursor: pointer;"></i>
                                            </a>
                                            <a href="" title="Delete" onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash text-danger" style="cursor: pointer;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>2025-05-25</td>
                                        <td>charlie@example.com</td>
                                        <td>Project Launch Confirmation</td>
                                        <td>
                                            <a href="" title="View">
                                                <i class="bi bi-eye text-primary me-2" style="cursor: pointer;"></i>
                                            </a>
                                            <a href="" title="Delete" onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash text-danger" style="cursor: pointer;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>2025-05-20</td>
                                        <td>diana@example.com</td>
                                        <td>Holiday Notice</td>
                                        <td>
                                            <a href="" title="View">
                                                <i class="bi bi-eye text-primary me-2" style="cursor: pointer;"></i>
                                            </a>
                                            <a href="" title="Delete" onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash text-danger" style="cursor: pointer;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal HTML -->
    <!-- Modal -->
    <div class="modal fade" id="welcomeWizardModal" tabindex="-1" aria-labelledby="welcomeWizardLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content text-center p-5" style="border-radius: 16px;">
                <br>
                <br>

                <!-- Modal Body -->
                <div class="modal-body">
                    <h3 class="fw-bold">Welcome to the chatbot dashboard</h3>
                    <p class="text-muted">This wizard will help you configure your chatbot until it's ready to use</p>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                <!-- Navigation Buttons -->
                <div class="d-flex justify-content-between px-5 pb-3">
                    <a href="#" class="text-primary" data-bs-dismiss="modal">Skip</a>
                    <a class="btn btn-primary px-4" data-bs-dismiss="modal" onclick="showStepOneModal()">Next</a>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="stepOneModal" tabindex="-1" aria-labelledby="stepOneModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content border-0 shadow-sm rounded-3 p-5 text-center">

                <!-- Progress Header -->
                <div class="d-flex justify-content-center align-items-center mb-5 gap-5">
                    <!-- Step 1 -->
                    <div class="text-center">
                        <div class="rounded-circle border border-2 border-primary text-primary fw-bold d-flex align-items-center justify-content-center"
                            style="width: 32px; height: 32px;">1</div>
                        <div class="fw-bold text-body mt-2">First Step</div>
                        <small class="text-muted">Upload knowledge source</small>
                    </div>

                    <div class="flex-grow-1 border-top mx-2"></div>

                    <!-- Step 2 -->
                    <div class="text-center">
                        <div class="rounded-circle bg-light text-muted d-flex align-items-center justify-content-center"
                            style="width: 32px; height: 32px;">2</div>
                        <div class="fw-bold text-muted mt-2">Second Step</div>
                        <small class="text-muted">Setup bot configurations</small>
                    </div>

                    <div class="flex-grow-1 border-top mx-2"></div>

                    <!-- Step 3 -->
                    <div class="text-center">
                        <div class="rounded-circle bg-light text-muted d-flex align-items-center justify-content-center"
                            style="width: 32px; height: 32px;">3</div>
                        <div class="fw-bold text-muted mt-2">Final Step</div>
                        <small class="text-muted">Finishing up</small>
                    </div>
                </div>

                <!-- Main Content -->
                <h5 class="fw-bold text-body">Upload knowledge source for your chatbot</h5>
                <p class="text-muted">The chatbot will use the information from the uploaded files as its primary source of
                    knowledge</p>

                <!-- File Upload Box -->
                <div class="my-4">
                    <div class="border rounded-3 py-5 px-3 bg-light-subtle" style="cursor: pointer;">
                        <i class="bi bi-file-earmark-text" style="font-size: 2rem;"></i>
                        <p class="mb-0 mt-2 text-muted">Drag file here or click to select file</p>
                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="d-flex justify-content-between w-100 px-5 mt-4">
                    <a href="#" class="text-primary" data-bs-dismiss="modal">Skip</a>
                    <button class="btn btn-primary" onclick="goToStep(currentStep + 1)">Next</button>

                </div>

            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="stepModal" tabindex="-1" aria-labelledby="stepModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content border-0 shadow-sm rounded-3 p-5 text-center">

      <!-- Progress Header -->
      <div class="d-flex justify-content-center align-items-center mb-5 gap-4" id="progressHeader">
        <!-- Step 1 -->
        <div class="text-center">
          <div id="stepIndicator1" class="step-circle active">1</div>
          <div class="fw-bold text-body mt-2">First Step</div>
          <small class="text-muted">Upload knowledge source</small>
        </div>

        <!-- Line 1 -->
        <div class="progress-line-container">
          <div id="line1" class="progress-line"></div>
        </div>

        <!-- Step 2 -->
        <div class="text-center">
          <div id="stepIndicator2" class="step-circle">2</div>
          <div class="fw-bold text-muted mt-2">Second Step</div>
          <small class="text-muted">Setup bot configurations</small>
        </div>

        <!-- Line 2 -->
        <div class="progress-line-container">
          <div id="line2" class="progress-line"></div>
        </div>

        <!-- Step 3 -->
        <div class="text-center">
          <div id="stepIndicator3" class="step-circle">3</div>
          <div class="fw-bold text-muted mt-2">Final Step</div>
          <small class="text-muted">Finishing up</small>
        </div>
      </div>

      <!-- Step Contents -->
      <div id="step1" class="step-section">
        <h5 class="fw-bold text-body">Upload knowledge source for your chatbot</h5>
        <p class="text-muted">The chatbot will use the information from the uploaded files as its primary source of knowledge.</p>
        <div class="my-4">
          <div class="border rounded-3 py-5 px-3 bg-light-subtle" style="cursor: pointer;">
            <i class="bi bi-file-earmark-text" style="font-size: 2rem;"></i>
            <p class="mb-0 mt-2 text-muted">Drag file here or click to select file</p>
          </div>
        </div>
      </div>

      <div id="step2" class="step-section d-none">
        <h5 class="fw-bold text-body">Bot Configuration</h5>
        <p class="text-muted">Set the bot’s name, tone, and functionality.</p>
        <div class="my-4">
          <input type="text" class="form-control mb-2" placeholder="Bot Name">
          <select class="form-select">
            <option selected>Select tone</option>
            <option>Formal</option>
            <option>Casual</option>
            <option>Friendly</option>
          </select>
        </div>
      </div>

      <div id="step3" class="step-section d-none">
        <h5 class="fw-bold text-body">Finishing Up</h5>
        <p class="text-muted">Ready to deploy your chatbot.</p>
        <div class="my-4">
          <p class="text-success">Everything looks good! 🎉</p>
        </div>
      </div>

      <!-- Footer Buttons -->
      <div class="d-flex justify-content-between w-100 px-5 mt-4">
        <button class="btn btn-link text-primary" data-bs-dismiss="modal">Skip</button>
        <div>
          <button id="backBtn" class="btn btn-outline-secondary me-2 d-none" onclick="goToStep(currentStep - 1)">Back</button>
          <button id="nextBtn" class="btn btn-primary" onclick="handleNext()">Next</button>
        </div>
      </div>

    </div>
  </div>
</div>







@endsection

@push('scripts')
    <script>
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const words = {!! json_encode($words) !!};

            WordCloud(document.getElementById('wordCanvas'), {
                list: words,
                gridSize: 1,
                weightFactor: 10,
                fontFamily: 'Arial',
                color: 'random-dark',
                backgroundColor: '#ffffff'
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('areaLineChart').getContext('2d');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'Dataset 1',
                        data: {!! json_encode($dataset1) !!},
                        fill: true,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    stacked: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Single Dataset Area Line Chart'
                        }
                    }
                }
            });
        });
    </script>
    <script>
        const ctx = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Data Sample',
                    data: {!! json_encode($data) !!},
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Line Chart Example'
                    }
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#emailTable').DataTable({
                paging: true,
                pageLength: 5,
                info: false,
                searching: false,

                lengthChange: false,
                language: {
                    paginate: {
                        previous: "&lt;",
                        next: "&gt;"
                    }
                },
                dom: 'tp' // only table and pagination
            });
        });
    </script>
    @if ($missingPreferences)
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = new bootstrap.Modal(document.getElementById('welcomeWizardModal'));
                modal.show();
            });
        </script>
    @endif
    <script>
        function showStepOneModal() {
            const stepOneModal = new bootstrap.Modal(document.getElementById('stepModal'));
            stepOneModal.show();
        }
    </script>

<script>
let currentStep = 1;
const totalSteps = 3;

function goToStep(step) {
  for (let i = 1; i <= totalSteps; i++) {
    // Show/hide step content
    document.getElementById('step' + i).classList.toggle('d-none', i !== step);

    // Update circle indicators
    const circle = document.getElementById('stepIndicator' + i);
    if (i < step) {
      circle.classList.add('completed');
      circle.classList.remove('active');
      circle.textContent = '✓';
    } else if (i === step) {
      circle.classList.add('active');
      circle.classList.remove('completed');
      circle.textContent = i;
    } else {
      circle.classList.remove('completed', 'active');
      circle.textContent = i;
    }

    // Keep previous lines filled
    const line = document.getElementById('line' + (i - 1));
    if (line && i < step) {
      line.style.width = '100%';
    }
  }

  // Buttons
  document.getElementById('backBtn').classList.toggle('d-none', step === 1);
  const nextBtn = document.getElementById('nextBtn');

  if (step === totalSteps) {
    nextBtn.textContent = 'Finish';
  nextBtn.onclick = () => {
    const circle = document.getElementById('stepIndicator' + totalSteps);
    const line = document.getElementById('line' + (totalSteps - 1));

    // Mark final step as completed
    circle.classList.add('completed');
    circle.classList.remove('active');
    circle.textContent = '✓';

    // Fill the last line if exists
    if (line) line.style.width = '100%';

    // Close modal after a short delay
    setTimeout(() => {
      bootstrap.Modal.getInstance(document.getElementById('stepModal')).hide();
    }, 700);
  };
  } else {
    nextBtn.textContent = 'Next';
    nextBtn.onclick = handleNext;
  }

  currentStep = step;
}

function handleNext() {
  const currentCircle = document.getElementById('stepIndicator' + currentStep);
  const nextLine = document.getElementById('line' + currentStep);

  // Step 1: mark current circle as completed
  currentCircle.classList.add('completed');
  currentCircle.classList.remove('active');
  currentCircle.textContent = '✓';

  // Step 2: animate line after short delay
  setTimeout(() => {
    if (nextLine) {
      nextLine.style.width = '100%';
    }
  }, 300);

  // Step 3: go to next step after line fills
  setTimeout(() => {
    goToStep(currentStep + 1);
  }, 900);
}
</script>

@endpush
