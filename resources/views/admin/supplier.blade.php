@extends('admin.main')

@section('main')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.14/js/jquery.dataTables.min.js"></script>

    <style>
        /* .navigation {
            margin-left: -20px;
        }

        .topbar .search ion-icon {
            margin-top: 10px;
        } */

        .container_table {
            min-height: 100vh;
            display: grid;
            justify-content: center;
            align-items: center;
            color: #4f546c;
            font-size: 0.9rem;
            background-color: #f9fbff;
        }

        .container_table .p-30 {
            padding: 30px;
        }

        .container_table .main-datatable {
            padding: 0px;
            border: 1px solid #f3f2f2;
            border-bottom: 0;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.05);
        }

        .container_table .d-flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .container_table .card_body {
            background-color: white;
            border: 1px solid transparent;
            border-radius: 2px;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        }

        .container_table .main-datatable .row {
            margin: 0;
        }

        .container_table .searchInput {
            width: 50%;
            display: flex;
            align-items: center;
            position: relative;
            justify-content: flex-end;
            margin: 20px 0px;
            padding: 0px 4px;
        }

        .container_table .searchInput input {
            border: 1px solid #e5e5e5;
            border-radius: 50px;
            margin-left: 8px;
            height: 34px;
            width: 100%;
            padding: 0px 25px 0px 10px;
            transition: all 0.6s ease;
        }

        .container_table .searchInput input:placeholder-shown {
            width: 13%;
        }

        .container_table .searchInput:hover input:placeholder-shown {
            width: 100%;
            cursor: pointer;
        }

        .container_table .searchInput:after {
            color: #d4d4d4;
            position: relative;
            content: "\f002";
            right: 25px;
        }

        .container_table .dim_button {
            display: inline-block;
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            text-align: center;
            padding-top: 6px;
            background: rgb(57, 85, 136);
            margin-right: 10px;
            position: relative;
            cursor: pointer;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .container_table .createSegment a {
            margin-bottom: 0px;
            border-radius: 50px;
            background: #ffffff;
            border: 1px solid #007bff;
            color: #007bff;
            transition: all 0.4s ease;
        }

        .container_table .createSegment a:hover,
        .container_table .createSegment a:focus {
            transition: all 0.4s ease;
            background: #007bff;
            color: #fff;
        }

        .container_table .add_flex {
            display: flex;
            justify-content: flex-end;
            padding-right: 0px;
        }

        .container_table .main-datatable .dataTable.no-footer {
            border-bottom: 1px solid #eee;
        }

        .container_table table {
            border-collapse: collapse;
            box-shadow: 0 5px 10px #e1e5ee;
            background-color: white;
            text-align: left;
            overflow: hidden;
        }

        .container_table table thead {
            box-shadow: 0 5px 10px #e1e5ee;
        }

        .container_table .main-datatable .cust-datatable thead {
            background-color: #f9f9f9;
        }

        .container_table .main-datatable .cust-datatable>thead>tr>th {
            border-bottom-width: 0;
            color: #443f3f;
            font-weight: 600;
            padding: 16px 15px;
            vertical-align: middle;
            padding-left: 18px;
            text-align: center;
        }

        .container_table .main-datatable .cust-datatable>tbody td {
            padding: 10px 15px 10px 18px;
            color: #333232;
            font-size: 13px;
            font-weight: 500;
            word-break: break-word;
            border-color: #eee;
            text-align: center;
            vertical-align: middle;
        }

        .container_table .main-datatable .cust-datatable>tbody tr {
            border-top: none;
        }

        .container_table .main-datatable .table>tbody>tr:nth-child(even) {
            background: #f9f9f9;
        }

        .container_table .main-datatable .actionCust a {
            display: inline-block;
            color: #8a8a8a;
            font-size: 12px;
            border: 1px solid #d4d4d4;
            padding: 10px 11px;
            margin: 2px 3px;
            border-radius: 50%;
            cursor: pointer;
        }

        .container_table .main-datatable .actionCust a i {
            color: #8e8e8e;
            margin: 2px;
        }

        .container_table .main-datatable .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: #999999 !important;
            background-color: #f6f6f6 !important;
            border-color: #d4d4d4 !important;
            border-radius: 40px;
            margin: 5px 3px;
        }

        .container_table .main-datatable .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            border: 1px solid #3d96f5 !important;
            background: #4da3ff !important;
            box-shadow: none;
        }

        .container_table .main-datatable .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .container_table .main-datatable .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: #fff !important;
            border-color: transparent !important;
            background: #007bff !important;
        }

        .container_table .main-datatable .dataTables_paginate {
            padding-top: 0 !important;
            margin: 15px 10px;
            float: right !important;
        }

        .container_table .mode {
            padding: 4px 10px;
            line-height: 13px;
            color: #fff;
            font-weight: 400;
            border-radius: 1rem;
            -webkit-border-radius: 1rem;
            -moz-border-radius: 1rem;
            -ms-border-radius: 1rem;
            -o-border-radius: 1rem;
            font-size: 11px;
            letter-spacing: 0.4px;
        }

        .container_table .mode_on {
            background-color: #09922d;
        }

        .container_table .mode_off {
            background-color: #8b9096;
        }

        .container_table h3 {
            font-weight: 800;
        }

    </style>

    <div class="container_table" data-scene>
        <div class="row">
            <div class="col-md-12 main-datatable">
                <div class="card_body">
                    <div class="row d-flex">
                        <div class="col-sm-4 createSegment">
                            <h3>Master Supplier</h3>
                        </div>
                        <div class="col-sm-8 add_flex">
                            <div class="form-group searchInput">
                                <input type="search" class="form-control" id="filterbox" placeholder=" Search" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <table id="filtertable" class="table cust-datatable dataTable no-footer table-sortable">
                            <thead>
                                <tr>
                                    <th style="min-width: 50px">ID</th>
                                    <th style="min-width: 150px">Name</th>
                                    <th style="min-width: 100px">Email</th>
                                    <th style="min-width: 100px">Date</th>
                                    <th style="min-width: 150px">Status</th>
                                    <th style="min-width: 150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Dummy1</td>
                                    <td>user@gmail.com</td>
                                    <td>17-Apr-2020</td>
                                    <td><span class="mode mode_on">Active</span></td>
                                    <td>
                                        <span class="actionCust">
                                            <a href="#"><i class="fa fa-pencil-square-o"></i></a>
                                        </span>
                                        <span class="actionCust">
                                            <a href="#"><i class="fa fa-trash"></i></a>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Dummy2</td>
                                    <td>user@gmail.com</td>
                                    <td>17-Apr-2020</td>
                                    <td><span class="mode mode_on">Active</span></td>
                                    <td>
                                        <span class="actionCust">
                                            <a href="#"><i class="fa fa-pencil-square-o"></i></a>
                                        </span>
                                        <span class="actionCust">
                                            <a href="#"><i class="fa fa-trash"></i></a>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- pagination -->
    <script>
        $(document).ready(function() {
            var dataTable = $("#filtertable").DataTable({
                pageLength: 5,
                aoColumnDefs: [{
                    bSortable: false,
                    aTargets: ["nosort"],
                }, ],
                columnDefs: [{
                    type: "date-dd-mm-yyyy",
                    aTargets: [5]
                }],
                aoColumns: [null, null, null, null, null, null],
                order: false,
                bLengthChange: false,
                dom: '<"top">ct<"top"p><"clear">',
            });
            $("#filterbox").keyup(function() {
                dataTable.search(this.value).draw();
            });
        });
    </script>
@endsection
