console.log('order loaded');



$('select').on('change', function () {

	var productId = $(this).val();

	console.log('change', productId);

	var url = getRequestUrl() + '/product';

	var params = {
		id: productId,
		toto: 1
	};

	console.log(params);

	$.get(url, params, function (html) {
		console.log(html);
		$('.product-info').html(html);
	});
});


$('select').trigger('change');


$('#btn-add').on('click', function () {
	var quantity = $("#quantity").val();
	var productId = $('select').val();

	console.log('quantity', quantity, 'product', productId);

	var url = getRequestUrl() + '/cart';

	var params = {};
	params.id = productId;
	params.quantity = quantity;

	console.log(params);


	$.post(url, params, function (html) {
		$('.box-cart').html(html);
	});
});


function loadCart() {
	// load cart
	var url = getRequestUrl() + '/cart';

	$.get(url, function (html) {
		$('.box-cart').html(html);
	});	
}

loadCart();

