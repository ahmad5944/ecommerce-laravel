<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet"> --}}

</head>

<style>
    table {
        border-collapse: collapse;
        /* font-style: ara */
    }

    html {
        margin: 0;
        padding: 0;
    }

    body {
        margin-left: 5px;
        margin-right: 5px;
        padding: 0;
        font-size: 14px;
    }

    * {
        font-family: DejaVu Sans, sans-serif;
        /* font-family: 'Roboto', sans-serif; */
        -webkit-print-color-adjust: exact !important;
        Chrome,
        Safari,
        Edge color-adjust: exact !important;
        Firefox
    }

    .m-0 {
        margin: 0;
    }

    .mb {
        margin-bottom: 1rem !important;
    }

    .mb2 {
        margin-bottom: 4rem !important;
    }

    .mx {
        margin-left: 5rem !important;
        margin-right: 5rem !important;
    }

    .mr {
        margin-right: 3rem !important;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    .d-flex {
        display: flex;
        justify-content: space-between;
    }

    .justify-content-end {
        justify-content: end !important;
    }

    th {
        text-align: center;
    }

    #grafik {
        width: 100%;
        height: 500px;
        margin-top: 35px;
    }

    h4 {
        padding-top: 20px;
    }
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<body>
    <div class="content col-12">
        <h2 class="m-0" style="text-align: center;">Report Order</h2>
        <table style="border-collapse: collapse; margin-top: 5px;" class="table table-bordered" width="100%">
            <thead>
                <tr>
                    <th class="align-middle"
                        style="border: 1px solid black; text-align: center; font-weight: bold; width: 45%;">No.</th>
                    <th class="align-middle" style="border: 1px solid black; text-align: center; font-weight: bold;">
                        Invoice</th>
                    <th class="align-middle" style="border: 1px solid black; text-align: center; font-weight: bold;">
                        Nama Produk</th>
                    <th class="align-middle" style="border: 1px solid black; text-align: center; font-weight: bold;">
                        Jumlah</th>
                    <th class="align-middle" style="border: 1px solid black; text-align: center; font-weight: bold;">
                        Harga</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalPrice = 0;
                @endphp
                @foreach ($data as $value)
                    @php
                        $totalPrice += $value['product']['price'];
                    @endphp
                    <tr>
                        <td style="border: 1px solid black;">{{ $loop->iteration }}</td>
                        <td style="border: 1px solid black;">{{ $value['no_invoice'] }}</td>
                        <td style="border: 1px solid black;">{{ $value['product']['name'] }}</td>
                        <td style="border: 1px solid black;">{{ 1 }}</td>
                        <td style="border: 1px solid black;">Rp.
                            {{ number_format($value['product']['price'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"
                        style="background-color: #FFEB9C; border: 1px solid black; text-align: center; font-weight:bold;">
                        Total</td>

                    <td colspan="2" style="background-color: #FFEB9C; text-align: right; border: 1px solid black;">
                        Rp. {{ number_format($totalPrice, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>
