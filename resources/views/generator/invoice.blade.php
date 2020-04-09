<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
    #invoice {
        padding: 30px;
    }

    .invoice {
        position: relative;
        background-color: #FFF;
        min-height: 680px;
        padding: 15px
    }

    .invoice header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #3989c6
    }

    .invoice .company-details {
        text-align: right
    }

    .invoice .company-details .name {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .contacts {
        margin-bottom: 20px
    }

    .invoice .invoice-to {
        text-align: left
    }

    .invoice .invoice-to .to {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .invoice-details {
        text-align: right
    }

    .invoice .invoice-details .invoice-id {
        margin-top: 0;
        color: #3989c6
    }

    .invoice main {
        padding-bottom: 50px
    }

    .invoice main .thanks {
        margin-top: -100px;
        font-size: 2em;
        margin-bottom: 50px
    }

    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #3989c6
    }

    .invoice main .notices .notice {
        font-size: 1.2em
    }

    .invoice table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px
    }

    .invoice table td,
    .invoice table th {
        padding: 15px;
        background: #eee;
        border-bottom: 1px solid #fff
    }

    .invoice table th {
        white-space: nowrap;
        font-weight: 400;
        font-size: 16px
    }

    .invoice table td h3 {
        margin: 0;
        font-weight: 400;
        color: #3989c6;
        font-size: 1.2em
    }

    .invoice table .qty,
    .invoice table .total,
    .invoice table .unit {
        text-align: right;
        font-size: 1.2em
    }

    .invoice table .no {
        color: #fff;
        font-size: 1.6em;
        background: #3989c6
    }

    .invoice table .unit {
        background: #ddd
    }

    .invoice table .total {
        background: #3989c6;
        color: #fff
    }

    .invoice table tbody tr:last-child td {
        border: none
    }

    .invoice table tfoot td {
        background: 0 0;
        border-bottom: none;
        white-space: nowrap;
        text-align: right;
        padding: 10px 20px;
        font-size: 1.2em;
        border-top: 1px solid #aaa
    }

    .invoice table tfoot tr:first-child td {
        border-top: none
    }

    .invoice table tfoot tr:last-child td {
        color: #3989c6;
        font-size: 1.4em;
        border-top: 1px solid #3989c6
    }

    .invoice table tfoot tr td:first-child {
        border: none
    }

    .invoice footer {
        width: 100%;
        text-align: center;
        color: #777;
        border-top: 1px solid #aaa;
        padding: 8px 0
    }

    @media print {
        .invoice {
            font-size: 11px !important;
            overflow: hidden !important
        }

        .invoice footer {
            position: absolute;
            bottom: 10px;
            page-break-after: always
        }

        .invoice>div:last-child {
            page-break-before: always
        }

        .no-print,
        .no-print * {
            display: none !important;
        }
    }
</style>

<!------ Include the above in your HEAD tag ---------->

<!--Author      : @arboshiki-->
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info no-print"><i class="fa fa-print"></i> Print</button>
            <!--<<button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>-->
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <img src="{{asset('images/logo-veintec-horizontal.png')}}" width="300" style="margin-top: -54px;" data-holder-rendered="true" />

                    </div>
                    <iv class="col company-details">
                        <!--<h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                            Arboshiki
                            </a>
                        </h2>
                        <div>+562 3263 2515</div>
                        <div>Camino El Alba 9500 of 210.</div>
                        <div>LUN - VIE 9:00 - 19:00</div>-->
                        <div class="date">Desde: {{$from}}
                        </div>
                        <div class="date">Hasta: {{$to}}</div>
                </div>
        </div>
        </header>
        <main>
            <div class="row">
                <div class="col">
                    <h2 class="to">{{ $user->name }}</h2>
                </div>
            </div>

            @php
            $total_invoice = 0;
            @endphp

            @foreach ($locations as $index => $location)
            <div class="row contacts">
                <div class="col invoice-to">
                    <!--<div class="text-gray-light">INVOICE TO:</div>-->
                    <!--<h2 class="to">{{ $user->name }}</h2>-->
                    <!--<div class="address">796 Silver Harbour, TX 79273, US</div>
                                <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>-->
                </div>
                <div class="col invoice-details">
                    <h2 class="invoice-id">{{ $index }}</h2>
                    <!--<div class="date">Date of Invoice: 01/10/2018</div>
                                <div class="date">Due Date: 30/10/2018</div>-->
                </div>
            </div>
            <table border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>FECHA</th>
                        <th class="text-left">CONCEPTO</th>
                        <th class="text-right">MONTO</th>
                        <th class="text-right">(-%)</th>
                        <th class="text-right">CANTIDAD</th>
                        <th class="text-right">A PAGAR</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total = 0;
                    $subTotal = 0;
                    @endphp

                    @foreach ($location as $work)
                    @php
                    $sum = $work->activity->amount * $work->quantity;
                    $sub = ($sum * $work->activity->percent) / 100;
                    $amount = round($sum - $sub, 2, PHP_ROUND_HALF_UP);
                    $total += $amount;
                    $total_invoice += $amount;
                    $subTotal += $sub;
                    @endphp
                    <tr>
                        <td class="no">{{ $work->date }}</td>
                        <td class="text-left">
                            <h3>
                                {{ $work->activity->name }}
                        </td>
                        <td class="unit">{{ $work->activity->amount }}</td>
                        <td class="qty">{{ $sub }}</td>
                        <td class="qty">{{ $work->quantity }}</td>
                        <td class="total"> {{ $amount }}</td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td></td>
                        <td style="color: #aaa">{{$subTotal}}</td>
                        <td>TOTAL:</td>
                        <td>${{ round($total, 0, PHP_ROUND_HALF_UP) }}</td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                    </tr>
                </tfoot>
            </table>
            @endforeach

            <!--TOTAL-->
            <table>
                <tfoot>
                    <!--<tr>
                        <td colspan="2"></td>
                        <td colspan="2">SUBTOTAL</td>
                        <td>$5,200.00</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">TAX 25%</td>
                        <td>$1,300.00</td>
                    </tr>-->
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2">Total boleta Bruto</td>
                        <td>${{ round($total_invoice, 0, PHP_ROUND_HALF_UP) }}</td>
                    </tr>
                </tfoot>
            </table>


            <!-- <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div>
                -->
        </main>
        <footer>
            VEINTEC - +562 3263 2515 - Camino El Alba 9500 of 210
        </footer>
    </div>
    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
    <div></div>
</div>
</div>

<script type="text/javascript">
    $('#printInvoice').click(function() {
        Popup($('.invoice')[0].outerHTML);

        function Popup(data) {
            document.title = 'Liquidación - {{ $user->name }}';
            window.print();
            return true;
        }
    });
</script>