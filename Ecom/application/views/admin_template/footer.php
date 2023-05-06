<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script>
	$('.xulidonhang').change(function() {
		const value = $(this).val();
		const order_code = $(this).find(':selected').attr('id');
		if (value == 0) {
			alert('Hãy chọn xử lí đơn hàng');
		} else {
			$.ajax({
				method: 'POST',
				url: '/order/process',
				data: {
					value: value,
					order_code: order_code
				},
				success: function() {
					alert('thay đổi thuộc tính đơn hàng thành công');
				}

			})
		}
	})
</script>
</body>

</html>
