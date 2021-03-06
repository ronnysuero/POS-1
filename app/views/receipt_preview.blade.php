<div id="print_receipt" style="width:{{Systemsetting::getx('receipt_paperwidth')}}mm; border:1px dotted lavender; padding:2px; font-size:15px; margin:0 auto">
	<div class="row-fluid">
		<div class="span12">
			<div id="receipt_address" style="border-bottom:1px solid #000;">
				
				<address style="margin-bottom:0">
					<strong class="pull-left">{{Systemsetting::getx('name')}}</strong>
					<strong class="pull-right">Receipt</strong>
					<div class="clearfix"></div>
					
					<span>
						{{Systemsetting::getx('address')}}
					</span>

					<br>

					<div class="receipt_phone pull-left">
						<strong>{{Systemsetting::getx('phone')}}</strong>
					</div>
				
					<div class="receipt_email_website pull-right">
						<strong>{{Systemsetting::getx('email')}}</strong><br>
						<strong>{{Systemsetting::getx('website')}}</strong>
					</div>
					<div class="clearfix"></div>
				</address>

			</div>


			<div id="receipt_details" style="border-bottom:1px solid #000;">
				<div class="pull-left">
					<span>Transaction:</span> <span id="receipt_number">--</span><br>
					@if(Systemsetting::getx('show_salesperson') == 1)
					<span>Sales person:</span> <span>{{Auth::user()->name}}</span><br>
					@endif
				</div>

				<div class="pull-right">
					<span>Cart date:</span> <span id="receipt_date">{{ng_date_format()}}</span><br>
					<span>Cart time:</span> <span id="receipt_time">{{ng_time_format()}}</span><br>
				</div>

				<div class="clearfix"></div>
			</div>

			<div id="receipt_items" style="border-bottom:1px solid #000;">
				<table class="table">
					<thead>
						<tr style="background:#fff; border-bottom:1px solid lavender">
							<th class="r_h_qty">Qty</th>
							<th class="r_h_desc">Description</th>
							<th class="r_h_upr">U.price</th>
							<th class="r_h_ttl">Total</th>
						</tr>
					</thead>

					<tbody style="">
						
					</tbody>
				</table>
			</div>

			<div id="receipt_payment" style="border-bottom:1px solid #000;">
				<h6 class="bolder totaltendered nomargin-top-bottom">
					<span class="" id="receipt_totalamountdue_word">Total amount due: </span>
					<span>{{currency()}}<span id="receipt_totalamountdue">0:00</span>k</span>
				</h6>

				<h6 class="bolder totaltendered nomargin-top-bottom">
					<span class="" id="receipt_totalamounttendered_word">Total amount tendered: </span>
					<span>{{currency()}}<span id="receipt_totalamounttendered">0:00</span>k</span>
				</h6>

				<h6 class="bolder change nomargin-top-bottom">
					<span class="" id="receipt_change_word">Change: </span>
					<span class="">{{currency()}}<span id="receipt_change">0:00</span>k</span>
				</h6>
			</div>

			<div id="receipt_footer">
				<?php $r_note = Systemsetting::getx('receipt_note') ?>
				<div id="receipt_note_comment" style="font-size:{{Systemsetting::getx('receipt_note_fontsize')}}; text-align:{{Systemsetting::getx('receipt_note_alignment')}}; border-bottom: 1px solid #000;">
					{{$r_note}}
				</div>

				<?php $r_footer = Systemsetting::getx('receipt_footer') ?>
				<div id="receipt_note_comment" style="text-align:left">
					<em>{{$r_footer}}</em>
				</div>
			</div>

		</div>
	</div>
</div>



<script>
$(document).ready(function(){
	//Lets get the values for payment details
	$('#receipt_totalamountdue').text($('.totalamount').text());
	$('#receipt_totalamounttendered').text($('#totaltendered').text());
	$('#receipt_change').text($('#change').text());

	//Lets assign receipt/Transaction number
	$('#receipt_number').text($('#hidden_receipt_number').text());
	$('#receipt_date').text($('#hidden_receipt_date').text());
	$('#receipt_time').text($('#hidden_receipt_time').text());

	/***Lets setup the receipt item tbody..***/
	//We first catch  the items in cart.
	$.each($('.cart-place tbody tr').clone(), function(index, tr){
		$('#receipt_items tbody').append('<tr><td class="r_qty">'+$(tr).find('td.quantity > input').val()+' x</td><td class="r_desc">'+$(tr).find('td.productname').text()+'</td><td class="r_upr">'+$(tr).find('td.unitprice').html()+'</td><td class="r_ttl">'+$(tr).find('td.total').text()+'</td></tr>');
	});

	//lets the view according to the receipt size:
	//If receipt is less than 70mm i.e 216px. We will hide the following table tds [ qty, unitprice]
	//Lets first get the receipt size is px
	var receiptSize = $('#print_receipt').width();
	//_debug(receiptSize);
	if( receiptSize <= 265 ){ 
		//we hide the following element on the receipt
		$(' #print_receipt .r_h_upr,  #print_receipt .r_upr').hide();

		//Lets change the amount ish below the receipt to abbrv.
		$('#receipt_totalamountdue_word').html('T.amt due');
		$('#receipt_totalamounttendered_word').html('T.amt tendered');
		//$('#receipt_change_word').html('T.amt tendered');

		if(receiptSize <= 265){
		//We float the receipt email to left
		$('#print_receipt .receipt_email_website, #print_receipt #receipt_details .pull-right').removeClass('pull-right').addClass('pull-left');
		}
	}

	$(this).on('click','.print-previewx', function(e){
		e.preventDefault();
		e.stopImmediatePropagation();

		//Then we can print the receipt here
		var pageTitlex = '{{Systemsetting::getx("name")}}';
		var clonePrintPlace = $('#print_receipt').clone();
		clonePrintPlace.printThis({
			pageTitle: pageTitlex,
			selectedPageCss: "link[rel=stylesheet][href*='bucketcodes']",
			extraAttr: 'style=border-collapse:collapse; margin:0; padding:0; width:100%; font-family:"comic-sans"',
			loadJS:"$(document).ready(function(){$(this).find('body').css({'margin':'0', 'padding':'0','width':'100%'})})"
		});
	});


});
</script>