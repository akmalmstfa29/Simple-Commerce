@extends('layouts.front')

@section('style')
    <style>
        .Product-img img{
            width: 100%;
        }
        .main-section{
            font-family: 'Roboto Condensed', sans-serif;
            margin-top:100px;
            min-height: 70vh;
        }
		.table>tbody>tr>td, .table>tfoot>tr>td{
			vertical-align: middle;
		}
		@media screen and (max-width: 600px) {
			table#cart tbody td .form-control{
				width:20%;
				display: inline !important;
			}
			.actions .btn{
				width:36%;
				margin:1.5em 0;
			}
			
			.actions .btn-info{
				float:left;
			}
			.actions .btn-danger{
				float:right;
			}
			
			table#cart thead { display: none; }
			table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
			table#cart tbody tr td:first-child { background: #333; color: #fff; }
			table#cart tbody td:before {
				content: attr(data-th); font-weight: bold;
				display: inline-block; width: 8rem;
			}
			
			
			
			/* table#cart tfoot td{display:block; }
			table#cart tfoot td .btn{display:block;} */
			
		}
    </style>
@endsection

@section('content')
	<div class="container main-section">
		<div class="row">
			<div class="col-lg-12 pb-2">
				<h4>Your cart</h4>
			</div>
			<div class="col-lg-12 pl-3 pt-3">
				<form name="cart" action="{{route('update-cart')}}" method="post">
					@csrf
					<table id="cart" name="cart" class="table table-hover border bg-white">
						<thead>
							  <tr>
								<th>Product</th>
								<th>Price</th>
								<th style="width:10%;">Quantity</th>
								<th>Total</th>
								<th>Action</th>
							  </tr>
						</thead>
						<tbody>
							@foreach ($carts as $item)
								<tr name="line_items">
									<td class="align-middle">
										<div class="row">
											<div class="col-lg-2 Product-img">
												<img src="{{$item->product->image_url}}" alt="..." class="img-responsive"/>
											</div>
											<div class="col-lg-10">
												<h4 class="nomargin">{{$item->product->name}}</h4>
												<p class="d-none d-md-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua.</p>
											</div>
										</div>
									</td>
									<td data-th="Price" class="align-middle" style="white-space: nowrap">
										@if ($item->discount)
											<span>
												<del>${{$item->price_without_disc}}</del>
											</span>
										@endif
										<strong>${{$item->price}}</strong>
										<input class="d-none" type="text" name="price" value="{{$item->price}}">
									</td>
									<td data-th="Quantity" class="align-middle">
										<input name="qty" data-id="{{$item->id}}" min="1" type="number" class="form-control text-center qty-form" value="{{$item->qty}}">
										<input name="items[{{$item->id}}][qty]" type="number" class="d-none" value="{{$item->qty}}">
									</td>
									<td data-th="Total" class="align-middle">
										<span>${{$item->total_price}}</span>
										<input class="d-none" type="text" name="item_total" value="{{$item->total_price}}">
									</td>
									<td class="actions align-middle" data-th="" style="width:10%;">
										<button class="btn btn-danger btn-sm" name="remove"><i class="far fa-trash-alt"></i></button>								
									</td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr class="d-md-none">
								<td class="text-center">
									<strong>
										Subtotal <span></span>
										<input class="d-none" type="text" name="total" value="">
									</strong>
								</td>
							</tr>
							<tr class="d-md-none">
								<td>
									<button type="submit" class="btn btn-md btn-primary btn-block w-100"  style="white-space: nowrap;">
										<strong><i class="fa fa-angle-left"></i> Save and Continue Shopping</strong>
									</button>
								</td>
							</tr>
							<tr class="d-md-none">
								<td>
									<button class="btn btn-md btn-success btn-block" style="white-space: nowrap;" title="this feature is not yet available!" disabled>
										Checkout <i class="fa fa-angle-right"></i>
									</button>
								</td>
							</tr>
							<tr class="d-none d-md-table-row">
								<td class="align-middle">
									<button type="submit" class="btn btn-md btn-primary btn-block w-50"  style="white-space: nowrap;">
										<strong><i class="fa fa-angle-left"></i> Save and Continue Shopping</strong>
									</button>
								</td>
								<td colspan="2"></td>
								<td class="hidden-xs align-middle" style="width:10%;">
									<strong>
										<span></span>
										<input class="d-none" type="text" name="total" value="">
									</strong>
								</td>
								<td class="align-middle">
									<button class="btn btn-md btn-success btn-block" style="white-space: nowrap;" title="this feature is not yet available!" disabled>
										Checkout <i class="fa fa-angle-right"></i>
									</button>
								</td>
							</tr>
						</tfoot>
					</table>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script>
		(function($) {
			$.fn.inputFilter = function(inputFilter) {
				return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
					if (inputFilter(this.value)) {
						this.oldValue = this.value;
						this.oldSelectionStart = this.selectionStart;
						this.oldSelectionEnd = this.selectionEnd;
					} else if (this.hasOwnProperty("oldValue")) {
						this.value = this.oldValue;
						this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
					} else {
						this.value = "";
					}
				});
			};
		}(jQuery));
		$(document).ready(function() {
			$('.qty-form').inputFilter(function(value) {
				return /^\d*$/.test(value);    // Allow digits only, using a RegExp
			});

			$('button[name=remove]').click(function(e) {
				e.preventDefault();

				var form = $(this).parents('form')
				$(this).parents('tr').remove();
				countTotal()
			});

			$('input[name=qty]').change(function () {
				const id = $(this).data('id');
				$(this).parents('td').find('input[name="items['+id+'][qty]"]').val($(this).val());
				
				price = $(this).parents('tr').find('input[name=price]').val();
				total = $(this).parents('tr').find('input[name=item_total]');
				total.attr('value',  ( parseFloat(price) * $(this).val() ) + 0 );
				total.trigger('change')
			})

			$('input[name=item_total]').change(function () {
				var form = $(this).parents('form')
				$(this).parents('td').find('span').text('$'+(parseFloat($(this).val())+0));

				countTotal()
			})
			
			$('input[name=total]').change(function () {
				var form = $(this).parents('form')
				$(this).parents('strong').find('span').text('$'+(parseFloat($(this).val()||0)+0));
			})

			$('input[name=total]').trigger('change')

			countTotal()

			$('table[name=cart]').find('tbody').on('update', function(){
				$('button[type=submit]').prop('disabled', $(this).find('tr').length ? false : true)
			});

			$('table[name=cart]').find('tbody').trigger('update')
		});

		function countTotal() {
			var subTotal = 0;
			$("input[name=item_total]").each(function(){
				subTotal += (parseFloat($(this).val()) + 0);
			});

			$('input[name=total]').attr('value', subTotal);

			$('input[name=total]').trigger('change')
		}
	</script>
@endsection