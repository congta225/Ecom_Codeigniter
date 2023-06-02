<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SliderController extends CI_Controller
{

	public function checkLogin()
	{
		if (!$this->session->userdata('LoggedIn')) {
			redirect(base_url('/login'));
		}
	}

	public function index()
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

		$this->load->model('SliderModel');
		$data['slider'] = $this->SliderModel->selectSlider();

		$this->load->view('slider/index', $data);
		$this->load->view('admin_template/footer');
	}

	public function edit($id)
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

		$this->load->model('SliderModel');
		$data['slider'] = $this->SliderModel->selectSliderById($id);

		$this->load->view('slider/edit', $data);
		$this->load->view('admin_template/footer');
	}

	public function update($id)
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'Bạn chưa nhập %s.']);
		$this->form_validation->set_rules('description', 'Description', 'trim|required', ['required' => 'Bạn chưa nhập %s.']);
		if ($this->form_validation->run() == TRUE) {
			//kiem tra dữ liệu nếu trống thì k được update
			if (!empty($_FILES['image']['name'])) {
				//upload image
				$ori_fileimage = $_FILES['image']['name'];
				$new_name = time() . "" . str_replace(' ', '-', $ori_fileimage);
				$config = [
					'upload_path' => './uploads/slider',
					'allowed_types' => 'gif|jpg|png|jpeg',
					'file_name' => $new_name,
				];
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('image')) {
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('admin_template/header');
					$this->load->view('admin_template/navbar');
					$this->load->view('slider/edit/' . $id, $error);
					$this->load->view('admin_template/footer');
				} else {
					$cate_filename = $this->upload->data('file_name');
					$data = [
						'title' => $this->input->post('title'),
						'description' => $this->input->post('description'),
						'status' => $this->input->post('status'),
						'image' => $cate_filename,
					];
				}
			} else {
				$data = [
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'status' => $this->input->post('status'),

				];
			}
			$this->load->model('SliderModel');
			$this->SliderModel->updateSlider($id, $data);
			$this->session->set_flashdata('success', 'Cập nhật thành công!!');
			redirect(base_url('slider/list'));
		} else {
			$this->edit($id);
		}
	}

	public function create()
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->view('slider/create');
		$this->load->view('admin_template/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'Bạn chưa nhập %s.']);
		$this->form_validation->set_rules('description', 'Description', 'trim|required', ['required' => 'Bạn chưa nhập %s.']);
		if ($this->form_validation->run() == TRUE) {
			//upload image
			$ori_fileimage = $_FILES['image']['name'];
			$new_name = time() . "" . str_replace(' ', '-', $ori_fileimage);
			$config = [
				'upload_path' => './uploads/slider',
				'allowed_types' => 'gif|jpg|png|jpeg',
				'file_name' => $new_name,
			];

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')) {
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin_template/header');
				$this->load->view('admin_template/navbar');
				$this->load->view('slider/create', $error);
				$this->load->view('admin_template/footer');
			} else {
				$slider_filename = $this->upload->data('file_name');
				$data = [
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'status' => $this->input->post('status'),
					'image' => $slider_filename,
				];
				$this->load->model('SliderModel');
				$this->SliderModel->insertSlider($data);
				$this->session->set_flashdata('success', 'Thêm thành công!!');
				redirect(base_url('slider/list'));
			}
		} else {
			$this->create();
		}
	}

	public function delete($id)
	{
		$this->load->model('SliderModel');
		$this->SliderModel->deleteSlider($id);
		$this->session->set_flashdata('success', 'Xóa thành công!!');
		redirect(base_url('slider/list'));
	}
}
