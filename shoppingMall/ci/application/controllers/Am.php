<?php 
	class Am extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model('am_model');
			$this->load->helper(array('form','url'));
		}

		public function index(){
			$data['menu_code'] = "home";

			$this->load->view('header',$data);
			$this->load->view('index',$data);
			$this->load->view('footer',$data);
		}

		public function productAddOk(){
			$config['upload_path'] = './upload_data';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2000';
			$config['max_width'] = '3024';
			$config['max_height'] = '1768';

			$this->load->library('upload',$config);

			$main_img = "";

			if(! $this->upload->do_upload("main_img")){
				$error = array('error'=>$this->upload->display_errors());
				$this->load->view('Am/upload_result',$error);
			}else{
				$error = "";

				$upload_file_info = $this->upload->data();
				$data = array('upload_data'=>$upload_file_info,'error'=>$error);
				$main_img = "/upload_data".$upload_file_info['raw_name'].$upload_file_info['file_ext'];
				$this->load->view('Am/upload_result',$data);
			}
			$return_value = $this->am_model->productAddOk($main_img); //db insert
		}

		public function productAdd(){
			$data['menu_code'] = "product";
			$return_ca_array = $this->am_model->categoryGetListFromUpperCode(-1);
			$return_html = "";

			foreach ($return_ca_array as $this_row_category) {
				$this_ca_name = $this_row_category["name"];
				$this_ca_code = $this_row_category["code"];

				$return_html = $return_html."<option value='".$this_ca_code."'>".$this_ca_name."</option>";
			}

			$data['category_first'] = $return_html;

			$this->load->view('header',$data);
			$this->load->view('Am/product/productAdd',$data);
			$this->load->view('footer',$data);
		}

		public function categoryDeepLoad(){
			$category = $this->input->post('category');

			$return_ca_array = $this->am_model->categoryDeepLoad($category);

			$return_html = "";
			$seperator = "*";
			$seperator2 = "|";

			foreach ($return_ca_array as $this_row_category) {
				$this_ca_name = $this_row_category['name'];
				$this_ca_code = $this_row_category['code'];

				if(!$return_html){
					$return_html = $this_ca_code.$seperator2.$this_ca_name;
				}else{
					$return_html = $return_html.$seperator.$this_ca_code.$seperator2.$this_ca_name;	
				}
			}
			echo $return_html;
		}

		public function productList(){
			$max_record = 10;
			$page_idx = $this->input->get('P');

			$start_point = ($page_idx - 1) * $max_record;
			$data['menu_code'] = 'product';

			$rsProductList = $this->am_model->getProductList($start_point,$max_record);
			$cntRecord = $this->am_model->getProductListCount();
			$data['rsProductList'] = $rsProductList;

			$data['pagestr'] = $this->am_model->getPageString($max_record,$cntRecord,$page_idx);
			$data['page_idx'] = $page_idx;
			$data['max_record'] = $max_record;

			$this->load->view('am/header',$data);
			$this->load->view('am/product/productList',$data);
			$this->load->view('am/footer',$data);
		}

		public function categoryMng(){
			$data['menu_code'] = "category";

			$this->load->view('header',$data);
			$this->load->view('am/category/categoryMng',$data);
			$this->load->view('footer',$data);
		}

		public function categoryMngOk(){
			$return_value = $this->am_model->insert_category();
			echo $return_value;
		}

		public function getView(){
			$data = $this->board_model->getView();

			echo $data->name."^".$data->title."^".$data->contents."^".$data->code;
		}

		public function categoryGetCategoryCode(){
			$return_html = "new Array(";
			$return_value = $this->am_model->categoryGetCategoryCode();
			$data['category'] = $return_value;

			$idx = 0;
			foreach ($data['category'] as $items) {
				$idx++;

				if($idx == 1){
					$return_html .= $items["code"];
				}else{
					$return_html .= ",".$items["code"];
				}
			}

			$return_html .= ")";
			echo $return_html;
		}

		public function categoryGetList(){
			$HEADER_HTML = " ";
			$FOOTER_HTML = " ";

			$return_html = $HEADER_HTML;
			$return_value = $this->am_model->categoryGetList();
			$data['category'] = $return_value;

			$idx = 0;
			foreach ($data['category'] as $items) {
				$idx++;

				$return_html .= "
					<div class='divTR amCA".$items["upper_code"]."'>
					<span class = 'divTDHeader'>
					.{$items['name']}<a style='margin-left:10px;color:blue;cursor:pointer' id='aF".$items["upper_code"].$items["code"]."' onmouseover='javascript:toSizeStyle(this, 18);' onmouseout='javascript:toSizeStyle(this);' onclick='javascript:categoryAdd(".$items["code"].",".$items["upper_code"].");'>+</a>
					</span>
					<span class='divTDCon' id='divTDCon".$items["code"]."'>
					</span>
					</div>
					";
			}

			$return_html .= $FOOTER_HTML;
			echo $return_html;
		}
	}

 ?>
