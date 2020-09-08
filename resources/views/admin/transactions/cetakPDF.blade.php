<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
        /* Import */
@import url('https://fonts.googleapis.com/css2?family=Arimo:wght@700&display=swap');

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 100%;  
  height: 29.7cm; 
  /* margin: 0 auto; */
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #2c3e50;
  font-size: 1.8em;
  font-family: 'Inconsolata', sans-serif;
  line-height: 1.4em;
  font-weight: 450;
  text-align: center;
  margin: 0 0 20px 0;
  /* background: url(dimension.png); */
}

#detail-left {
  float: left;
}

#detail-left span {
  color: #000;
  text-align: left;
  width: 35px;
  margin-right: 20px;
  display: inline-block;
  font-size: 1em;
  line-height: 18px;
}

#detail-right {
  float: right;
  text-align: left;
  margin-right: 100px;
  line-height: 25px;
}

#detail-right span.status-0 {
  background-color: #e74c3c;
  color: #fff;
  text-decoration: none;
  padding: 5px 10px;
  border-radius: 2px;
  text-transform: uppercase;
}

#detail-right span.status-1 {
  background-color: #2ecc71;
  color: #fff;
  text-decoration: none;
  padding: 5px 10px;
  border-radius: 2px;
  text-transform: uppercase;
}

#detail-left div,
#detail-right div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 10px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .product,
table .price,
table .qty,
table .total {
  text-align: left;
}

table td {
  padding: 10px;
  text-align: left;
}

table td.product,
table td.desc {
  vertical-align: top;
}

table td.price,
table td.qty,
table td.total {
  font-size: 1.2em;
  text-align: left;
}

table td.right {
    text-align: right;
}

table td.grand {
  border-top: 1px solid #5D6975;
  text-transform: uppercase;
}

table td.custom {
    font-size: 25px;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
    </style>
</head>
<body>
    <header class="clearfix">
        <div id="logo">
          <img src="data:image/png;base64,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">
        </div>
        <h1>Invoice {{ $transactions->code }}</h1>
        <div id="detail-right" class="clearfix">
          <div><strong><span>Ekspedisi </span>: {{ $transactions->ekspedisi['code'] }} | {{ $transactions->ekspedisi['value'] }} | {{ $transactions->ekspedisi['etd'] }} hari</strong>
        </div>
        <div><strong><span>Status </span>:  
            @if ($transactions->status == 0)
                <span class="status-0">Belum Membayar</span>
            @else
                <span class="status-1">Lunas</span>
            @endif
        </div> 
        </div>
        <div id="detail-left">
          <div><strong><span>Nama </span>: {{ $transactions->user->name }}</strong></div>
          <div><strong><span>Alamat </span>: {{ $transactions->user->address }}</strong></div>
          <div><strong><span>Telepon </span>: {{ $transactions->user->phone }}</strong></div>
        </div>
      </header>
      <main>
        <table>
          <thead>
            <tr>
              <th class="product">PRODUCT</th>
              <th class="price">PRICE</th>
              <th class="qty">QTY</th>
              <th class="total">TOTAL</th>
            </tr>
          </thead>
          <tbody>
            @php
            $grandTotal = 0;
            @endphp
          @foreach ($transactionsDetail as $td)
            <tr>
              <td class="product">{{ $td->product->name }}</td>
              <td class="price">@currency($td->product->price)</td>
              <td class="qty">{{$td->qty}}</td>
              <td class="total">@currency($td->qty * $td->product->price)</td>
            </tr>
            <tr>
              <?php $grandTotal = $grandTotal + $td->subtotal;?>
              <td colspan="3" class="right">Sub Total</td>
              <td class="total">@currency($grandTotal)</td>
            </tr>
            <tr>
              <td colspan="3" class="right">Ongkir</td>
              <td class="total">@currency($td->ekspedisi['value'])</td>
            </tr>
            <tr>
              <td colspan="3" class="grand total">Grand Total</td>
              <td class="custom"><b>@currency($grandTotal + $td->ekspedisi['value'])</b></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div id="notices">
          <div>NOTICE:</div>
          <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>
      </main>
      <footer>
        Invoice was created on a computer and is valid without the signature and seal.
      </footer>
</body>
</html>