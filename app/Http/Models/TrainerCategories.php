<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class TrainerCategories extends Model
{
	protected $table = 'trainer_categories';
	protected $html = '';

	protected $fillable = ['trainer_cat_name','par_cat_id','status'];

	/**
	 * USE : Get categories select list
	 */
	public function get_category_select_list($catid = 0, $space=''){
		$Model = new static;
		$data = $Model->where('par_cat_id',$catid)->get();
		if($data){
			if($catid == 0){
				$space='';
			}else{
				$space .="----";
			}

			$catrow = $data->toArray();
			foreach($catrow as $row){
				$this->html .= "<option value='".$row['trainer_cat_id']."'>".$space.$row['trainer_cat_name']."</option>";
				$this->get_category_select_list($row['trainer_cat_id'],$space);
			}
		}
		return $this->html;
	}

	/**
	 * USE : Get category List in tree-view
	 */
	public function get_categories($catid = 0){
		$Model = new static;
		$data = $Model->where('par_cat_id',$catid)->get();
		if($data){
			$result = $data->toArray();
			foreach ($result as $row) {
				$i = 0;
				if ($i == 0){
					$this->html.= '<ul>';
				}
				$this->html.= "<li dataid=".$row['trainer_cat_id'].">".$row['trainer_cat_name'];
				$this->get_categories($row['trainer_cat_id']);
				$this->html.= '</li>';
				$i++;
				if ($i > 0){
					$this->html.= '</ul>';
				}
			}
		}
		return $this->html;
	}

	public function get_trainer_skils($catid,$trainerskils){
		$Model = new static;
		$space = '';
		$data = $Model->where('par_cat_id',$catid)->get();
		if($data){
			if($catid == 0){
				$space='';
			}else{
				$space .="----";
			}

			$catrow = $data->toArray();
			$selected = '';
			foreach($catrow as $row){
				if(!empty($trainerskils) && in_array($row['trainer_cat_id'], $trainerskils)){
					$selected = 'selected';
				}
				$this->html .= "<option value='".$row['trainer_cat_id']."' ".$selected.">".$space.$row['trainer_cat_name']."</option>";
				$this->get_trainer_skils($row['trainer_cat_id'],$trainerskils);
			}
		}
		return $this->html;
	}


	/**
	 * USE : Get data category by id
	 */
	public function get_edit_row_data($id = 0){
		$Model = new static;
		$data = $Model->where('trainer_cat_id',$id)->first();
		if($data){
			return $data->toArray();
		}else{
			return false;
		}
	}

	/**
	 * USE : Check paranet category available or not
	 */
	function checkparentcategory($id = 0){
		$Model = new static;
		$count = $Model->where('par_cat_id',$id)->get()->count();
		if($count > 0){
			return true;
		}
		return false;
	}
}
