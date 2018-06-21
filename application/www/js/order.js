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