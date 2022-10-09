<!DOCTYPE html>

<html lang="en">

	<head>
		<title>ELEGANCE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <style>

            * {
                font-family: DejaVu serif !important;
            }

            body {
                background: #ffffff;
                line-height: 1.1;
            }

            .table-admin-invoice-detail {
                width: 100%;
            }

            .table-admin-invoice-detail td {
                vertical-align: baseline;
            }

            .table-admin-invoice-detail th {
                text-align: left;
            }

            .table-admin-invoice-detail th, .table-admin-invoice-detail tr:last-child td {
                border-bottom: 2px solid #808080 !important;
            }

            .font-weight-boldest {
                font-weight: 600;
            }

            .font-weight-bolder {
                font-weight: 400;
            }

            .text-dark {
                color: #000000;
            }

            .font-size-h3 {
                font-size: 16px;
            }

            table {
                border-spacing: 0;
            }

            .page-break {
                page-break-after: always;
            }

            .font-size-h4 {
                font-size: 12px;
            }

            .badge-danger {
                color: #fff;
                background-color: #f64e60;
            }

            .badge {
                display: inline-block;
                padding: 0.3em 0.45em;
                font-size: 70%;
                font-weight: 500;
                line-height: 1;
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: 2px;
            }

            .text-danger {
                color: #f64e60 !important;
            }

        </style>
	</head>

	<body>

        @yield('content')

	</body>

</html>

