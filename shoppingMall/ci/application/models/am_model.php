<?php 

	class am_model extends CI_Model{
		
		function __construct(){
			$this->load->database();
		}

		public function categoryDeepLoad($category){
			$SQL = "select code, name from goods_category where upper_code='".$category."'";
			$query = $this->db->query($SQL);
			return $query->result_array();
		}

		public function getProductList($start_point,$max_record){
			$SQL = "select A.goods_id, A.goods_name, A.main_img, A.maker, A.category_id, B.name as category_name, A.price, A.register_date from tb_goods A, goods_category B where A.category_id = B.code order by A.goods_name limit".$start_point.",".$max_record;
			$result = $this->db->query($SQL);
			return $result->result_array();
		}
		
		public function getProductListCount(){
			$SQL = " select count(*) as cnt
			from tb_goods A, goods_category B where A.category_id = B.code order by A.goods_name ";
			$result = $this->db->query($SQL);
			return $result->row()->cnt;

		}

		public function getPageString($max_record, $total_record, $page_idx) {

			$page_count = 9;
			$total_page = ceil($total_record/ $max_record);

			$start_page = (floor(($page_idx - 1)/$page_count)*$page_count) + 1;
			$end_page = $start_page + $page_count - 1;

			if($end_page > $total_page){
				$end_page = $total_page;
			}
			$output_string = "";

			for($i=$start_page; $i <= $end_page; $i++){
				if($i == $page_idx){
					$output_string .= "&nbsp; <span style='font-weight:900; color:red'>".$i."</span>";
				}else{
					$output_string .= "&nbsp; <a href='/am/productList?P=".$i."'>".$i."</a>";
				}
			}

			if($start_page> 1){
				$output_string = "<a href='/am/productList?P=".($start_page - 1)."'>이름</a>&nbsp;". $output_string;
			}
			if(($start_page + $page_count) <= $total_page){
				$output_string = $output_string."&nbsp; <a href='/am/productList?P=".($start_page + $page_count)."'>다음</a>";
			}
			return $output_string;
		}

		public function productAddOk($main_img){
			
			$this->load->helper('date');

			$data = array(
				'goods_name' => $this->input->post('goods_name'),
				'main_img' => $main_img,
				'maker' => $this->input->post('maker'),
				'category_id' => $this->input->post('category_id'),
				'price' => $this->input->post('price'),
				'pay_method' => $this->input->post('pay_method'),
				'delivery_method' => $this->input->post('delivery_method'),
				'delivery_price' => $this->input->post('delivery_price'),
				'point' => $this->input->post('point'),
				'contents' => $this->input->post('product_contents')
			);
			$this->db->set('register_date', 'now()', FALSE);
			return $this->db->insert('tb_goods', $data);
		}

		public function insert_category(){
		
			$this->load->helper('date');
			$data = array(
				'upper_code' => $this->input->post('upper_code'),
				'name' => $this->input->post('name'),
				'is_use' => 'Y',
				'adm_id' => 'test'
			);

			$this->db->set('insert_date', 'now()', FALSE);
			return $this->db->insert('goods_category', $data);
		}

		public function categoryGetListFromUpperCode($upper_code){
			if($upper_code){
				$WHERE = "where upper_code='{$upper_code}' ";
			}

			$SQL = " select code, name, upper_code, is_use from goods_category {$WHERE} order by upper_code asc";
			$query = $this->db->query($SQL);
			return $query->result_array();
		}

		public function categoryGetList(){
			
			$upper_code = $this->input->post('upper_code');
			if($upper_code){
				$WHERE = " where upper_code='{$upper_code}' ";
			}

			$SQL = " select code, name, upper_code, is_use from goods_category {$WHERE} order by upper_code asc ";
			$query = $this->db->query($SQL);
			return $query->result_array();
		}

		public function categoryGetCategoryCode(){
			
			$upper_code = $this->input->post('upper_code');
			$SQL = " select code, name, upper_code, is_use from goods_category where upper_code=' {$upper_code}' order by upper_code asc ";
			$query = $this->db->query($SQL);
			return $query->result_array();
		}

		/*public function getView(){

				$CODE = $this->input->post('CODE'):
				$SQL = " select code, title, contents, name, adddate from board where code='{$CODE}' ";
				$query = $this->db->query($SQL);
				return $query->row();
		}
		public function getList(){
			$SQL = " select code,title, contents, name, adddate from board order b adddate desc";
			$query = $this->db->query($SQL);
			return $query->result_array();
		}*/
	}

 ?>