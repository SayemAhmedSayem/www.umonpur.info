<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<script>
        window.print();
    </script>
		<title>A simple, clean, and responsive HTML invoice template</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
							

								<td>
									Invoice #: {{$income->id}}<br />
									Date: {{$income->date}}<br />
									Status: 
                                  @if($income->status==0)
                                  <span style="color:red;font-weight:600;font-size:13px;">Pending</span>
                                  @else
                                  <span style="color:green;font-weight:600;font-size:13px;">Paid</span>
                                  @endif
                                   <br />
							
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									www.umonpur.info<br />
									Umonpur - উমনপুর<br />
									Sylhet, 1220
								</td>
                               <?php 
                               $user = App\Models\User::find($income->user_id);
                               ?>
								<td>
									{{$user->name ?? ''}}<br />
									{{$user->nid->phone ?? ''}}<br />
									{{$user->nid->nid ?? ''}}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Transection No</td>
                    <td>Transection phone</td>
					
				</tr>

				<tr class="details">
				
                    <td>#{{$income->transection_no ?? ''}}</td>

					<td>{{$income->transection_phone ?? ''}}</td>
				</tr>

				<tr class="heading">
					<td>Item</td>

					<td>Amount</td>
				</tr>

				<tr class="item">
					<td>{{$income->income_type ?? ''}}</td>

                    <td>Tk.{{$income->amount ?? ''}}</td>
				</tr>

			

			

				<tr class="total">
					<td>TOTAL</td>

                    <td>Tk.{{$income->amount ?? ''}}</td>
				</tr>
				<tr>
					<td>Signature</td>
					<td>
						
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>