<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndexController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('IndexModel');
		$this->load->library('cart');
		$this->data['category'] = $this->IndexModel->getCategoryHome();
		$this->data['brand'] = $this->IndexModel->getBrandHome();
	}

	public function index()
	{
		$this->data['allproduct'] = $this->IndexModel->getAllProductHome();
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/template/slider');
		$this->load->view('pages/home', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function category($id)
	{
		$this->data['category_product'] = $this->IndexModel->getCategoryProduct($id);
		$this->data['title'] = $this->IndexModel->getCategoryTitle($id);
		$this->config->config["pageTitle"] = $this->data['title'];
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/category', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function brand($id)
	{
		$this->data['brand_product'] = $this->IndexModel->getBrandProduct($id);
		$this->data['title'] = $this->IndexModel->getBrandTitle($id);
		$this->config->config["pageTitle"] = $this->data['title'];
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/brand', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function product($id)
	{
		$this->data['title'] = $this->IndexModel->getProductTitle($id);
		$this->config->config["pageTitle"] = $this->data['title'];
		$this->data['product_details'] = $this->IndexModel->getProductDetails($id);
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
				$this->session->set_flashdata('error', 'Email hoặc password của bạn chưa đúng');
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
			$data = array(
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
				'address' => $address,
				'password' => $password
			);
			$this->load->model('LoginModel');
			$result = $this->LoginModel->NewCustomer($data);

			if ($result) {
				$session_array = [
					'user_name' => $name,
					'email' => $email
				];
				$this->session->set_userdata('LoggedInCustomer', $session_array);
				$this->session->set_flashdata('success', 'Đăng ký thành công!!!');
				redirect(base_url('/checkout'));
			} else {
				$this->session->set_flashdata('error', 'Email hoặc password của bạn chưa đúng');
				redirect(base_url('/dang-nhap'));
			}
		} else {
			$this->login();
		}
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
}
