      <html lang="en">

      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title>Purchase Request {{ $pr->department }}</title>
          <!-- Scripts -->
          <script src="{{ asset('js/app.js') }}" defer></script>

          <!-- Styles -->
          <link href="{{ asset('css/app.css') }}" rel="stylesheet">
          <style>
              .img-logo {
                  width: 4rem;
                  height: 4rem;
                  object-fit: cover
              }

              tr {
                  border-bottom: 0;
                  border-top: 0;
              }

              th {
                  border: solid 1px lightgray
              }

              td {
                  border-bottom: 0;
                  border-top: 0;
              }

              table {
                  border: solid 1px lightgray
              }

              .details-table {
                  height: 55vh;
                  border-bottom: 0;
              }

              .details-table table {
                  border-bottom: 0;
              }

              .third-table tr td {
                  border: solid 1px lightgray
              }

              body {
                  background: rgb(115, 115, 115);
              }

              page {
                  background: white;
                  display: block;
                  margin: 0 auto;
                  padding-top: 5px;
                  box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
              }

              page[size="A4"] {
                  width: 22cm;
                  height: 29.7cm;
              }

              page[size="A4"][layout="landscape"] {
                  width: 29.7cm;
                  height: 21cm;
              }

              page[size="A3"] {
                  width: 29.7cm;
                  height: 42cm;
              }

              page[size="A3"][layout="landscape"] {
                  width: 42cm;
                  height: 29.7cm;
              }

              page[size="A5"] {
                  width: 14.8cm;
                  height: 21cm;
              }

              page[size="A5"][layout="landscape"] {
                  width: 21cm;
                  height: 14.8cm;
              }

              @media print {

                  body,
                  page {
                      margin: 0;
                      box-shadow: 0;
                  }
              }

              @page {
                  margin: 0;
                  size: A4;
              }

              /* @media print {

                  html,
                  body {
                      margin: 1.6cm;
                      width: 210mm;
                      height: 297mm;
                  }

                  #print-btn {
                      display: none;
                  }
              } */
          </style>
      </head>

      <body class=" fs-6">
          <page size="A4">
              <div class="row justify-content-center mt-3">
                  <div class="col-5">
                      <p class="mx-auto text-end">
                          <img src="{{ asset('/storage/images/logo.png') }}" class="rounded img-logo" alt="">
                      </p>
                  </div>
                  <div class="col-7">
                      <p class="text-dark">
                          <strong>PURCHASE REQUEST</strong>
                          <br>MUNICIPALITY OF SAN ISIDRO
                          <br>PROVINCE OF ISABELA
                      </p>
                  </div>
              </div>
              <center class="mx-5">
                  <table class="table table-bordered table-sm">
                      <tr>
                          <td>Department: {{ $pr->department }}</td>
                          <td>
                              <div class="row">
                                  <div class="col">
                                      PR: {{ $pr->prno }}
                                  </div>
                                  <div class="col">
                                      Date: {{ $pr->date1 }}
                                  </div>
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>Section: {{ $pr->section }}</td>
                          <td>
                              <div class="row">
                                  <div class="col">
                                      SAI No: {{ $pr->saino }}
                                  </div>
                                  <div class="col">
                                      Date: {{ $pr->date2 }}
                                  </div>
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td></td>
                          <td>
                              <div class="row">
                                  <div class="col">
                                      ALOBS No: {{ $pr->alobsno }}
                                  </div>
                                  <div class="col">
                                      Date: {{ $pr->date3 }}
                                  </div>
                              </div>
                          </td>
                      </tr>
                      <tr class=" p-0">
                          <td colspan="3" class=" p-0 details-table">
                              <table class="table fs-6 text-center">
                                  <tr>
                                      <th>Item No.</th>
                                      <th>Quantity</th>
                                      <th>Unit of Issue</th>
                                      <th width="40%">Item Description</th>
                                      <th>Estimated Unit Cost</th>
                                      <th>Estimated Cost</th>
                                  </tr>
                                  <tbody>

                                      @foreach ($pr->purchaseRequestDetails as $details)
                                          <tr>
                                              <td>{{ $details->itemno }}</td>
                                              <td>{{ $details->quantity }}</td>
                                              <td>{{ $details->unitissue }}</td>
                                              <td>{{ $details->itemdescription }}</td>
                                              <td>{{ $details->estimateunit }}</td>
                                              <td>{{ $details->estimatecost }}</td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>

                          </td>
                      </tr>
                      <tr>
                          <td colspan="3" style="border: solid 1px lightgray;" class=" fs-6">
                              Purpose: {{ $pr->purpose }}
                          </td>
                      </tr>
                      <tr class=" p-0">
                          <td colspan="3" class="p-0">
                              <table class="table table-bordered fs-6 third-table text-center">
                                  <tr>
                                      <td width="10%"></td>
                                      <td>Requested by:</td>
                                      <td>Cash Availability</td>
                                      <td>Approved by:</td>
                                  </tr>
                                  <tr>
                                      <td>Signature:</td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Printed Name:</td>
                                      <td class="fw-bold">VILMER B. BRAVO</td>
                                      <td class="fw-bold">BENJAMIN JR. M. ULEP</td>
                                      <td class="fw-bold">VILMER B. BRAVO</td>
                                  </tr>
                                  <tr>
                                      <td>Designation</td>
                                      <td>Municipal Mayor</td>
                                      <td>Municipal Treasurer</td>
                                      <td>Municipal Mayor</td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>

                  {{-- <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button> --}}
              </center>
          </page>
      </body>

      </html>
