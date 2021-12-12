<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <!-- scroll -->
    <link rel="stylesheet" href="https://unpkg.com/rolly.js@0.2.1/css/style.css">

    <!-- animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.14/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Ubuntu:wght@300;400;500;700&display=swap');

    * {
        font-family: 'Ubuntu', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --blue: #0b2243;
        --green: #05636d;
        --white: #fff;
        --grey: #f5f5f5;
        --black1: #222;
        --black2: #999;
    }

    body {
        min-height: 100vh;
        overflow-x: hidden;
    }

    /* scrollbar */

    html::-webkit-scrollbar {
        width: 1rem;
    }

    html::-webkit-scrollbar-track {
        background: #fff;
    }

    html::-webkit-scrollbar-thumb {
        background: #06626d;
        border-radius: 5rem;
    }

    /* end-scrollbar */

    .app {
        position: relative;
        width: 100%;
    }

    .container_main {
        position: absolute;
        width: calc(100% - 250px);
        left: 250px;
        min-height: 100vh;
        background: var(--white);
        transition: 0.5s;
    }

    .container_main.active {
        width: calc(100% - 80px);
        left: 80px;
    }

</style>

<body>
    <!-- prelaoder -->
    <div class="preloader">@include('preloader')</div>

    <main class="app">
        <div class="container_header">@include('admin.header')</div>
        <div class="container_main">
            <div class="container_topbar">@include('admin.topbar')</div>
            <div class="main_container">@yield('main')</div>
        </div>
        <div class="container_footer">@include('admin.footer')</div>
    </main>

    <!-- scroll -->
    <script src="https://unpkg.com/rolly.js@0.2.1/dist/rolly.min.js"></script>

    <!-- animation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- ion-icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    {{-- toast --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css"/>

    <script>
        const r = rolly({
            view: document.querySelector('.app'),
            native: true,
            // other options
        });
        r.init();

        AOS.init({
            duration: 1500 //global duration
        });
    </script>

    <script>
        // menu toggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.container_main');

        toggle.onclick = function() {
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }
    </script>

    <!-- sort table -->
    <script>
        /**
         * Sorts a HTML table.
         *
         * @param {HTMLTableElement} table The table to sort
         * @param {number} column The index of the column to sort
         * @param {boolean} asc Determines if the sorting will be in ascending
         */
        function sortTableByColumn(table, column, asc = true) {
            const dirModifier = asc ? 1 : -1;
            const tBody = table.tBodies[0];
            const rows = Array.from(tBody.querySelectorAll("tr"));

            // Sort each row
            const sortedRows = rows.sort((a, b) => {
                const aColText = a
                    .querySelector(`td:nth-child(${column + 1})`)
                    .textContent.trim();
                const bColText = b
                    .querySelector(`td:nth-child(${column + 1})`)
                    .textContent.trim();

                return aColText > bColText ? 1 * dirModifier : -1 * dirModifier;
            });

            // Remove all existing TRs from the table
            while (tBody.firstChild) {
                tBody.removeChild(tBody.firstChild);
            }

            // Re-add the newly sorted rows
            tBody.append(...sortedRows);

            // Remember how the column is currently sorted
            table
                .querySelectorAll("th")
                .forEach((th) => th.classList.remove("th-sort-asc", "th-sort-desc"));
            table
                .querySelector(`th:nth-child(${column + 1})`)
                .classList.toggle("th-sort-asc", asc);
            table
                .querySelector(`th:nth-child(${column + 1})`)
                .classList.toggle("th-sort-desc", !asc);
        }

        document.querySelectorAll(".table-sortable th").forEach((headerCell) => {
            headerCell.addEventListener("click", () => {
                const tableElement =
                    headerCell.parentElement.parentElement.parentElement;
                const headerIndex = Array.prototype.indexOf.call(
                    headerCell.parentElement.children,
                    headerCell
                );
                const currentIsAscending = headerCell.classList.contains("th-sort-asc");

                sortTableByColumn(tableElement, headerIndex, !currentIsAscending);
            });
        });
    </script>

    {{-- toast --}}
    <script>
        $(function(){
            toastr.success("Success Message")
            toastr.info("Info Message")
            toastr.warning("Warning Message")
            toastr.error("error message")
        });
    </script>
</body>

</html>
