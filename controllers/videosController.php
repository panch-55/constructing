<?php
/**
 *
 */
class videosController
{
	private $model;
	function __construct()
	{
		$this->model = new videosModel();
	}
	public function selectVideosController()
	{
		$result = $this->model->selectVideosModel("videos");
		foreach ($result as $key => $value) {
			$col = "col-lg-6";
			if ($value['orden'] == 1) {
				$col = "col-lg-12";
			}
			echo '<div class="'.$col.'" "col-md-3 col-sm-6 col-xs-12">
				<video controls>
				    <source src="backend/'.substr($value['ruta'], 4).'" type="video/mp4">
				</video>
			</div>';
			/*echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<video controls width="100%">
        			<source src="backend/'.substr($value['ruta'], 4).'" type="video/mp4">
        		</video>
        		</div>';*/
		}
	}
}