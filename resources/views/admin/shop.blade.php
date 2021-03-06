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

        .container_table h3 {
            font-weight: 800;
        }

        .container_table .actionCust input {
            width: 50px;
            border-radius: 20%;
            border: none;
            padding-left: 2%;
            text-align: center;
            background: transparent;
        }

    </style>

    <div class="container_table" data-scene>
        <div class="row">
            <div class="col-md-12 main-datatable">
                <div class="card_body">
                    <div class="row d-flex">
                        <div class="col-sm-4 createSegment">
                            <h3>Shop</h3>
                        </div>
                        <div class="col-sm-8 add_flex">
                            <div class="form-group searchInput">
                                <input type="search" class="form-control" id="filterbox" placeholder=" Search" />
                                <span class="actionCust">
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    @php
                        $supplierbooks = DB::table('supplierbooks')
                            ->where('qty', '>', 0)
                            ->get();
                        $i = 0;
                    @endphp
                    <div>
                        <table id="filtertable" class="table cust-datatable dataTable no-footer table-sortable">
                            <thead>
                                <tr>
                                    <th style="min-width: 50px">Supplier</th>
                                    <th style="min-width: 100px">Title</th>
                                    <th style="min-width: 50px">Genre</th>
                                    <th style="min-width: 50px">Publisher</th>
                                    <th style="min-width: 50px">Author</th>
                                    <th style="min-width: 50px">Price</th>
                                    <th style="min-width: 50px">Stock</th>
                                    <th style="min-width: 50px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supplierbooks as $sb)
                                    @php
                                        $supp = DB::table('suppliers')
                                            ->where('supplier_id', $sb->supplier_id)
                                            ->first();
                                        $book = DB::table('books')
                                            ->where('book_id', $sb->book_id)
                                            ->first();
                                        $genre = DB::table('genres')
                                            ->where('genre_id', $book->genre_id)
                                            ->first()->genre_name;
                                        $publisher = DB::table('publishers')
                                            ->where('publisher_id', $book->publisher_id)
                                            ->first()->publisher_name;
                                        $author = DB::table('authors')
                                            ->where('author_id', $book->author_id)
                                            ->first()->author_name;
                                    @endphp
                                    <tr id="baris{{ $i }}">
                                        <td>{{ $supp->supplier_name }}</td>
                                        <td>{{ $book->book_name }}</td>
                                        <td>{{ $genre }}</td>
                                        <td>{{ $publisher }}</td>
                                        <td>{{ $author }}</td>
                                        <td>Rp. {{ number_format($sb->price, 0, '', '.') }}</td>
                                        <td id="qty{{ $i }}">{{ $sb->qty }}</td>
                                        <td>
                                            <span class="actionCust">
                                                <input type="number" id="amt{{ $i }}" min="1"
                                                    max="{{ $sb->qty }}" placeholder="1"
                                                    bookid="{{ $sb->book_id }}" suppid="{{ $sb->supplier_id }}" />
                                            </span>
                                            <span class="actionCust">
                                                <a href="#"><i class="fa fa-shopping-cart"
                                                        onclick="buy({{ $i }})"></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
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
                // aoColumnDefs: [{
                //     bSortable: false,
                //     aTargets: ["nosort"],
                // }, ],
                aoColumns: [null, null, null, null, null, null, null, null],
                // order: false,
                // bLengthChange: false,
                dom: '<"top">ct<"top"p><"clear">',
            });
            $("#filterbox").keyup(function() {
                dataTable.search(this.value).draw();
            });
        });

        function buy(id) {
            const input = document.getElementById("amt" + id);
            const view = document.getElementById("qty" + id);
            const tabel = document.getElementById("baris" + id);
            let inp = input.value;
            let book = input.getAttribute("bookid");
            let supp = input.getAttribute("suppid");

            $.ajax({
                type: 'GET',
                url: '/admin/buybook',
                data: {
                    jum: inp,
                    index: id,
                    bookid: book,
                    suppid: supp
                },
                success: function(data) {
                    if (data.jum == 0) {
                        tabel.remove();
                    } else {
                        input.value = 1;
                        input.setAttribute("max", data.jum);
                        view.innerHTML = data.jum;
                    }
                    toastr.success("Transaction Successful")
                }
            });
        }
    </script>
@endsection
