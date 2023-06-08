<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderController extends CI_Controller
{
	public function checkLogin()
	{
		if (!$this->session->userdata('LoggedIn')) {
			redirect(base_url('/login'));
		}
	}

	// public function __construct()
	// {
	// 	parrent::__construct();
	// 	$this->checkLogin();
	// }
	public function print_order($order_code)
	{

		$this->load->library('Pdf');

		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('Print Order: ' . $order_code);
		$pdf->SetHeaderMargin(30);
		$pdf->SetTopMargin(20);
		$pdf->setFooterMargin(20);
		$pdf->SetAutoPageBreak(true);
		$pdf->SetAuthor('Author');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->Write(5, 'CodeIgniter TCPDF Integration');
		$pdf->SetFont('dejavusans', '', 10);

		//in đơn hàng
		$pdf->SetFont('dejavusans', '', 10);
		// add a page
		$pdf->AddPage();
		$this->load->model('OrderModel');

		$data['order_details'] = $this->OrderModel->printOrderDetails($order_code);

		$html = '
        <h3>Đơn hàng của bạn bao gồm các sản phẩm:</h3>    
        <p>Cảm ơn bạn đã ủng hộ website <a href="#">bán hàng</a> của chúng tôi. Vui lòng liên hệ hotline nếu xảy ra sự cố: 19001900</p>        
        <table border="1" cellspacing="3" cellpadding="4">
          <thead>
            <tr>
              <th>#</th>
              <th>Order Code</th>
              <th>Product Name</th>
              <th>Product Image</th>
              <th>Product Price</th>
              <th>Quantity</th>
              <th>SubTotal</th>
            </tr>
          </thead>
          <tbody>
          ';
		$total = 0;
		foreach ($data['order_details'] as $key => $ord) {
			$total += $ord->soluong * $ord->price;
			$html .= '
                <tr>
                <td>' . $key . '</td>
                <td>' . $order_code . '</td>
                <td>' . $ord->title . '</td> 
                <td>' . base_url('uploads/product/' . $ord->image) . '</td>
                <td>' . number_format($ord->price, 0, ',', '.') . 'đ' . '</td>
                <td>' . $ord->soluong . '</td>
                <td>' . number_format($ord->soluong * $ord->price, 0, ',', '.') . 'đ</td>
                
                </tr>
                ';
		}

		$html .= '<tr><td colspan="7" align="right">Tổng tiền: ' . number_format($total, 0, ',', '.') . 'đ</td></tr>
        </tbody>
        </table>';


		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->Output('Order: ' . $order_code . '.pdf', 'I');
	}
	public function index()
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

		$this->load->model('OrderModel');
		$data['order'] = $this->OrderModel->selectOrder();

		$this->load->view('order/list', $data);
		$this->load->view('admin_template/footer');
	}

	public function view($order_code)
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

		$this->load->model('OrderModel');
		$data['order_details'] = $this->OrderModel->selectOrderDetails($order_code);

		$this->load->view('order/view', $data);
		$this->load->view('admin_template/footer');
	}

	public function delete_order($order_code)
	{
		$this->checkLogin();
		$this->load->model('OrderModel');

		$del_order_details  =  $this->OrderModel->deleteOrderDetails($order_code);
		$del = $this->OrderModel->deleteOrder($order_code);
		if ($del) {
			$this->session->set_flashdata('success', 'Xóa đơn hàng thành công');
			redirect(base_url('order/list'));
		} else {
			$this->session->set_flashdata('error', 'Xóa đơn hàng không thành công');
			redirect(base_url('order/list'));
		}
	}

	public function process()
	{
		$value = $this->input->post('value');
		$order_code = $this->input->post('order_code');
		$this->load->model('OrderModel');
		$data = array(
			'status' => $value
		);
		$this->OrderModel->updateOrder($data, $order_code);
	}
}
