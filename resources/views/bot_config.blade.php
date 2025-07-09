@extends('layouts.app')
@push('styles')
    <style>
        div.dataTables_wrapper div.dataTables_paginate {
            text-align: center !important;
            float: none !important;
            margin-top: 1rem;
        }
    </style>
@endpush
@section('content')
    <div class="body-wrapper-inner" >
        <div class="container-fluid" >
            <!--  Row 1 -->
            <div class="row">

                <h1 class="display-4 text-center">< Bot Configuration ></h1>
                <hr class="mt-3 mb-5">
                <div class="col-lg-12 mt-7">
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class=" d-flex justify-content-between align-items-center mb-3 ">
                                <h1>Bot Configuration</h1>

                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    + Upload Knowledge
                                </button>
                            </div>
                        </div>

                        <div class="table-responsive container">
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
    
@endsection

@push('scripts')
   
   

    <script>
        $(document).ready(function() {
    var table = $('#emailTable').DataTable({
        paging: true,
        pageLength: 5,
        info: false,
        searching: true,
        lengthChange: false,
        language: {
            paginate: {
                previous: "&lt;",
                next: "&gt;"
            }
        },
        dom: ' <"top-row d-flex justify-content-between align-items-center mb-2 " <"left-btn">f>tp'
    });

    // Move the button into the .left-btn container
    $('.left-btn').html('<button class="btn btn-info btn-sm " data-bs-toggle="modal" data-bs-target="#darkModeModal">+ Upload</button>');

    
});

    </script>
@endpush
