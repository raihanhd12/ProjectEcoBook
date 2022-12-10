@extends('layouts.navbar_user')

@section('navbar-user')

<!-- products -->
<div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <form action="/home/user/product/allBuku">
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04" name="cate"
                            aria-label="Example select with button addon">
                            <option selected value="">Chose</option>
                            @foreach ($dataC as $item3)
                                <option value="{{$item3->id}}">{{$item3->nama_category}}</option>
                            @endforeach   
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-primary" submit="button">Cari Kategori</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

  <!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($dataC as $item4)
                                    <tr class="table-body-row" id="{{$item4->id}}">
                                        <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
                                        <td class="product-name">{{$item4->nama_category}}</td>
                                        <td class="product-price">${{$item4->nama_category}}</td>
                                        <td class="product-quantity"><input type="number" placeholder="0"></td>
                                        <td class="product-total">{{$item4->nama_category}}</td>
                                    </tr>
                                @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>      

<script src="{{asset('user/assets/js/jquery-1.11.3.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('select[name="cate"]').on('change', function() {
            $(".table-body-row").hide();
            $("#" + $(this).val()).fadeIn(700);
        }).change();
    });
</script>

@endsection
