<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndexController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('IndexModel');
		$this->load->model('SliderModel');
		$this->load->library('cart');
		$this->load->library('email');
		$this->data['category'] = $this->IndexModel->getCategoryHome();
		$this->data['slider'] = $this->IndexModel->getSliderHome();
		$this->data['brand'] = $this->IndexModel->getBrandHome();
		$this->load->library('pagination');
	}

	public function contact()
	{
		$this->load->view('pages/template/header', $this->data);
		// $this->load->view('pages/template/slider', $this->data);
		$this->load->view('pages/contact');
		$this->load->view('pages/template/footer');
	}


	public function index()
	{
		// echo Carbon\Carbon::now('Asia/Ho_Chi_Minh');
		//custom config link
		//phân trang
		$config = array();
		$config["base_url"] = base_url() . '/product_pagination';
		$config['total_rows'] = ceil($this->IndexModel->countAllProduct()); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 9; //từng trang 3 sản phẩn
		$config["uri_segment"] = 2; //lấy số trang hiện tại
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		$this->data['allproduct_pagination'] = $this->IndexModel->getIndexPagination($config["per_page"], $this->page);
		//pagination

		//sidebar
		$this->data['items_categories'] = $this->IndexModel->ItemCategories();

		// $this->data['allproduct'] = $this->IndexModel->getAllProductHome();
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/template/slider');
		$this->load->view('pages/home', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function category($id)
	{
		//custom config link
		//phân trang
		$this->data['slug'] = $this->IndexModel->getCategorySlug($id);
		$config = array();
		$config["base_url"] = base_url() . '/danh-muc' . '/' . $id . '/' . $this->data['slug'];
		$config['total_rows'] = ceil($this->IndexModel->countAllProductByCate($id)); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 6; //từng trang 3 sản phẩn
		$config["uri_segment"] = 4; //lấy số trang hiện tại
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		//get min max price
		$this->data['min_price'] = $this->IndexModel->getMinProductPrice($id);
		$this->data['max_price'] = $this->IndexModel->getMaxProductPrice($id);
		//filter
		if (isset($_GET['kytu'])) {
			$kytu = $_GET['kytu'];
			$this->data['allproductbycate_pagination'] = $this->IndexModel->getCateKyTuPagination($id, $kytu, $config["per_page"], $this->page);
		} elseif (isset($_GET['gia'])) {
			$gia = $_GET['gia'];
			$this->data['allproductbycate_pagination'] = $this->IndexModel->getCatePricePagination($id, $gia, $config["per_page"], $this->page);
		} elseif (isset($_GET['to']) && $_GET['from']) {
			$from_price = $_GET['from'];
			$to_price = $_GET['to'];
			$this->data['allproductbycate_pagination'] = $this->IndexModel->getCatePriceRangePagination($id, $from_price, $to_price, $config["per_page"], $this->page);
		} else {
			$this->data['allproductbycate_pagination'] = $this->IndexModel->getCatePagination($id, $config["per_page"], $this->page);
		}

		//pagination

		// $this->data['category_product'] = $this->IndexModel->getCategoryProduct($id);
		$this->data['title'] = $this->IndexModel->getCategoryTitle($id);
		$this->config->config["pageTitle"] = $this->data['title'];
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/category', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function brand($id)
	{
		//custom config link
		//phân trang
		$this->data['slug'] = $this->IndexModel->getBrandSlug($id);
		$config = array();
		$config["base_url"] = base_url() . '/thuong-hieu' . '/' . $id . '/' . $this->data['slug'];
		$config['total_rows'] = ceil($this->IndexModel->countAllProductByBrand($id)); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 6; //từng trang 3 sản phẩn
		$config["uri_segment"] = 4; //lấy số trang hiện tại
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		$this->data['allproductbybrand_pagination'] = $this->IndexModel->getBrandPagination($id, $config["per_page"], $this->page);
		//pagination

		// $this->data['brand_product'] = $this->IndexModel->getBrandProduct($id);
		$this->data['title'] = $this->IndexModel->getBrandTitle($id);
		$this->config->config["pageTitle"] = $this->data['title'];
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/brand', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function product($id)
	{
		$this->data['product_details'] = $this->IndexModel->getProductDetails($id);
		foreach ($this->data['product_details'] as $key => $val) {
			$category_id = $val->category_id;
		}
		$this->data['product_related'] = $this->IndexModel->getProductRelated($id, $category_id);
		// echo '<pre>';
		// print_r($this->data['product_related']);
		$this->data['title'] = $this->IndexModel->getProductTitle($id);
		$this->config->config["pageTitle"] = $this->data['title'];
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/product_details', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function cart()
	{
		$this->config->config["pageTitle"] = 'Giỏ hàng của bạn';
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/cart');
		$this->load->view('pages/template/footer');
	}

	public function thanks()
	{
		$this->config->config["pageTitle"] = 'Cảm ơn đã đặt hàng';
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/thanks');
		$this->load->view('pages/template/footer');
	}
	public function checkout()
	{
		$this->config->config["pageTitle"] = 'Thanh toán đơn hàng';
		if ($this->session->userdata('LoggedInCustomer') && $this->cart->contents()) {
			$this->load->view('pages/template/header', $this->data);
			$this->load->view('pages/checkout');
			$this->load->view('pages/template/footer');
		} else {
			redirect(base_url() . 'gio-hang');
		}
	}
	public function add_to_cart()
	{
		$product_id = $this->input->post('product_id');
		$quantity = $this->input->post('quantity');
		$this->data['product_details'] = $this->IndexModel->getProductDetails($product_id);
		//dat hang
		foreach ($this->data['product_details'] as $key => $pro)
			$cart = array(
				'id'      => $pro->id,
				'qty'     => $quantity,
				'price'   => $pro->price,
				'name'    => $pro->title,
				'options' => array('image' => $pro->image)
			);
		$this->cart->insert($cart);
		redirect(base_url() . 'gio-hang', 'refresh');
	}

	public function delete_all_cart()
	{
		$this->cart->destroy();
		redirect(base_url() . 'gio-hang', 'refresh');
	}

	public function delete_item($rowid)
	{
		$this->cart->remove($rowid);
		redirect(base_url() . 'gio-hang', 'refresh');
	}

	public function update_cart_item()
	{
		$rowid = $this->input->post('rowid');
		$quantity = $this->input->post('quantity');
		foreach ($this->cart->contents() as $items) {
			if ($rowid == $items['rowid']) {
				$cart = array(
					'rowid' => $rowid,
					'qty'     => $quantity
				);
			}
		}
		$this->cart->update($cart);
		// redirect(base_url() . 'gio-hang', 'refresh');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function login()
	{
		$this->config->config["pageTitle"] = 'Đăng nhập || Đăng ký';
		$this->load->view('pages/template/header');
		$this->load->view('pages/login');
		$this->load->view('pages/template/footer');
	}

	public function login_customer()
	{
		$this->config->config["pageTitle"] = 'Đăng nhập';
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Bạn chưa nhập %s.']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Bạn chưa nhập %s.']);
		if ($this->form_validation->run() == TRUE) {
			$email = $this->input->post('email');
			$password = md5($this->input->post('password')); //mã hóa mật khẩu
			$this->load->model('LoginModel');
			$result = $this->LoginModel->checkLoginCustomer($email, $password);
			if (count($result) > 0) {
				$session_array = [
					'id' => $result[0]->id,
					'user_name' => $result[0]->username,
					'email' => $result[0]->email,
				];
				$this->session->set_userdata('LoggedInCustomer', $session_array);
				$this->session->set_flashdata('success', 'Đăng nhập thành công!!!');
				redirect(base_url('/checkout'));
			} else {
				$this->session->set_flashdata('error', 'Email, password chưa đúng hoặc tài khoản của bạn chưa được kích hoạt');
				redirect(base_url('/dang-nhap'));
			}
		} else {
			$this->login();
		}
	}

	public function dang_ky()
	{
		$this->config->config["pageTitle"] = 'Đăng ký';
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Bạn chưa nhập %s.']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Bạn chưa nhập %s.']);
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required', ['required' => 'Bạn chưa nhập %s.']);
		$this->form_validation->set_rules('address', 'Address', 'trim|required', ['required' => 'Bạn chưa nhập %s.']);
		$this->form_validation->set_rules('name', 'Name', 'trim|required', ['required' => 'Bạn chưa nhập %s.']);
		if ($this->form_validation->run() == TRUE) {
			$email = $this->input->post('email');
			$password = md5($this->input->post('password')); //mã hóa mật khẩu
			$phone = $this->input->post('phone');
			$address = $this->input->post('address');
			$name = $this->input->post('name');
			$token = rand(0000, 9999);
			$date_created = Carbon\Carbon::now('Asia/Ho_Chi_Minh');
			$data = array(
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
				'address' => $address,
				'password' => $password,
				'token' => $token,
				'date_created' => $date_created,
			);
			$this->load->model('LoginModel');
			$result = $this->LoginModel->NewCustomer($data);

			if ($result) {
				// $session_array = [
				// 	'user_name' => $name,
				// 	'email' => $email
				// ];
				// $this->session->set_userdata('LoggedInCustomer', $session_array);
				// $this->session->set_flashdata('success', 'Đăng ký thành công!!!');
				//send mail
				$fullurl = base_url() . 'xac-thuc-dang-ky/?token=' . $token . '&email=' . $email;
				$title = "Đăng ký tài khoản thành công";
				$message = "Kích hoạt tài khoản: " . $fullurl;
				$to_email = $email;
				$this->send_mail($to_email, $title, $message);
				redirect(base_url('/checkout'));
			} else {
				$this->session->set_flashdata('error', 'Email hoặc password của bạn chưa đúng');
				redirect(base_url('/dang-nhap'));
			}
		} else {
			$this->login();
		}
	}

	public function xac_thuc_dang_ky()
	{
		if (isset($_GET['email']) && $_GET['token']) {
			$token = $_GET['token'];
			$email  = $_GET['email'];
		}
		$data['get_customer'] = $this->IndexModel->getCustomersToken($email);
		// print_r($data);
		//update customer
		$now = Carbon\Carbon::now('Asia/Ho_Chi_Minh')->addMinutes(5); //lấy time hiện tại + với 5 phút
		$token_rand = rand(0000, 9999);
		foreach ($data['get_customer'] as $key => $val) {
			if ($token != $val->token) {
				$this->session->set_flashdata('error', 'Đường link kích hoạt không đúng');
				redirect(base_url('/dang-nhap'));
			}
			$data_customer = [
				'status' => 1,
				'token' => $token
			];
			if ($val->date_created < $now) {
				$active_customer = $this->IndexModel->activeCustomersToken($email, $data_customer);
				$this->session->set_flashdata('success', 'Kích hoạt user thành công!!');
				redirect(base_url('/dang-nhap'));
			} else {
				$this->session->set_flashdata('error', 'Đã quá thời gian kích hoạt tài khoản, bạn vui lòng đăng ký lại');
				redirect(base_url('/dang-nhap'));
			}
		}
	}

	public function notFound()
	{
		// echo '404';
		$this->load->view('pages/template/header', $this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/404');
		$this->load->view('pages/template/footer');
	}

	public function send_mail($to_email, $title, $message)
	{
		$config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_user'] = 'congta225@gmail.com';
		$config['smtp_pass'] = 'ywsicifbofoxyhgy'; //mật khẩu của ứng dụng bên trong gmail
		$config['smtp_port'] = '465';
		$config['charset'] = 'utf-8';
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		//config email
		$this->email->from('congta225@gmail.com', 'Ecom Codeigniter');
		$this->email->to($to_email);
		// $this->email->cc('siddharthaesunuri@gmail.com, siddhu.php@gmail.com'); // gửi 1 bản copy cho một hoặc nhiều người
		// $this->email->bcc('siddharthaesunuri@gmail.com, siddhu.php@gmail.com'); // gửi 1 bản copy cho một hoặc nhiều người | sẽ ko thấy thông tin người gửi người nhận
		$this->email->subject($title);
		$this->email->message($message);
		$this->email->send();
		// if (!$this->email->send()) {
		// 	show_error($this->email->print_debugger());
		// }
	}

	public function send_contact()
	{
		$data = [
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
			'note' => $this->input->post('note')
		];
		$result = $this->IndexModel->insertContact($data);
		if ($result) {
			$to_email = $this->input->post('email');
			$title = "Thông tin liên hệ của quý khách: " . $this->input->post('name');
			$message = "Thông tin liên hệ tại đây. Ghi chú: " . $this->input->post('note');
		}
		$this->send_mail($to_email, $title, $message);

		$this->session->set_flashdata('success', 'Gửi thông tin liên hệ thành công!!');
		redirect(base_url('contact'));
	}

	public function confirm_checkout()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Bạn chưa nhập %s.']);
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required', ['required' => 'Bạn chưa nhập %s.']);
		$this->form_validation->set_rules('address', 'Address', 'trim|required', ['required' => 'Bạn chưa nhập %s.']);
		$this->form_validation->set_rules('name', 'Name', 'trim|required', ['required' => 'Bạn chưa nhập %s.']);
		if ($this->form_validation->run() == TRUE) {
			$email = $this->input->post('email');
			$shiping_method = $this->input->post('shiping_method'); //mã hóa mật khẩu
			$phone = $this->input->post('phone');
			$address = $this->input->post('address');
			$name = $this->input->post('name');
			$data = array(
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
				'address' => $address,
				'method' => $shiping_method
			);
			$this->load->model('LoginModel');

			$result = $this->LoginModel->NewShiping($data);

			if ($result) {
				//order
				$order_code = rand(00, 9999);
				$data_order = array(
					'order_code' => $order_code,
					'ship_id' => $result,
					'status' => 1
				);
				$inser_order = $this->LoginModel->insert_order($data_order);
				//order details
				foreach ($this->cart->contents() as $items) {
					$data_order_details = array(
						'order_code' => $order_code,
						'product_id' => $items['id'],
						'quantity' => $items['qty']
					);
					$inser_order_details = $this->LoginModel->inser_order_details($data_order_details);
				}
				$this->session->set_flashdata('success', 'Cảm ơn quý khách đã đặt hàng! Đơn hàng sẽ được chuyển cho quý khách trong thời gian sớm nhất');
				$this->cart->destroy();

				//gửi mail đơn hàng đặt thành công
				$to_email = $email;
				$title = "Bạn vừa đặt hàng tại website Ecom_codeigniter thành công";
				$message = "Chúng tôi sẽ liên hệ và giao hàng cho bạn sớm nhất";
				//send mail
				$this->send_mail($to_email, $title, $message);
				redirect(base_url('/thanks'));
			} else {
				$this->session->set_flashdata('error', 'Bạn hãy điền đầy đủ thông tin thanh toán');
				redirect(base_url('/checkout'));
			}
		} else {
			$this->checkout();
		}
	}
	public function dang_xuat()
	{
		$this->session->unset_userdata('LoggedInCustomer');
		$this->session->set_flashdata('success', 'Đăng xuất thành công!!!');
		redirect(base_url('/dang-nhap'));
	}

	public function tim_kiem()
	{
		if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
			$keyword = $_GET['keyword'];
		}
		//custom config link
		//phân trang
		$config = array();
		$config["base_url"] = base_url() . '/tim-kiem'; //đường dẫn url mặc định
		$config['reuse_query_string'] = TRUE; //tái sử dụng lại cái url  ?keyword=macbook
		$config['total_rows'] = ceil($this->IndexModel->countAllProductByKeyword($keyword)); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 3; //từng trang 3 sản phẩn
		$config["uri_segment"] = 2; //lấy số trang hiện tại
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		$this->data['allproductbykeyword_pagination'] = $this->IndexModel->getSearchPagination($keyword, $config["per_page"], $this->page);
		//pagination
		$this->data['product'] = $this->IndexModel->getProductByKeyword($keyword);
		$this->data['title'] = $keyword;
		$this->config->config["pageTitle"] = 'Tìm kiếm từ khóa:' . $keyword;
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/timkiem', $this->data);
		$this->load->view('pages/template/footer');
	}
}
